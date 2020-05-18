<?php
error_reporting(E_ALL);
//Set data and desing of web site (Header)
require_once("view/layout/header.php");

	//File for Handel to Show => Target Controller
	$controller=@$_GET['c']?$_GET['c']:'index';
	$action=@$_GET['a']?$_GET['a']:'index';
	$handel="Controllers/".$controller."Controller.php";

	//Include Called File when Existing
	if(file_exists($handel))
		require_once($handel);
	else
		die("<br><br><br><br><br><br><br><br><br>Error 404 Page Not Found !! <br><br><br><br><br><br>");
		

//Set Footer
require_once("view/layout/footer.php");
?>


