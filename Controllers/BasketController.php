<?php
require_once("Panel_Admin/model/BasketModel.php");
$class=new basket();
	switch($action){
			
			#List of Basket
			case "list_basket":
				if(isset($_SESSION['user_id'])){
					$user_id=$_SESSION['user_id'];
					require_once("view/Basket/BasketList.php");
				}
				else
					header("location:index.php?c=user&a=login");
			break;
			
			#Add to Basket of User
			 case "add_basket":
				 if(isset($_SESSION['user_id'])){
						$user_id=$_SESSION['user_id'];
						$product_id=$_GET['id'];
						$data['qty']=$_POST['quantity'];
						$class->add_basket($user_id,$product_id,$data);
						$manageData->GotoPart('BasketList');
				}else{
					header("location:index.php?c=user&a=login");
				}
			 break;

			#Delete From Basket
			case "delete":
				$id=$_GET['id'];
					$class->delete_basket($id);
				header("location:index.php?c=basket&a=list_basket");
			break;
			
			#Basket Pay => Send To Panel Admin for Send Product to User with Post
			case "basket_pay":
				$user_id=$_SESSION['user_id'];
					$class->basket_pay($user_id);
				header("location:index.php?c=order&a=order_details");
			break;

	}

?>