<?php
require_once("Panel_Admin/model/OrderModel.php");
require_once("Panel_Admin/model/ProductModel.php");

$class = new order();

switch ($action) {



	case "order_details":
		if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];

			require_once("view/order/order_list.php");
		} else {
			header("location:index.php?c=user&a=login");
		}
		break;
}
