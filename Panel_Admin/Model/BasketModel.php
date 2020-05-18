<?php
require_once("ConfigModel.php");
require_once("ProductModel.php");

class basket extends product
{

	#Config Connect To DataBase
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	#Add  Basket to DataBase 
	public function add_basket($user_id, $product_id, $data)
	{
		$date = date("Y-m-d h:m:s");
		$sql = $this->pdo->prepare("insert into basket_tbl (user_id, product_id, count, price, date, status) values ('$user_id', '$product_id', '$data[qty]', '0', '$date', '0')");
		$sql->execute();
	}

	#List of Basket User From DataBase
	public function basket_list($user_id)
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where user_id='$user_id' AND status='0' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	# List Basket For Admin (Use In Panel Admin)
	public function basket_list_admin()
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where status !='0' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	// List Basket For Admin
	public function basket_statistics()
	{
		$sql = $this->pdo->prepare("SELECT * FROM `user_statistics` ORDER by sum_price desc limit 3");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	public function basket_statistics_all()
	{
		$sql = $this->pdo->prepare("SELECT sum(Sum_Price) as all_price,sum(Count_buy) as all_count FROM `user_statistics`");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}


	#Delete From Basket
	public function delete_basket($id)
	{
		$sql = $this->pdo->prepare("delete from basket_tbl where id='$id' ");
		$sql->execute();
	}


	public function basket_pay($user_id)
	{
		$list = $this->basket_list($user_id);
		foreach ($list as $basket) :

			//Get Target_Product  And Target_Basket
			$product_id = $basket->product_id;
			$basket_id = $basket->id;
			$target_product = $this->product_details($product_id);
			$target_off = $target_product->off;
			$target_price = $target_product->price;
			$price = $target_price * ((100 - $target_off) / 100);

			//Update Count Of Product in Product_tbl
			$final_count = $target_product->count - $basket->count;
			$update_count = $this->pdo->prepare("update product_tbl set count='$final_count' where id='$product_id'  ");
			$update_count->execute();

			//Update Basket added date, price and Status
			$date = date("Y/m/d");
			$update_basket = $this->pdo->prepare("update basket_tbl set status='1',date='$date',price='$price' where id='$basket_id' ");
			$update_basket->execute();

		endforeach;
	}

	public function basket_order($user_id)
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where user_id='$user_id' AND status!='0' ");
	}
}
$basket = new basket();
