<?php
require_once("model/ProcatModel.php");
require_once("model/ManageModel.php");
$object = new procat();

switch ($action) {

		#List of Product Category
	case "list_procat":
		$row = $object->list_procat();
		require_once("view/ProductCategory/Procat-List.php");
		break;

		#Add Product Category
	case "add_procat":
		if (isset($_POST['submit'])) {
			ValidateParam(request, $ProcatValidation);
			if (!Validation_HasError()) {
				$data = XSS_Bind(request, $ProcatBind);
				$object->add_procat($data);
				$manageData->GotoPart('category');
			}
		}
		$subprocat = $object->mainProcats();
		require_once("view/ProductCategory/Procat-Add.php");
		break;



		#Delete Product Category 
		/*
		* 	in This Function First  Check  Several Parameters and Next Delete Product Category
		* 		1) First This Product Doesn't Any SubProductCategory 
		* 			such as: Example Digital Devices => Mobile | Tablet
		*
		* 		2) it Product Doesn't Any Product for this Category
		* 			 such as: Huawei Devices => P10 lite, Nova3i
		*/
	case "delete":
		$id = $_GET['id'];
		$delete = $object->delete_procat($id);
		if ($delete['delete'] == true)
			$manageData->GotoPart("category");

		elseif ($delete['Action'] == "Procat") {
			$sub_procat = count($delete['delete']);
			if ($sub_procat != 0)
				require_once("view/ProductCategory/Procat-Delete.php");
		} elseif ($delete['Action'] == "Product") {
			$sub_product = count($delete['delete']);
			if ($sub_product != 0)
				require_once("view/ProductCategory/Procat-Delete.php");
		}

		break;

		#Edit & Update Product Category => Compact in one Method
	case "edit":
		$id = $_GET['id'];
		if (isset($_POST['submit'])) {
			$data = $_POST['frm'];
			$object->edit_procat($data, $id);
		}
		$subprocat = $object->AllSubProcats();
		$show = $object->Editshow_procat($id);
		require_once("view/ProductCategory/Procat-Edit.php");
		break;
}
