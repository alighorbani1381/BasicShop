<?php
require_once("model/SettingsModel.php");
$class = new settings();
switch ($action) {
	case "slider":
		require_once("view/settings/slider/index.php");
		break;


	case "add_slider":
		if (isset($_POST['submit'])) {
			if (isset($_FILES['picture'])) {
				$picture = $class->uploade_image("../public/img/Slider", "Slider");
				$data = $_POST['frm'];
				$class->add_slider($data, $picture);
			}
		}
		$subproduct = $class->sub_product();
		require_once("view/settings/slider/add_slider.php");
		break;

	case "list_slider":
		$row = $class->slider_list();
		require_once("view/settings/slider/list_slider.php");
		break;


	case "delete_slider":
		$slider_id = $_GET['id'];
		$class->slider_delete($slider_id);
		header("location:index.php?c=settings&a=list_slider");
		break;
}
