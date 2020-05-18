<?php
class Dev{
	
		 public static function callView($address):void{
			 $array=explode(".",$address);
			 $address=implode("/",$array);
			$view="view/".$address.".php";
			if( file_exists($view) )
				 require_once($view);
			else
				Mjbox("فایل مورد نظر یافت نشد");
		}
}
