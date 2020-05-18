<?php
require_once("ConfigModel.php");
require_once("ManageModel.php");
class procat
{
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	#Add Product Category
	public function add_procat($data)
	{
		$sql = $this->pdo->prepare("insert into procat_tbl (title,chid) values ('$data[title]','$data[chid]') ");
		$sql->execute();
	}

	#List of All Product Category
	public function list_procat()
	{
		$sql = $this->pdo->prepare("select * from procat_tbl order by chid asc");
		$sql->execute();
		$categories = $sql->fetchAll(PDO::FETCH_OBJ);
		return $categories;
	}

	#Delete Product Category
	public function delete_procat($id)
	{

		//This is A Main Procat Or NO !
		$main_procat = $this->pdo->prepare("select * from procat_tbl where id='$id' ");
		$main_procat->execute();
		$row = $main_procat->fetch(PDO::FETCH_OBJ);
		$stauts = $row->chid;
		if ($stauts == 0) {

			//This is a Main Procat Check it's have a Sub procat or NO?
			$find = $this->pdo->prepare("select * from procat_tbl where chid='$id' ");
			$find->execute();
			$sub_procat = $find->fetchAll(PDO::FETCH_OBJ);
			$result = count($sub_procat);

			if ($result == 0) {
				//doesn't any sub procat It's Good and Delete it
				$sql = $this->pdo->prepare("delete  from procat_tbl where id='$id' ");
				$sql->execute();
				return ["delete" => true];
			}
			return [
				"Action" => "Procat",
				"delete" => $sub_procat
			];
		} else {

			//This is a Not Main Procat 
			$find = $this->pdo->prepare("select * from product_tbl where cat_id='$id' ");
			$find->execute();
			$sub_product = $find->fetchAll(PDO::FETCH_OBJ);
			$result = count($sub_product);

			//This is a Not Main PRocat 
			if ($result == 0) {

				//doesn't any sub Product It's Good and Delete it
				$sql = $this->pdo->prepare("delete  from procat_tbl where id='$id' ");
				$sql->execute();
				return [
					"delete" => true,
				];
			}
			return [
				"Action" => "Product",
				"delete" => $sub_product
			];
		}
	}



	#Main Product Category CHID==0
	public function mainProcats()
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where chid='0' ");
		$sql->execute();
		$procats = $sql->fetchAll(PDO::FETCH_OBJ);
		return $procats;
	}

	#Main Product Category CHID==0
	public function AllSubProcats()
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where chid!='0' ");
		$sql->execute();
		$procats = $sql->fetchAll(PDO::FETCH_OBJ);
		return $procats;
	}

	#Select SubProduct Category with id
	public function subMenu($id)
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where chid='$id' ");
		$sql->execute();
		$sub_procat = $sql->fetchAll(PDO::FETCH_OBJ);
		return $sub_procat;
	}

	#Select Product Category With Chid 
	public function SelectMainProcat($chid)
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where id='$chid' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}



	#Show Edit Procat Show Old DATA
	public function Editshow_procat($id)
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where id='$id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#Update Product Category
	public function edit_procat($data, $id)
	{
		$title = $data['title'];
		$chid = $data['chid'];
		$sql = $this->pdo->prepare("update procat_tbl set title='$title',chid='$chid' where id='$id' ");
		$sql->execute();
	}



	#Show All Sub Product Category With it Parent id
	public function procat_items($parent_id)
	{
		$sql = $this->pdo->prepare("select * from procat_tbl where chid=$parent_id");
		$sql->execute();
		$child_procat = $sql->fetchAll(PDO::FETCH_OBJ);
		return $child_procat;
	}
}
