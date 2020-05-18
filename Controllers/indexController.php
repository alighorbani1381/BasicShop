<?php

switch($action){
	case "index":
	require_once("Panel_Admin/model/SettingsModel.php");
	require_once("Panel_Admin/model/ProductModel.php");
	$settings=new settings();
	$product=new product();
	

	
	$top_products=$product->Top_Product(8);
	$Sliders=$settings->slider_list();
	break;
}
require_once("view/index/index.php");
?>