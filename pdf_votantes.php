<?php

require_once("dbcontroller.php");
require_once('class.ezpdf.php');
$db_handle = new DBController();







$bd_host = "localhost:3306";
$bd_usuario = "root";
$bd_password = "1nf0rgu4";
$bd_base = "sala-situacional";
$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error con la conexión");
mysql_select_db($bd_base, $con) or die("Error al seleccionar db");
$sql = 'SELECT * FROM vsw_jefe_votante';
//	var_dump($sql);
//        exit();
$resSql = mysql_query($sql) or die("<br>Error consulta</br>" . mysql_error());

$pdf = new Cezpdf('A4', 'landscape');
$pdf->selectFont('fonts/Helvetica.afm');
//$pdf->ezSetCmMargins(0,30,1.5,1.5);

while ($row = mysql_fetch_row($resSql)) {
    $data[] = array('Cedula Votante' => $row[2], 'Nombres/Apellidos Votante' => $row[1], 'Telefono_Votante' => $row[3], 'Nombres Apellidos Jefe Patrulla' => $row[5]);
}

$pdf->ezTable($data);
$pdf->ezStream();









echo $_GET["id"];
?>