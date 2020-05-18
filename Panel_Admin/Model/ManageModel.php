<?php
/* Set Config model and Product Category Use in This Model */
require_once("ConfigModel.php");
class ControlSystem
{

	public function __construct()
	{
		global $conn;
		$this->pdo = $conn;
	}

	#This function for Pagination Data Give From Data Base
	/*
	 Parameters=> 
	 1) Page -> Use in PaginationLinks Like -> index.php?page=2 *Required
	 2) Paginate -> count of data per Page *Required
	 3) Table -> Table That  Your need to Paginate Data* Required 
	 4) Extera -> Whene YOU Need To Set Extera Statement For SQL Statement Use this Parameter  *NO Required
	 */
	public function paginate($page = 1, $pagin, $table, $extera = null)
	{
		$offset = $page * $pagin;
		$offset = $offset - $pagin;

		if ($extera != null)
			$sql = $this->pdo->prepare("select * from $table limit $pagin offset=$offset $extera");
		else
			$sql = $this->pdo->prepare("select * from $table limit $pagin offset $offset");

		$sql->execute();
		$paginated['data'] = $sql->fetchAll(PDO::FETCH_OBJ);
		$paginated['count'] = count($paginated['data']);

		// Check Input Page Num (In The URL) Bigger Than Existed Redirect To Last Page Number
		if ($paginated['count'] == 0 && $page != 1) {
			$last = $this->PaginationLinks($pagin, $table, $extera = null);
			$part = $this->goToPageNum($last);
			$this->GotoPart($part);
		}

		return $paginated;
	}

	#This Function Show Pagination Links For Acess to Data
	public function PaginationLinks($pagin, $table, $extera = null)
	{

		//Select All Selected Data From Target Table
		if ($extera != null)
			$sql = $this->pdo->prepare("select * from $table");
		else
			$sql = $this->pdo->prepare("select * from $table $extera");

		$sql->execute();
		$rows = $sql->fetchAll(PDO::FETCH_OBJ);

		//Get Base This Page URL for Create Pagination  Links
		$url = $this->GetURL();

		//Find Selected Paginate Tab Number (NOW)
		$selected = $this->getPageNum();
		$next = $selected + 1;
		$previous = $selected - 1;

		//Creating Count of Pagination Buttons
		$number = count($rows);
		$forcount = $number / $pagin;
		$forcount = floor($forcount) + 1;

		// Whene Count of Paginate Data == Count of Paginate Buttons
		if ($forcount == $pagin)
			$forcount--;

		//Set Links of Next And Provice Paginate Button
		if ($next > $forcount)
			$next = 1;

		if ($previous < 1)
			$previous = $forcount;

		if ($number > $pagin) {

			//Show Pagination Buttons
			echo '
				<ul class="pagination"> 
					<li>
						<a href="/' . $url . '?page=' . $previous . '"/> ▶  </a>
					</li>';

			for ($i = 1; $i <= $forcount; $i++)
				if ($i == $selected)
					echo '<li class="active"><a href="/' . $url . '?page=' . $i . ' ">' . $i . '</a></li>';
				else
					echo '<li><a href="/' . $url . '?page=' . $i . ' ">' . $i . '</a></li>';
			echo '
					<li>
						<a href="/' . $url . '?page=' . $next . '"/> ◀</a>
					</li>
				</ul>
				';
		}
		return $forcount;
	} //endfunction

	#Get URL Function for Get This URL and if need Clear Query String With it 
	public function GetURL($type = null)
	{

		$url = urldecode($_SERVER['REQUEST_URI']); //Give URL
		$url = substr($url, 1); //Delete first Slash From URl

		if ($type == null) {
			$array = explode("?", $url);
			$querySrting = end($array);
			$emptyUrl = str_replace("?" . $querySrting, "", $url);
			return $emptyUrl;
		} else
			return $url;
	}

	#Get BaseURL From URL PHP_SELF 
	public function BaseURL($SubAddress = null)
	{
		$url = $this->GetURL();
		$base = basename($_SERVER['PHP_SELF']);
		$address = str_ireplace($base, "", $_SERVER['PHP_SELF']);
		if ($SubAddress != null)
			$customAddress = $address . $SubAddress;
		else
			$customAddress = $address;

		return $customAddress;
	}

	#Get Page Query String From URL Like This => product?page=4 to Send paginate Method
	public function getPageNum()
	{
		$url = $this->GetURL("ALL");
		$array = explode("?page=", $url);
		if (count($array) != 1)
			$start_from = end($array);
		else
			$start_from = 1;
		return $start_from;
	}

	public function goToPageNum($customNumber)
	{
		$full_url = $this->GetURL("ALL");
		$fd = $this->getPageNum();
		$pageNum = "?page=" . $fd;
		$finalAdderss = str_replace($pageNum, "?page=$customNumber", $full_url);
		$x = end(explode("/", $finalAdderss));
		return $x;
	}

	#Use This Method Insted of Header From Main Route
	public function GotoPart($part)
	{
		$address = $this->BaseURL();
		header("location:" . $address . $part);
	}

	public function explodeDateTime($statement, $type = null)
	{
		$array = explode(" ", $statement);
		$result['date'] = $array[0];
		$result['time'] = $array[1];

		$date = explode("-", $result['date']);
		$result['year'] = $date[0];
		$result['month'] = $date[1];
		$result['day'] = $date[2];

		$time = explode(":",	$result['time']);
		$result['houre'] = $time[0];
		$result['minute'] = $time[1];
		$result['second'] = $time[2];


		return $result;
	}
} //endclass
$manageData = new ControlSystem();
