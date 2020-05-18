<?php
require_once("Panel_Admin/model/FavoriteModel.php");
$class=new favorite();
	switch($action){
		
	#Add To Favorit List	
	case "add_favorite":
			 if(isset($_SESSION['user_id'])){
					 $user_id=$_SESSION['user_id'];
						$product_id=$_GET['id'];
						$class->add_favorit($user_id,$product_id);
					 header("location:index.php?c=product&a=details&id=$product_id");
			 }else{
				// header("location:index.php?c=errors?a=do_signup");
				echo "<a>"."برای این کار شما ابتدا باید ثبت نام کنید یا به حساب کاربری خود وارد شوید"."</a>";
			 }
	break;


	//List of Favorit List
	case "list_favorite":
			if(isset($_SESSION['user_id']))
			{
				$user_id=$_SESSION['user_id'];
				require_once("view/Product/List_Favorite.php");
			 }
			 else
			 {
			header("location:index.php");	
			 }
	break;


	#Delete Produict from Favorit List
	case "delete_favorite":
			$id=$_GET['id'];
				$class->delete_favorite($id);
			header("location:index.php?c=favorite&a=list_favorite");
	break;

	}
?>