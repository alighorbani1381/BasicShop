<?php
require_once("model/UserModel.php");
require_once("model/ProductModel.php");
$class = new user();
$product = new product();
$id = @$_GET['id'];
switch ($action) {

	case "list":
		$PageNum = $manageData->getPageNum();
		$PaginateUser = $manageData->paginate($PageNum, 6, "users_tbl");
		$UserCount = count($class->user_list_for_admin());
		require_once("view/User/UserList.php");
		break;

	case "dontpay":
		$users_dontpay = $class->dontbuy_full();
		require_once('view/User/UserDontPayList.php');

		break;

	case "activity":
		$Activities = $class->UserActivity($id);
		require_once("view/User/UserActivity.php");
		break;

	case "delete":
		$class->delete_user($id);
		header("location:http://localhost/php_course_files/shop/Panel_Admin/users");
		break;
}
