<?php

#Show Chart Product in Store
require_once("model/ProductModel.php");
$product_class = new product();
$list_product = $product_class->list_product();



#Show Chart User
require_once("model/UserModel.php");
$user_class = new user();
$list_user = count($user_class->user_list_for_admin());
$user_dontPay = count($user_class->dont_Buy());

//Show Buying in Store in this month
require_once("model/BasketModel.php");
$basket_class = new basket();
$list_basket = $basket_class->basket_list_admin();
$list_buy = $basket_class->basket_statistics();
$list_buy_all = $basket_class->basket_statistics_all();


#Show index Page
require_once("view/index/index.php");
