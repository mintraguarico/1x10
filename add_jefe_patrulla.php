<?php
require_once("dbcontroller.php");
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
        <title>Nuevos Registro</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="style.css" type="text/css" rel="stylesheet" />
        <script src="validaciones.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Area de Registro de Jefes de Patrulla</h3>
                </div>
                <div class="panel-body">
                    <img class="img-responsive" src="slide2.jpg" style="width: 100%">
                    <form name="frmToy" method="post" action="" id="frmToy" >
                        <div class="row">  
                            <!--Campo Cedula-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label style="padding-top:20px;">C&eacute;dula</label>
                                    <span id="ci-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="int-ci" name="int-ci" placeholder="Ingrese Correctamente la C&eacute;dula" class="form-control" onkeydown="return enteros(this, event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Nombres Apellidos-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label style="padding-top:20px;">Nombres/Apellidos</label>
                                    <span id="txt-nom-ape-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-nom-ape" name="txt-nom-ape" placeholder="Ingrese Correctamente los Nombres y Apellidos" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Telefono-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label style="padding-top:20px;">Tel&eacute;fono</label>
                                    <span id="telefono-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="int-telefono" name="int-telefono" placeholder="Ingrese Correctamente el N&uacute;mero de Telef&oacute;nico" class="form-control" onkeydown="return enteros(this, event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Nombres Apellidos-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label style="padding-top:20px;">Centro de Votaci&oacute;n</label>
                                    <span id="txt-centrovotacion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-centrovotacion" name="txt-centrovotacion" placeholder="Ingrese Correctamente el Centro de Votaci&oacute;n" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Boton guardar-->
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: right; margin-top: 10px; ">
                                    <a href="index.php" class="btn btn-info" id="btnAddAction"><span aria-hidden="true" class="glyphicon glyphicon-home"></span> Regresar</a>
                                    <input type="submit" name="submit" id="btnAddAction" value="Guargar" class="btn btn-success" onClick="return validate();" />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="jquery.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>