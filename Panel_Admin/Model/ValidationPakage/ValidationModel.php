<?php

#Definde Default Settings About (Sessions & Error Reporting)
//session_start();
error_reporting(E_ALL);

#Import File Validation Need it
require_once('ValidationSettings.php');
require_once('ValidationRepository.php');



/*  Developer Function to Good Coding  Start */

#Set PHP Error in Catch
function SetCatchError($function, $message)
{
	$ErrorMessage = " <br><br><br><br><br><br>
	<div style='box-shadow: 2px 2px 5px 0px #666565;margin:0px auto; background-color:#9d0d0d; color:white; padding:18px; text-align:left; border-radius:6px; width:60%; margin-top:15%; font-size:X-Large;'>
	<b>
	<strong> 🧐 I'm Find Error  <strong <br><br><br>
	<span style='color:#00ff9f;'>Error Topic (<small>Error in</small>):</span>
	
	<span style='color:#ffb300;'>" .
		$function .
		" Function</span> </b><br><br><b><span style='color:#00ff9f;'>Error Message:  </span></b><span style='color:#c6c6c6;'>" . $message . "</span></div>";
	throw new Exception($ErrorMessage);
}

# Set Exception For Developer
function Set_PHP_Error($message, $type = "WARNING")
{
	$type = strtoupper($type);
	error_reporting(1);

	switch ($type) {
		case "FATAL":
			throw new Exception($message);
			die;
			break;

		case "WARNING":
			echo "Warning is hERE";
			break;
	}
}

#Set Type Of Request Send to Server (Post,Get)=> Request
function SetRequest($type_request = "POST")
{
	$type_request = strtoupper($type_request);
	if ($type_request == "POST")
		$request = $_POST;
	elseif ($request == "GET")
		$request = $_GET;
	else
		$request = $_REQUEST;

	return $request;
}

#Checking Existed Filed => ($request is Existed)
function CheckExisted($request, $filed)
{
	$data = $request[$filed];

	if (isset($data)) {
		return false;
	} else {
		return true;
	}
}

#Checking Empty Field
function CheckEmpty($request, $filed)
{
	if (!empty($request[$filed])) {
		return false;
	} else {
		return true;
	}
}

#Checking Maximum of input Value
function CheckMax($data, $value)
{
	$length = strlen($data);
	if ($length > $value)
		return true;
	else
		return false;
}

#Checking Minimum of input Value
function CheckMin($data, $value)
{
	$length = strlen($data);
	if ($length < $value)
		return true;
	else
		return false;
}

#Checking MimeType of Data (TEXT, EMAIL, NUMBER)
function CheckMimeType($data, $mimetype)
{
	$mimetype = strtoupper($mimetype);
	$error = false;
	try {
		switch ($mimetype) {
			case "TEXT":
				for ($number = 0; $number < 10; $number++) {
					$assay = strpos($data, "$number");
					if ($assay !== false)
						$error = true;
				} //endfor
				break;

			case "IRANIAN_PHONE":
				$assay = is_numeric($data);
				$length = strlen($data);
				if ($assay == false || $data[0] != 0 || $data[1] != 9 || $length != 11)
					$error = true;
				break;

			case "NUMBER":
				$assay = is_numeric($data);
				if ($assay == false)
					$error = true;
				break;

			case "EMAIL":
				$assay = filter_var($data, FILTER_VALIDATE_EMAIL);
				if ($assay == false)
					$error = true;
				break;

				//Set Default Parameter Not correnct Format
			default:
				$errorMessage = "Doesn't Exist « « $mimetype  » » Format for Validate it ! <br>  You Can Use This Parameter  (Text, Number, Iranian_phone, Email)";
				SetCatchError("ValidaParm Mime Type", $errorMessage);
				break;
		} //endswitch
	} //end try
	catch (Exception $e) {
		echo $e->getMessage();
		die;
	}
	return $error;
}

#Get Value of Assosiation Array With Key Use to Create Error
function array_value($key, $array, $extera_value = null)
{
	if (array_key_exists($key, $array)) {
		if ($extera_value != null)
			$value = $array[$key][$extera_value];
		else
			$value = $array[$key];
	} else
		$value = $key;


	return $value;
}

