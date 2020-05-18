<?php

class admin_functions
{
	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	public function login($data)
	{
		$sql = $this->pdo->prepare("select * from admin_tbl where email='$data[email]' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);

		if ($data['password'] == $row->password)
			$_SESSION['admin'] = $row->id;
	}

	public function logout_admin()
	{
		session_unset();
		session_destroy();
	}

	public function AuthAdmin()
	{
		if (isset($_SESSION['admin']))
			$status = true;
		else
			$status = false;

		return $status;
	}

	#Show Data From admin
	public function ProfileAdmin()
	{
		$admin_id = $_SESSION['admin'];
		$sql = $this->pdo->prepare("select * from admin_tbl where id='$admin_id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#Show Product info for Edit
	public function Edit($id)
	{
		$sql = $this->pdo->prepare("select * from admin_tbl where id='$id' ");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	#UpdateProfile
	public function UpdateProfile($data, $id)
	{
		$sql = $this->pdo->prepare("update admin_tbl set name='$data[name]', lastname='$data[lastname]' , city='$data[city]', mobile='$data[mobile]', job='$data[job]', birthday='$data[birthday]' , email='$data[email]' where id='$id' ");
		$sql->execute();
	}

	#Add Plan For Work
	public function Add_Plan($admin_id, $data)
	{
		$status = 0;
		$time = date("Y:m:d h:m:s");
		$sql = $this->pdo->prepare("insert into plan_tbl (admin_id, title, text, status, created_at, updated_at) values ('$admin_id', '$data[title]', '$data[text]', '$status', '$time', '$time') ");
		$sql->execute();
	}

	#List of Plan
	public function AdminPlans($admin_id)
	{
		$admin_id = $_SESSION['admin'];
		$sql = $this->pdo->prepare("select * from plan_tbl where admin_id='$admin_id' & status<100");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}
}
