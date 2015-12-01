<?php

session_start();
include 'conexion.php';
$resultado1 = $_GET['op'];


switch ($resultado1) {
    case "patrullero":
        if ($_GET['ci'] == '') {
            $vacio = array("vacio" => 'si');
            print json_encode($vacio);
        } else {

            buscarPatrullero($_GET['ci']);
        }
        break;
    case "patrullado":
        if ($_GET['ci'] == '') {
            $vacio = array("vacio" => 'si');
            print json_encode($vacio);
        } else {

            buscarPatrullado($_GET['ci']);
        }
        break;
    case "patrullerovsw":
        if ($_GET['ci'] == '') {
            $vacio = array("vacio" => 'si');
            print json_encode($vacio);
        } else {

            buscarvswPatrullero($_GET['ci']);
        }
        break;
}

function buscarPatrullero($b) {
    conectar();
    $sql = mysql_query("SELECT * FROM tbl_patrullero WHERE cedula =" . $b . "");
    mysql_query("SET NAMES 'utf8'");
    $contar = mysql_num_rows($sql);
    if ($contar == 0) {

        $noExiste = array("noExiste" => 'no');
        print json_encode($noExiste);
    } else {
        while ($row = mysql_fetch_array($sql)) {
            print json_encode($row);
        }
    }
    desconectar();
}

function buscarvswPatrullero($b) {
    conectar();
    $sql = mysql_query("SELECT * FROM tbl_patrullero WHERE cedula =" . $b . "");
    mysql_query("SET NAMES 'utf8'");
    $contar = mysql_num_rows($sql);
    if ($contar !== 0) {

        $existePersona = array("existePatrullero" => 'si');
            print json_encode($existePersona);
    } else {
        $sqlPersona = mysql_query("SELECT * FROM tbl_persona WHERE cedula =" . $b . " limit 1");
        $contarPersona = mysql_num_rows($sqlPersona);
        if ($contarPersona == 0) {
            $existePersona = array("existePersona" => 'no');
            print json_encode($existePersona);
        } else {
            while ($rowPersona = mysql_fetch_array($sqlPersona)) {
                print json_encode($rowPersona);
            }
        }
    }
    desconectar();
}

function buscarPatrullado($b) {
    conectar();
    $sqlPatrullero = mysql_query("SELECT * FROM tbl_patrullero WHERE cedula =" . $b . " limit 1");
    $contarPatrullero = mysql_num_rows($sqlPatrullero);
    if ($contarPatrullero !== 0) {
        $existePatrullero = array("existePatrullero" => 'si');
        print json_encode($existePatrullero);
    } else {
        $sqlPatrullado = mysql_query("SELECT * FROM tbl_patrullado WHERE cedula =" . $b . " limit 1");
        $contarPatrullado = mysql_num_rows($sqlPatrullado);
        if ($contarPatrullado !== 0) {
            $existePatrullado = array("existePatrullado" => 'si');
            print json_encode($existePatrullado);
        } else {
            $sqlPersona = mysql_query("SELECT * FROM tbl_persona WHERE cedula =" . $b . " limit 1");
            $contarPersona = mysql_num_rows($sqlPersona);
            if ($contarPersona == 0) {
                $existePersona = array("existePersona" => 'no');
                print json_encode($existePersona);
            } else {
                while ($rowPersona = mysql_fetch_array($sqlPersona)) {
                    print json_encode($rowPersona);
                }
            }
        }
    }
    desconectar();
    /* conectar();
      $sql = mysql_query("SELECT * FROM tbl_patrullado WHERE ci_patrullero =" . $b . " limit 1");

      $contar = mysql_num_rows($sql);
      if ($contar !== 0) {

      $existe = array("existe" => 'si');
      print json_encode($existe);
      } else {
      $sqlPersona = mysql_query("SELECT * FROM tbl_persona WHERE cedula =" . $b . " limit 1");
      $contarPersona = mysql_num_rows($sqlPersona);
      if ($contarPersona == 0) {
      $existePersona = array("existepersona" => 'no');
      print json_encode($existePersona);
      } else {
      while ($rowPersona = mysql_fetch_array($sqlPersona)) {
      print json_encode($rowPersona);
      }
      }
      }
      desconectar(); */
}
?>

