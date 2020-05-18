<?php
/*
* Validation Settings For Change Language of Error and Customazation
* Error Create With This Array $ValidationSentence
*
*/
//Settings Default Set
define("Validation_Settings", true);

//Validation Sentence
$ValidationSentence = [
	'required' => 'وارد کردن :attribute	الزامی است ',
	'min' => ' مقدار :attribute 	کوچکتر از مقدار مجاز است ! ',
	'max' => 'مقدار :attribute   بزرگتر از حد مجاز است ! ',
	'format' => [
		'text' => ' مقدار :attribute باید متن باشد ! ',
		'iranian_phone' => 'مقدار :attribute  باید یک شماره موبایل واقعی باشد! ',
		'number' => 'مقدار :attribute  باید از نوع عدد باشد ! ',
		'email' => 'مقدار :attribute  باید یک ایمیل واقعی باشد  ! ',
	]
];

//Name of HTML Element attribute Requested Send to Server
$attribute = [
	'name' => 'نام',
	'lastname' => 'نام خانوادگی',
	'price' => 'قیمت',
	'off' => 'تخفیف',
	'title' => 'عنوان',
	'text' => 'توضیحات',
	'email' => 'ایمیل',
	'city' => 'شهر',
	'count' => 'تعداد',
	'job' => 'شغل',
	'username' => 'نام کاربری',
	'password' => 'رمز عبور',
	'birthday' => 'تاریخ تولد',
	'mobile' => 'شماره موبایل',
	'phone' => 'شماره تماس',
];