#Create Error With Validation Settings File Next to This File
function create_error_message($key, $type = 'required', $extera_value = null)
{
	global $ValidationSentence; //Use Variable  in Validation Settings File
	global $attribute; //Use Variable in Validation Settings File
	$persian = array_value($key, $attribute);
	$english_error = array_value($type, $ValidationSentence, $extera_value);
	$error_message = str_ireplace(':attribute', $persian, $english_error);
	return $error_message;
}

/*  Developer Function to Good Coding  End  */

#Find Type of Error And Validate it
function CheckValidationType($request, $key, $type_validation, $value_validation = null, $data)
{
	switch ($type_validation) {
		case "required":
			$has_error = CheckEmpty($request, $key);
			break;

		case "min":
			$has_error = CheckMin($data, $value_validation);
			break;

		case "max":
			$has_error = CheckMax($data, $value_validation);
			break;

		case "format":
			$has_error = CheckMimeType($data, $value_validation);
			break;

		default:
			$errormessage = "{{ " . $type_validation . " }} " . " is Invalid Type of Validation It Doesn't Exist !!";
			SetCatchError("Input Parameters From ValidateParam", $errormessage);
			break;
	} //Endswtich
	return $has_error;
}

#Colluction of All Validation Method (Final Method)
function ValidateParam($type_request = "POST", $fileds_and_statement_validation)
{

	//Reset Engine (Session & OldData)
	ResetEngine();

	// Set Request 
	$request = SetRequest($type_request);

	if (is_array($fileds_and_statement_validation)) {

		foreach ($fileds_and_statement_validation as $key => $statement) {
			$errors_type = explode("/", $statement);
			foreach ($errors_type as $error_type) {
				$explode_error_type = explode("=", $error_type);

				//Checking (Know) Type of Validation (format, min, max) And Give Parameter of Them
				if (count($explode_error_type) == 2) {
					$type_validation = $explode_error_type[0];
					$value_validation = $explode_error_type[1];
				} else {
					$type_validation = $error_type;
					$value_validation = $error_type; //thinking more about it
				}

				$data = $request[$key];

				//Select Type of Validation and Validate it :)
				try {
					if ($type_validation != null)
						$has_error = CheckValidationType($request, $key, $type_validation, $value_validation, $data);
				} catch (Exception $e) {
					echo $e->getMessage();
					die;
				}


				//Save Errors inside Session
				$NotExist = CheckExisted($request, $key);
				if ($NotExist)
					die(" <div class='dangerbadgate'> <h1> BadgateWay </h1> </div>");
				elseif ($has_error)
					$_SESSION['Errors'][$key][$type_validation] = $value_validation;
				else
					$_SESSION['OldData'][$key] = $request[$key];
			} // First Endforeach (Chose Type of Validation for Field & Validate it)

		} // Second Endforeach (Chose Field from input Array)

	} //is array end if  
	else
		Set_PHP_Error("Input of This Method is an Array You Can Enter one parameter in array", "fatal");
}

#Save Old Data into Session for Use Next Step after Validation
function Old($key, $type = "default")
{
	$type = strtolower($type);
	switch ($type) {
		case "bool":
			if (isset($_SESSION['OldData'][$key]))
				$message = $_SESSION['OldData'][$key];
			else
				$message = false;

			return $message;
			break;

		default:
			if (isset($_SESSION['OldData'][$key])) {
				$message = $_SESSION['OldData'][$key];
				echo $message;
			}
			break;
	}
}

//Show inEdit Give second Parameter
function OldEdit($key, $variable)
{
	if (isset($_SESSION['OldData'][$key])) {
		$old_data = $_SESSION['OldData'][$key];
		echo $old_data;
	} else
		echo $variable;
}

#This Method Show All Error in Engine WHEN Error is Existed 
function ShowAll()
{
	if (!empty($_SESSION['Errors'])) {
		foreach ($_SESSION['Errors'] as $field_name => $errors) {
			$error_types = array_keys($errors);
			foreach ($error_types as $error_type)
				Has_Error($field_name . "." . $error_type);
		} //endforeach
	} else {
		echo "<br><div role='alert' class='alert alert-success'>Doesn't Any Error Existed :) </div><br>";
	}
}

