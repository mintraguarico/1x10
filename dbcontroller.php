<?php

class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "1nf0rgu4";
	private $database = "mintraguarico";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password);
                 mysql_query("SET NAMES 'utf8'");
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
                 mysql_query("SET NAMES 'utf8'");
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
                 mysql_query("SET NAMES 'utf8'");
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
                 mysql_query("SET NAMES 'utf8'");
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>