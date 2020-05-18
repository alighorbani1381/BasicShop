<?php
require_once("Panel_Admin/model/ProductModel.php");

$class=new product();
switch($action){

case "details":
$id=$_GET['id'];
$target_product=$class->product_details($id);
$cat_id=$target_product->cat_id;
$like_products=$class->like_product($id,$cat_id,7);
$hasDiscount=$class->HasDiscount($target_product->id);
$Existed=$class->HasExisted($target_product->id);
$images_gallery=$class->imageGallery($target_product->id);
require_once("view/Product/Details.php");
break;

case "list":
$ProductCategory=new procat();
$cat_id=@$_GET['procat'];
$procat=$class->SelectMainProcat($cat_id);
		if(isset($_GET['procat']))
			$Products=$class->productList($cat_id);
		else
			echo "این بخش در دسترس نیست";


require_once("view/Product/List.php");
break;



}
?>