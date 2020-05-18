<?php
require_once("ConfigModel.php");
require_once("UserModel.php");
require_once("DateModel.php");
class order extends user
{
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}



	//For All Users (Panel Admin)
	public function order_list()
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where status='1'  order by date desc");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	//For Target User (Run in Web Site)
	public function order_details($user_id)
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where status!='0' AND user_id='$user_id'   order by date desc");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	//For Submiting Order To Post
	public function submit_order($order_id)
	{
		$sql = $this->pdo->prepare("update basket_tbl set status=2  where id='$order_id' ");
		$sql->execute();
	}

	public function OrderSuccess()
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where status='2' order by date desc");
		$sql->execute();
		$success = $sql->fetchAll(PDO::FETCH_OBJ);
		return $success;
	}
}
