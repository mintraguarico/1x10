<?php

header("Content-Type: text/html;charset=utf-8");
include 'conexion.php';

function rol() {
    conectar();
    $consulta = mysql_query("SELECT clvcodigo, stritem_a FROM tbl_maestro WHERE blnborrado=0 and clvpadre =14 order by stritem_a");
    while ($registro = mysql_fetch_row($consulta)) {
        echo "<option value='" . $registro[0] . "'>" . $registro[1] . "</option>";
    }
    desconectar();
}

function eje() {
    conectar();
    $consulta = mysql_query("SELECT clvcodigo, stritem_a FROM tbl_maestro WHERE blnborrado=0 and clvpadre =2 order by stritem_a");
    while ($registro = mysql_fetch_row($consulta)) {
        echo "<option value='" . $registro[0] . "'>" . $registro[1] . "</option>";
    }
    desconectar();
}

function ejeRolPatrullero() {
    conectar();
    if ($_SESSION['id_rol'] == 17) {
        $consulta = mysql_query("SELECT clvcodigo, stritem_a FROM tbl_maestro WHERE blnborrado=0 and clvpadre ='" . $_SESSION['id_eje'] . "' order by stritem_a");
        while ($registro = mysql_fetch_row($consulta)) {
            echo "<option value='" . $registro[0] . "'>" . $registro[1] . "</option>";
        }
    } /* else {
      $consulta = mysql_query("SELECT clvcodigo, stritem_a FROM tbl_maestro WHERE clvpadre ='" . $_SESSION['id_eje'] . "' ");
      while ($registro = mysql_fetch_row($consulta)) {
      echo "<option value='" . $registro[0] . "'>" . $registro[1] . "</option>";
      }
      } */desconectar();
}

function generaMunicipios() {
    conectar();
    $consulta = mysql_query("SELECT clvcodigo, strdescripcion FROM tbl_municipio WHERE blnborrado=0 and clvestado=12 order by strdescripcion");
    while ($registro = mysql_fetch_row($consulta)) {
        echo "<option value='" . $registro[0] . "'>" . $registro[1] . "</option>";
    }

    desconectar();
    /* while ($registro = mysql_fetch_row($consulta)) {
      echo "<option value='" . $registro[0] . "'>" . $registro[1] . "</option>";
      } */
}
?>

