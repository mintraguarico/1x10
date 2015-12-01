<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["id"])) {
//    var_dump($_GET["id"]);
//    exit();
//    die();
	$result = mysql_query("DELETE FROM votantes WHERE cedula=".$_GET["id"]);
	if(!empty($result)){
		header("Location:index.php");
	}
}
?>