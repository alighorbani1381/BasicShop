<?php
function array_value($key, $array)
{
	if (array_key_exists($key, $array)) {
		$value = $array[$key];
	} else {
		$value = false;
		die("Doeseitn TElkfsdjlkjfsdlk");
	}
	return $value;
}

//Validation Sentence
$ValidationSentence = [
	'required' => ' The :attribute is must be required ',
	'min' => ' The :attribute  is Smaller Than Authorized Value ! ',
	'max' => ' The :attribute  is Bigger Than Authorized Value ! ',
	'format' => [
		'text' => ' The :attribute  is must be Text ! ',
		'number' => 'The :attribute  is must be Number ! ',
		'email' => 'The :attribute  is must be Email ! ',
	]
];

$attribute = [
	'name' => 'نام',
	'lastname' => 'نام خانوادگی',
	'phone' => 'شماره تماس',
];

function create_error($key = 'required', $attributes)
{
	global $ValidationSentence;
	global $attribute;
	$persian = array_value('phone', $attribute);
	$english_error = array_value($key, $ValidationSentence);
	$er = str_ireplace(':attribute', $persian, $english_error);
	echo $er;
}


create_error('required', $attribute);
