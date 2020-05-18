<?php
require_once("model/UploaderModel.php");
require_once("model/ProductModel.php");
$product = new product();

switch ($action) {

	case "add_file":

		if (!isset($_POST['add_file'])) {
			$main_lists = $uploaded->mainlist_folder();
			require_once("view/Uploader/Uploader_Add.php");
			return null;
		}

		if (!isset($_FILES['file'])) {
			$manageData->GoToPart('file');
			return null;
		}

		$data = $_POST['frm'];
		$endfileNum = count($_FILES['file']['name']);
		for ($i = 0; $i < $endfileNum; $i++) {

			if ($_FILES['file']['error'][$i] != 0)
				return null;

			$file = $_FILES['file'];
			$picture = ["successful" => false];
			$picture = $uploaded->uploade_file($file, $i);
			$addFile = $uploaded->add_file($data, $picture);
			if (!$addFile)
				return null;
			$info = $addFile->getThisFile();

			#After Uploded Attach This File to Product Image
			if (!isset($_POST['pic']))
				return null;

			$check_product = $product->product_details($_POST['pic']);
			if ($check_product != false) {
				$attach_data = ["product"	=> $check_product->id, "picture"	=> $info->id,];
				$uploaded->picture_attach($attach_data, "single");
			}
		}
		break;

	case "List":
		$uploaderFiles = $uploaded->uploadedfiles();
		require_once('view/Uploader/Uploader_List.php');
		break;

	case "destroy":
		$picture_id = @$_GET['id'];
		$uploaded->deletePicture($picture_id);
		$manageData->Gotopart('file');
		break;
}
