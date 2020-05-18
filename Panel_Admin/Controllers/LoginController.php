<?php
require_once("model/AdminModel.php");
$object = new admin_functions();

switch ($action) {

	case "login":
		if (isset($_POST['btn'])) {
			$data = $_POST['frm'];
			$object->login($data);
			$manageData->GotoPart('dashbord');
		}
		require_once("view/Layout/login.php");
		break;

	case "logout":
		$object->logout_admin();
		$manageData->GotoPart('dashbord');
		break;
}//EndSwitch