#Show Error in View (HTML) CustomShow
function Has_Error($key_type, $CustomMessage = null)
{
	$array = explode(".", $key_type);
	$num_state = count($array);
	if ($num_state < 2 || $num_state > 2)
		Set_PHP_Error("Your Statement is not Correct", "fatal");

	//Set Key (Field) And Type Of Error
	$key = $array[0];
	$type = $array[1];

	if (isset($_SESSION['Errors'][$key])) {
		if (isset($_SESSION['Errors'][$key][$type])) {
			switch ($type) {
				case "required":
					if (empty($CustomMessage))
						$message = create_error_message($key, 'required');
					else
						$message = $CustomMessage;
					break;
				case "format":
					if (empty($CustomMessage)) {
						$extera_value = $_SESSION['Errors'][$key][$type];
						$message = create_error_message($key, "format", $extera_value);
					} else
						$message = $CustomMessage;

					break;
				case "max":
					if (empty($CustomMessage))
						$message = create_error_message($key, 'max');
					else
						$message = $CustomMessage;
					break;
				case "min":
					if (empty($CustomMessage))
						$message = create_error_message($key, 'min');
					else
						$message = $CustomMessage;
					break;

				default:
					$errormessage = $type . "Invalid Type of Validation Doesn't Existe";
					Set_PHP_Error($errormessage, "fatal");
					break;
			} //endswitch


			echo "<div class='alert alert-danger' role='alert'>" . $message . "</div>";
			$error = false;
		} //end if is Existed Any Error for this Key (Field)
		else
			$error = true;
		return $error;
	} //end if isset Error Key (Field)	
}

# if your Validation has Error Redirect to page for show Error
function ValidateView($filename)
{

	if (!empty($_SESSION['Errors']))
		try {
			$address = $filename . ".php";
			if (file_exists($address))
				header("location:" .	$address);
			else {
				$message = "File doesn't Exist For Redirect to $address";
				SetCatchError(__FUNCTION__, $message);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			die;
		}
}

#if You Validation has Error
function Validation_HasError()
{
	$error = false;
	if (!empty($_SESSION['Errors']))
		$error = true;
	return $error;
}

# This Function for Prophulaxis XSS Attack 
function XSS_Bind($type_request = "POST", $fileds)
{

	//Know Request
	$request = SetRequest($type_request);


	//Get Parameter From Arrary
	try {
		if (is_array($fileds)) {
			foreach ($fileds as $field) {

				if (isset($request[$field])) {
					$user_data = $request[$field];
					//XSS Validation (to Prophulaxis inject javascript code)
					$user_data = trim($user_data);
					$user_data = stripslashes($user_data);
					$user_data = htmlspecialchars($user_data);
					$secure_data[$field] = $user_data;
				} else {
					$fMessage = "Does't Defiended $field FROM $type_request Request ";
					SetCatchError(__FUNCTION__, $fMessage);
				} //end if isset




			} //endforeach
			return $secure_data;
		} //end if is_array
		else {
			SetCatchError(__FUNCTION__, "Input Parameter From XSS_Bind Must Be Array");
		}
	} //end try
	catch (Exception $e) {
		echo $e->getMessage();
		die;
	}
}

#Show First Error of Any Field
function FirstError($key, $message = null)
{

	if (isset($_SESSION['Errors'][$key])) {

		//Get Errors Key Existed and choese first of that
		$types = array_keys($_SESSION['Errors'][$key]);
		$type = $types[0];
		if (isset($_SESSION['Errors'][$key][$type])) {

			switch ($type) {
				case "required":
					if (empty($message))
						$error_message = create_error_message($key, $type);
					break;

				case "format":
					if (empty($message)) {
						$extera_value = $_SESSION['Errors'][$key][$type];
						$error_message = create_error_message($key, "format", $extera_value);
					}
					break;

				case "max":
					if (empty($message))
						$error_message = create_error_message($key, 'max');
					break;
				case "min":
					if (empty($message))
						$error_message = create_error_message($key, 'min');
					break;

				default:
					$errormessage = $type . "Invalid Type of Validation Doesn't Existe";
					Set_PHP_Error($errormessage, "fatal");
					break;
			} //endswitch

			echo "<div class='alert alert-danger' role='alert'>" . $error_message . "</div>";
		} //end if is Existed Any Error for this Key (Field)


	} //end if isset Error Key (Field)


}

#Reset  Validation Engine (Session & Old Data NULL)
function ResetEngine()
{
	$_SESSION['Errors'] = null;
	$_SESSION['OldData'] = null;
}
