<?php
require_once("model/OrderModel.php");
$class = new order();

switch ($action) {

		#Show Order in Wait List
	case "order_list_wait":
		$row = $class->order_list();
		require_once("view/Order/OrderWaitList.php");
		break;

		#Show Order in Buy From WebSite
	case "order_successful":
		$orders = $class->OrderSuccess();
		require_once("view/Order/OrderSucessful.php");
		break;

		#Details About Order
	case "order_details":
		if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$details = $class->order_details($user_id);
			require_once("view/Order/list_order.php");
		} else {
			header("location:index.php?c=user&a=login");
		}
		break;

		#Submit Order => (ADD Order)
	case "submit":
		$order_id = $_GET['id'];
		$class->submit_order($order_id);
		header("location:index.php?c=order&a=order_list_wait");
		break;
}
