<?php

/* Set Config model and Product Category Use in This Model */
require_once("ConfigModel.php");
require_once("ProcatModel.php");
require_once("ManageModel.php");
class product extends procat
{

	//Connected To The DataBase
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	#List of All Product 
	public function list_product()
	{
		$sql = $this->pdo->prepare("select * from product_tbl");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#List of Product With Custom Category
	public function productList($cat_id)
	{
		$sql = $this->pdo->prepare("select * from product_tbl where cat_id='$cat_id' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Add Product with Image or NO
	public function add_product($data, $picture)
	{
		if ($picture == "none")
			$sql = $this->pdo->prepare(" insert into product_tbl (title, text, price, count, cat_id, off) 				values ('$data[title]', '$data[text]', '$data[price]', '$data[count]', '$data[cat_id]', '$data[off]')");
		else
			$sql = $this->pdo->prepare("insert into product_tbl  (title, text, price, count, cat_id, images, off)  values ('$data[title]', '$data[text]', '$data[price]', '$data[count]', '$data[cat_id]', '$picture', '$data[off]')");
		$sql->execute();
	}

	#Delete Product
	public function delete_product($id)
	{
		$sql = $this->pdo->prepare("delete  from product_tbl where id='$id' ");
		$sql->execute();
	}

	#Update Product
	public function update_product($id, $data, $img)
	{
		$sql = $this->pdo->prepare("update product_tbl set title='$data[title]',text='$data[text]',price='$data[price]',count='$data[count]',cat_id='$data[cat_id]',off='$data[off]', images='$img' where id='$id' ");
		$sql->execute();
	}

	#Details About Any Product => Product info
	public function product_info($id)
	{
		$sql = $this->pdo->prepare("select * from product_tbl where id='$id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	#for Show Name of Product
	public function productName($id)
	{
		$sql = $this->pdo->prepare("select * from product_tbl where id='$id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#Details About any Products
	public function product_details($id)
	{
		$sql = $this->pdo->prepare("select * from product_tbl where id='$id' ");
		$sql->execute();
		$product = $sql->fetch(PDO::FETCH_OBJ);
		return $product;
	}

	#Uploade Image in Favorit Path
	public function uploade_image($path, $perfix)
	{
		$picture = $_FILES['picture'];
		$array = explode(".", "$picture[name]");
		$ext = end($array);
		$newname = $perfix . "-" . rand() . "." . $ext;
		$from = $picture['tmp_name'];
		$address = $path;
		$to = $address . "/" . $newname;
		$final_address = $address . "/" . $newname;
		$final_address = str_ireplace("../", "", $final_address);
		$uploaded = move_uploaded_file($from, $to);
		if (!$uploaded) {
			mjbox("Can't Uploade File");
			die("Can't Uploade File");
		}
		return $final_address;
	}

	# Selecting Main Product Category Like => Digital Product
	public function sub_product()
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where chid!='0' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Sub Product With Product Category
	public function sup_product($cat_id)
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where id='$cat_id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#Show Product info for Edit
	public function Editshow_product($id)
	{
		$sql = $this->pdo->prepare("select * from product_tbl where id='$id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	/*
		    public function edit_product($data,$id){
				 $title=$data['title'];
				 $chid=$data['chid'];
				 $sql=$this->pdo->prepare("update product_tbl set title='$title',chid='$chid' where id='$id' ");
				 $sql->execute();
		}
		*/
	#Use Product in menu in This Category
	public function sub_menu($id)
	{
		$sql = $this->pdo->prepare("select * from product_tbl where chid='$id' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Like Product for Example Huawei Mobile Show in one Group
	public function like_product($id, $cat_id, $limit)
	{
		$sql = $this->pdo->prepare("select * from product_tbl  where cat_id='$cat_id' and id!='$id' limit $limit ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}


	//For Statistic About Count OF Product and Price You Muset Be Select 
	public function product_statistics($type)
	{
		switch ($type):
			case "count":
				$target_select = "`product_statistics`.`count_product`  ";
				break;

			case "pay":
				$target_select = " `product_statistics`.`money_product`";
				break;
		endswitch;

		//select * from product_statistics ORDER BY $target_select
		$sql = $this->pdo->prepare("select * from product_statistics order by $target_select DESC limit 2");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Prodcut Has a Discount return true & false
	public function HasDiscount($product_id)
	{
		$sql = $this->pdo->query("select off from product_tbl");
		$row = $sql->fetch(PDO::FETCH_OBJ);
		if ($row->off == 0)
			$discount = false;
		else
			$discount = $row->off;

		return $discount;
	}

	public function CalculateOff($oldprice, $off)
	{
		if ($off != 0) {
			$final['new_price'] = $oldprice - $oldprice * ($off / 100);
			$final['off_price'] = $oldprice * ($off / 100);
		} else {
			$final['new_price'] = $oldprice;
			$final['off_price'] = 0;
		}

		return $final;
	}

	#Prodcut Has a Existed For Buy return true & false		
	public function HasExisted($product_id)
	{
		$sql = $this->pdo->query("select count from product_tbl");
		$row = $sql->fetch(PDO::FETCH_OBJ);
		if ($row->count == 0)
			$discount = false;
		else
			$discount = true;

		return $discount;
	}

	#Best Product  Show in main Page with Number (Limit)
	public function Top_Product($limit)
	{
		$sql = $this->pdo->prepare("select * from product_tbl limit $limit");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Number of Products
	public function ProductCount()
	{
		$sql = $this->pdo->prepare("select id from product_tbl");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return count($row);
	}
	public function ProductsPrice($products)
	{
		$sum = 0;
		foreach ($products as $product)
			$sum = $sum + $product->price;
		return $sum;
	}

	#Check This Picture Has Existed 
	public function HasPicture($product_id, $image_id)
	{
		$sql = $this->pdo->prepare("select * from products_image where product_id='$product_id' AND image_id='$image_id'  ");
		$sql->execute();
		$image = $sql->fetch(PDO::FETCH_OBJ);
		return $image;
	}

	#Products Gallery (Get Picture from ProductImage Table)
	public function imageGallery($product_id)
	{
		$sql = $this->pdo->prepare("select * from products_image where product_id='$product_id' ");
		$sql->execute();
		$images = $sql->fetchAll(PDO::FETCH_OBJ);
		foreach ($images as $image) {
			echo "<br><br><br><br><br><br><br>";
			$sql = $this->pdo->prepare("select * from uploader_tbl where id='$image->image_id' ");
			$sql->execute();
			$final_images[] = $sql->fetch(PDO::FETCH_OBJ);
		}

		return $final_images;
	}
}
