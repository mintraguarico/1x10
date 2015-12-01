<?php
session_start();
require_once("dbcontroller.php");
require_once("combos.php");
$db_handle = new DBController();
if (!empty($_POST["submit"])) {
    $ci = $_POST["int-ci"];
    $sql = 'SELECT * FROM jefepatrulla where cedula=' . $_POST["int-ci"];
    $total = mysql_num_rows(mysql_query($sql));
    if ($total == 0) {
        $result = mysql_query("INSERT INTO jefepatrulla(cedula, nombre, telefono,centrovotacion) VALUES('" . $_POST["int-ci"] . "','" . $_POST["txt-nom-ape"] . "','" . $_POST["int-telefono"] . "','" . $_POST["txt-centrovotacion"] . "')");

        if (!$result) {
            $message = "Error Por Favor Comunicate con el Administrador";
        } else {
            header("Location:index.php");
        }
    } else {

        header("Location:exist_patrullero.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nuevo Registro de Patrulleros</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" type="text/css" rel="stylesheet" />
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/validaciones.js" type="text/javascript"></script>
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include("barner.php"); ?>
        <?php include("navi.php"); ?>
        <div class="container-fluid">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Area de Registro de Patrulleros</h3>
                </div>
                <div class="panel-body">
                    <form name="frmToy" method="post" action="" id="frmToy" >
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Buscar Patrullero</label>
                                    <span id="int-ci-busqueda_patrullero-info" class="info"></span><br/>  
                                    <div class="input-group"> 
                                        <input type="text"  name="int-ci-busqueda_patrullero" id="int-ci-busqueda_patrullero" placeholder="Ingrese C&eacute;dula a Buscar"  class="form-control"  class="form-control"  onkeydown="return enteros(this, event)"> 
                                        <input type="hidden"  id="ci-patrullero" name="ci-patrullero"> 
                                        <input type="hidden"  id="nacionalidad" name="nacionalidad"> 
                                        <div class="input-group-btn">
                                            <button id="btnNuevaBusquedaPatrullero" style="display: none" class="btn btn-warning" type="button" onclick="nuevaBusquedavswPatrullero();"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Nueva Busqueda</button> 
                                            <button id="btnPatrullero" class="btn btn-info" type="button"  onclick="buscarvswPatrullero();"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Buscar Patrullero</button> 
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">C&eacute;dula del Patrullero</label>
                                    <span id="int-ci-info" class="info"></span><br/>  
                                    <div id="id-div-int-ci-patrullero"class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="int-ci" name="int-ci" placeholder="" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Nombre del Jefe de Patrulla</label>
                                    <span id="txt-nom-ape-info" class="info"></span><br/>  
                                    <div  id="id-div-txt-nombre-patrullero" class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="txt-nom-ape" name="txt-nom-ape" placeholder="" class="form-control" onkeydown="return enteros(this, event)" readonly="">
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Municipio</label>
                                    <span id="txt-municipio-info" class="info"></span><br/>  
                                    <div id="id-div-municipio-patrullado" class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-municipio" name="txt-municipio"  class="form-control" readonly="" readonly="">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">  
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Parroquia</label>
                                    <span id="txt-parroquia-info" class="info"></span><br/>  
                                    <div id="id-div-parroquia-patrullado" class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-parroquia" name="txt-parroquia"  class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Centro de Votaci&oacute;n</label>
                                    <span id="txt-centrovotacion-info" class="info"></span><br/>  
                                    <div id="id-div-centrovotacion-patrullado" class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-centrovotacion" name="txt-centrovotacion"  class="form-control" readonly="" readonly="">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Institucion Aporta-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Tel&eacute;fono</label>
                                    <span id="int-telefono-info" class="info"></span><br/>  
                                    <div id="id-div-tlf-patrullado" class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-phone"></i>
                                        </span>
                                        <input type="text" id="int-telefono" name="int-telefono" placeholder="Ingrese Correctamente la Informaci&oacute;n Solicitada" class="form-control" >
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Eje</label>
                                    <span id="id-eje-patrullellero-info" class="info"></span><br/>  
                                    <div id="id-div-eje-patrullellero" class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <select  name="id-eje-patrullellero" id="id-eje-patrullellero" class="form-control" >
                                            <option value="0">Seleccione una Opci&oacute;n...</option>
                                            <?php
                                            ejeRolPatrullero();
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Boton guardar-->
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: right; margin-top: 10px; ">
                                    <a href="index.php" class="btn btn-info" id="btnAddAction"><span aria-hidden="true" class="glyphicon glyphicon-home"></span> Regresar</a>
                                    <input type="submit" name="submit" id="btnAddAction" value="Guargar" class="btn btn-success" onClick="return validateNuevoPatrullero();" />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>