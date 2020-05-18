<?php
require_once("ConfigModel.php");
class uploader
{

	public $thisfile;

	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	public function mainlist_folder()
	{
		$sql = $this->pdo->prepare("select * from folder_tbl where chid='0' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	public function sub_folder($id)
	{
		$sql = $this->pdo->prepare("select * from folder_tbl where chid='$id' ");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#Check File is Image && and Size is Ok
	public function check_img($file, $file_num)
	{
		$extentions = ["image/jpeg", "image/png"];
		$size = 1000000; //1MB
		$check = [
			"type" => "Error",
			"size" => "Error",
		];

		//Check Extention 
		foreach ($extentions as $extention) :
			if ($file['type'][$file_num] == $extention)
				$check["type"] = "OK";
		endforeach;

		//Check Size of Image
		if ($file['size'][$file_num] <= $size)
			$check["size"] = "OK";
		return $check;
	}



	#Get Extention When File is an Image
	public function get_extension($file, $file_num)
	{
		$status = $this->check_img($file, $file_num);
		$ext = null;
		if ($status['type'] == "OK" && $status['size'] == "OK") {
			$file_name = $file['name'][$file_num];
			$array = explode(".", $file_name);
			$ext = end($array);
		} else {
			$ext = $status;
		}
		return $ext;
	}

	public function uploade_file($file, $file_num)
	{
		$ext = $this->get_extension($file, $file_num);

		if (is_array($ext)) {
			$_POST['error'] = $ext;
		} else {
			$new_name = "Picture-" . rand() . "." . $ext;
			$from = $file['tmp_name'][$file_num];
			$to = "public/img/ProductList/" . $new_name;
			move_uploaded_file($from, "../" . $to);
			return $successful = ["successful" => true, "Adderss" => $to];
		}
	}

	#Get File From it Adderss => Use to Get Info after Uploade file
	public function getFileFromAddress($address)
	{
		$sql = $this->pdo->prepare("select * from uploader_tbl where address='$address' ");
		$sql->execute();
		$file = $sql->fetch(PDO::FETCH_OBJ);
		return $file;
	}

	#Add File into Uploader Table
	public function add_file($data, $picture)
	{
		if ($picture['successful'] == true) {
			$sql = $this->pdo->prepare("insert into uploader_tbl (title,folder,address,alt) values ('$data[title]','$data[folder]','$picture[Adderss]','$data[alt]')");
			$sql->execute();
			$this->thisfile = $picture;
			return $this;
		}
	}

	#Get Info of Uploaded file after Uplode
	public function getThisFile()
	{
		$file = $this->thisfile;
		$fileinfo = $this->getFileFromAddress($file['Adderss']);
		return $fileinfo;
	}


	#All File Uploaded
	public function files()
	{
		$sql = $this->pdo->prepare("select * from uploader_tbl");
		$sql->execute();
		$row = $sql->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	#for add Images for Product
	public function picture_attach($statements, $mode = "multiple")
	{
		if ($mode == "multiple") :
			foreach ($statements as $statement) {
				$sql = $this->pdo->prepare("insert into products_image (product_id, image_id) values ('$statement[product]', '$statement[picture]')");
				$sql->execute();
			} else :
			$sql = $this->pdo->prepare("insert into products_image (product_id, image_id) values ('$statements[product]', '$statements[picture]')");
			$sql->execute();
		endif;
	}

	#List of Any Uploded Files
	public function uploadedFiles()
	{
		$sql = $this->pdo->prepare("select * from uploader_tbl order by id desc");
		$sql->execute();
		$uploadedfiles = $sql->fetchAll(PDO::FETCH_OBJ);
		return $uploadedfiles;
	}

	#Give File From Uploaser Table with id
	public function uploadedFile($id)
	{
		$sql = $this->pdo->prepare("select * from uploader_tbl where id='$id' ");
		$sql->execute();
		$file = $sql->fetch(PDO::FETCH_OBJ);
		return $file;
	}

	#Delete Picture From Storage & Database
	public function deletePicture($picture_id)
	{
		$file = $this->uploadedFile($picture_id);
		unlink("../" . $file->address);

		$sql = $this->pdo->prepare("delete from uploader_tbl where id='$picture_id' ");
		$sql->execute();
	}
} //class
$uploaded = new uploader();
