<?php
require_once("ConfigModel.php");
require_once("ProductModel.php");
class settings extends product
{
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}


	public function add_slider($data, $picture)
	{
		$sql = $this->pdo->prepare("insert into slider_tbl (title,text,procat,image) values ('$data[title]','$data[text]','$data[procat]','$picture')");
		$sql->execute();
	}


	public function slider_list()
	{
		$sql = $this->pdo->prepare("select * from slider_tbl");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}



	public function slider_delete($slider_id)
	{
		$sql = $this->pdo->prepare("delete  from slider_tbl where id='$slider_id' ");
		$sql->execute();
	}
}
