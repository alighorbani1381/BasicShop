<?php
require_once("model/ConfigModel.php");

#Don't Login for Panel Admin
$isNotLogined = !isset($_SESSION['admin']);
if ($isNotLogined) {
	$controller = $_GET['c'] = "login";

	if (@$_GET['a'] == "logout")
		$action = $_GET['a'] = "logout";
	else
		$action = $_GET['a'] = "login";
} else {
	require_once("view/layout/header.php");
}

#Defind Variable Controller & Action
$controller = @$_GET['c'];
$action = @$_GET['a'];

#Set Default Value => Controller & Action for Handel To Show (Dashbord)
if (@$_GET['c'] == "") {
	$controller = @$_GET['c'] ? $_GET['c'] : 'index';
	$action = @$_GET['a'] ? $_GET['a'] : 'index';
}

#Set Handel And Check Existed Controller
$handel = "Controllers/" . $controller . "Controller.php";
$isExistedFile = file_exists($handel);

#Show Target Request
if ($isExistedFile)
	require_once($handel);
else
	require_once("view/layout/404.view.php");





#Show Footer << Panel_Admin >> Whene Logined User (Admin)
if (@$_SESSION['admin'] != "")
	require_once("view/layout/footer.php");
