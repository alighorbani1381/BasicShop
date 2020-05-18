<?php
require_once("Panel_Admin/model/UserModel.php");
$class=new user();

switch($action){


case "signup":
if(isset($_POST['submit'])){
	//Validation Data From Input
	ValidateParam(request,$SingupUser_Validation);
		if(!Validation_HasError()):
			$data=XSS_Bind(request,$SingupUser_Bind);
			$class->add_user($data);
			header("location:index.php");
		endif;
}
break;

case "login":
if(isset($_POST['submit'])){
    $data=$_POST['frm'];
    $info=$class->login_user($data);
  

	
    if($info==false){
        echo "نام کاربری اشتباه است";
    }else{
$input_password=md5($data['password']);
if($input_password==$info->password){
    $_SESSION['user_id']=$info->id;
    $_SESSION['user_name']=$info->name;
	header("location:index.php");
}else{
	echo "رمز عبور صحیح نیست";
}
    }
    
}
break;



case "logout":
$class->logout_user();
header("location:index.php");
break;


}
$Target_View="view/".$controller."/".$action.".php";
require_once($Target_View);
?>