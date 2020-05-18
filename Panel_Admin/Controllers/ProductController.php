<?php
require_once("model/ProductModel.php");
require_once("model/ProcatModel.php");
require_once("Model/ManageModel.php");
require_once("Model/UploaderModel.php");
$object = new product();
$ProductCategory = new procat();
switch ($action) {

		#Add Product
	case "add_product":
		if (isset($_POST['submit'])) {

			ValidateParam(request, $ProductValidation);
			if (!Validation_HasError()) {
				$data = XSS_Bind(request, $ProductBind);
				//it has Image?

				if ($_FILES['picture']['name'] != "")
					$picture = $object->uploade_image("../public/img/ProductList", "Product");
				else
					$picture = "none";
				$object->add_product($data, $picture);
				$manageData->GotoPart('product');
			} //endif

		} //Endif

		$MainProcats = $ProductCategory->mainProcats();
		require_once("view/Product/Product-Add.php");
		break;

		#List Of Product
	case "list_product":
		$CountAll = $object->ProductCount();
		$page = $manageData->getPageNum();
		$pagin_rows = $manageData->paginate($page, 6, "product_tbl order by cat_id");
		require_once("view/Product/Product-List.php");
		break;

		#Delete Product 
	case "delete":
		$id = $_GET['id'];
		$object->delete_product($id);
		$Base = $manageData->BaseURL();
		header("location:$Base/product");
		break;

		#Edit & Update Product => Compact in one Method
	case "edit":
		$id = $_GET['id'];
		$show = $object->Editshow_product($id);

		if (!isset($_POST['submit'])) {
			$subproduct = $object->sub_product();
			require_once("view/Product/Product-Edit.php");
			return null;
		}

		ValidateParam(request, $ProductValidation);

		if (Validation_HasError())
			return null;


		$data = XSS_Bind(request, $ProductBind);
		if ($_FILES['picture']['size'] !== 0)
			$picture = $object->uploade_image("../public/img/ProductList", "Product");
		else
			$picture = $show->images;

		$object->update_product($id, $data, $picture);


		break;

		#Add More Image  for Product
	case "addImage":
		$pictures_id = $_POST['picture_selected'];
		$product_id = $_POST['targetpic'];

		foreach ($pictures_id as $picture_id) {
			$existed = $object->HasPicture($product_id, $picture_id);
			if ($existed == false) :
				$uploade_data[] = ["product" => $product_id, "picture" => $picture_id,];
				$uploaded->picture_attach($uploade_data);
			else :
				if (!count($pictures_id) > 1)
					echo "a";
			endif;
		}



		break;
}//EndSwitch
