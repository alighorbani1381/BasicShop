<?php

/* Configuration DataBase and Model Need it */
require_once("ConfigModel.php");
require_once("ProductModel.php");
require_once("ManageModel.php");

class user extends product
{

	#Config DataBase For Use in the Class
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	#Add User (Create User)
	public function add_user($data)
	{
		$password = md5($data['password']);
		$sql = $this->pdo->prepare("INSERT INTO `users_tbl`(`email`, `password`, `name`, `lastname`, `vc`, `status`) VALUES ('$data[email]','$password','$data[name]','$data[lastname]',0,0)");
		$sql->execute();
	}

	#Login User Check
	public function login_user($data)
	{
		$sql = $this->pdo->prepare("select * from users_tbl where email='$data[email]' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#Logout User
	public function logout_user()
	{
		session_start();
		session_unset();
		session_destroy();
	}

	#Uploade Product Image One Picture stil
	public function product_image($path)
	{
		$picture = $_FILES['picture'];
		$array = explode(".", "$picture[name]");
		$ext = end($array);
		$newname = "Product-" . rand() . "." . $ext;
		$from = $picture['tmp_name'];
		$address = $path;
		$to = "../" . $address . "/" . $newname;
		$final_address = $address . "/" . $newname;
		move_uploaded_file($from, $to);
		return $final_address;
	}

	#Delete Product
	public function delete_product($id)
	{
		$sql = $this->pdo->prepare("delete from product_tbl where id='$id' ");
		$sql->execute();
	}

	#Get Info About one User
	public function getUserInfo($user_id)
	{
		$sql = $this->pdo->prepare("select * from users_tbl where id='$user_id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#List of All User for Panel Admin
	public function user_list_for_admin()
	{
		$sql = $this->pdo->prepare("select * from users_tbl order by lastname ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#User in Web Site is Logined ? or NO
	public static function AuthInfo()
	{
		$result = ["login" => false, "id" => null, "name" => null];
		if (isset($_SESSION['user_id']))
			$result = ["login" => true, "id" => $_SESSION['user_id'], "name" => $_SESSION['user_name']];
		return $result;
	}

	#Delete User from Web Site
	public function delete_user($user_id)
	{
		$sql = $this->pdo->prepare("delete from users_tbl where id='$user_id' ");
		$sql->execute();
	}

	#Show for  User Charset
	public function dont_Buy()
	{
		$sql = $this->pdo->prepare("SELECT id FROM basket_tbl where status='0' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Show for  User dontpay
	public function dontbuy_full()
	{
		$sql = $this->pdo->prepare("SELECT * FROM basket_tbl where status='0' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#User Activity => (Buying, Comment)
	public function UserActivity($user_id)
	{
		$sql = $this->pdo->prepare("select * from basket_tbl where user_id='$user_id' && status='1' ");
		$sql->execute();
		$basket = $sql->fetchAll(PDO::FETCH_OBJ);
		$result['basket'] = $basket;

		$sql = $this->pdo->prepare("select * from basket_tbl where user_id='$user_id' && status='2' ");
		$sql->execute();
		$buy = $sql->fetchAll(PDO::FETCH_OBJ);
		$result['buy'] = $buy;
		return $result;
	}
} //EndClass
$user = new user();
