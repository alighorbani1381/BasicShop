<?php
/* 
	*  Disable All Error from User
	*  error_reporting('off');
	*/

//Session and output buffering is Config
session_start();
ob_start();

//Application Functions
function Mjbox($message)
{
	echo "<script>alert('" . $message . "')</script>";
}
#DataBase Configuration
$conn = new PDO("mysql:host=localhost;dbname=shop", "root", "");
$Persian_Support = $conn->prepare("SET NAMES utf8");
$Persian_Support->execute();

//Set TimeZone in Iran 
date_default_timezone_set("Asia/Tehran");

//Import Validation Method for use Any Where
require_once('ValidationPakage/ValidationModel.php');

//Short Data for Developer
require_once('ManageModel.php');
