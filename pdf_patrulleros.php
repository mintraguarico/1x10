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
$sql = 'SELECT * FROM jefepatrulla';
//	var_dump($sql);
//        exit();
$resSql = mysql_query($sql) or die("<br>Error consulta</br>" . mysql_error());

$pdf = new Cezpdf('A4', 'landscape');
$pdf->selectFont('fonts/Helvetica.afm');
//$pdf->ezSetCmMargins(0,30,1.5,1.5);

while ($row = mysql_fetch_row($resSql)) {
    $data[] = array('CEDULA' => $row[1], 'NOMBRES/APELLIDOS' => $row[2], 'TELEFONO' => $row[3], 'CENTRO VOTACION' => $row[4]);
}

 $pdf->ezTable($db_data, $col_names, 'Graduacion registrada el 3 de Diciembre del 2009', array('width'=>550));
$pdf->ezTable($data);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
           
$pdf->ezStream();

?>