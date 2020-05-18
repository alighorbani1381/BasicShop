<?php
require_once("ConfigModel.php");
require_once("ProductModel.php");
class favorite extends product
{

	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}
	#Add to Wish List => Favorit Product
	public function add_favorit($user_id, $product_id)
	{
		//Get Product for This User in DataBase if Existed
		$check = $this->pdo->prepare(" select * from favorit_tbl where user_id='$user_id' AND product_id='$product_id' ");
		$check->execute();
		$row = $check->fetchAll(PDO::FETCH_OBJ);
		$number = count($row);
		//Check Added Product in Wish List OR no
		if ($number == 0) {
			$sql = $this->pdo->prepare(" insert into favorit_tbl (user_id,product_id) values ('$user_id','$product_id') ");
			$sql->execute();
		}
	}

	#List of Favorit Product
	public function list_favorit($user_id)
	{
		$sql = $this->pdo->prepare(" select * from favorit_tbl where user_id=$user_id ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Delete Favorit Product
	public function delete_favorite($id)
	{
		$sql = $this->pdo->prepare("delete from favorit_tbl where favorit_id='$id' ");
		$sql->execute();
	}
}
