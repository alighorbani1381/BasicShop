<?php
require_once('model/ManageModel.php');
require_once("model/AdminModel.php");
$admin = new admin_functions();
$id = @$_GET['id'];
switch ($action) {


	case "profile":
		$info = $admin->ProfileAdmin();
		require_once("view/Admin/Profile.php");
		break;

	case "profile_edit":
		if (isset($_POST['update'])) {
			//Validation Parameter
			ValidateParam("Post", $ProfileEdit_Validation);
			$data = XSS_Bind("Post", $ProfileEdit_Attribute);
			if (!Validation_HasError()) {
				$admin->UpdateProfile($data, $id);
				$location = $manageData->BaseURL("Profile");
				header("location:$location");
			}
		}


		// Show View
		if ($_SESSION['admin'] == $id) {
			$admin_info = $admin->Edit($id);
			require_once("view/Admin/ProfileEdit.php");
			//Dev::callView('Admin.ProfileEdit'); #Dosn't Work For What?!
		} else
			require_once("view/Admin/ProfileNotAccess.view.php");

		break;

	case "ProfileActivity":
		$info = $admin->ProfileAdmin();
		require_once("view/Admin/ProfileActivity.php");
		break;

	case "PlanAdd":
		if (isset($_POST['SubmitPlan'])) {

			$admin_id = $_SESSION['admin'];
			$data['text'] = $_POST['text'];
			$data['title'] = $_POST['title'];
			$admin->Add_Plan($admin_id, $data);
			$manageData->GotoPart('Profile');
		}
		break;
}
