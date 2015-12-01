<?php
require_once("dbcontroller.php");
require_once("combos.php");
$db_handle = new DBController();
if (!empty($_POST["submit"])) {

    $sql = 'SELECT * FROM votantes where cedula=' . $_POST["ci-votante"];
    $total = mysql_num_rows(mysql_query($sql));
    if ($total == 0) {
        $result = mysql_query("INSERT INTO votantes(cedula, nombre, telefono,ci_patrullero,status_voto,aporte_institucion) VALUES('" . $_POST["ci-votante"] . "','" . $_POST["txt-nom-ape"] . "','" . $_POST["int-telefono"] . "','" . $_POST["int-ci-patrullero"] . "','0','" . $_POST["txt-institucion"] . "')");
        if (!$result) {
            $message = "Error Por Favor Comunicate con el Administrador";
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:exist_votante.php");
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Area de Registro de Votantes</h3>
                </div>
                <div class="panel-body">
                    <img class="img-responsive" src="slide2.jpg" style="width: 100%">
                    <form name="frmToy" method="post" action="" id="frmToy" >
                        <div class="row">  
                            <!--Campo Cedula Jefe Patrulla-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">C&eacute;dula del Jefe de Patrulla</label>
                                    <span id="int-ci-patrullero-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="int-ci-patrullero" name="int-ci-patrullero" placeholder="Ingrese Correctamente la C&eacute;dula" class="form-control" onkeydown="return enteros(this, event)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">C&eacute;dula del Votante</label>
                                    <span id="ci-votante-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="ci-votante" name="ci-votante" placeholder="Ingrese Correctamente la C&eacute;dula" class="form-control" onkeydown="return enteros(this, event)">
                                    </div>
                                </div>          




                            </div>
                        </div>

                        <div class="row">  
                            <!--Campo Cedula Votante-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Nombres/Apellidos del Votante</label>
                                    <span id="txt-nom-ape-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-nom-ape" name="txt-nom-ape" placeholder="Ingrese Correctamente los Nombres y Apellidos" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Tel&eacute;fono del Votante</label>
                                    <span id="int-telefono-info" class="info"></span><br/>  
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
                            <!--Campo Institucion Aporta-->
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Centro de Votaci&oacute;n</label>
                                    <span id="txt-centrovotacion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-centrovotacion" name="txt-centrovotacion" placeholder="Ingrese Correctamente la Informaci&oacute;n Solicitada" class="form-control">
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Institucion</label>
                                    <span id="txt-institucion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-institucion" name="txt-institucion" placeholder="Ingrese Correctamente la Informaci&oacute;n Solicitada" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Institucion Aporta-->
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Municipio</label>
                                    <span id="txt-centrovotacion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <div id="demoDer"> 
                                            <select  name="estados" id="estados" class="form-control" >
                                                <option value="0">Selecciona opci&oacute;n...</option>
                                                <?php
                                                generaMunicipios();
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Parroquia</label>
                                    <span id="txt-institucion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <?php
                                        generaMunicipios();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Institucion Aporta-->
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Sector</label>
                                    <span id="txt-centrovotacion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>

                                    </div>
                                </div>                                

                            </div>
                        </div>





                        <div class="row">  
                            <!--Boton guardar-->
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: right; margin-top: 10px; ">
                                    <a href="index.php" class="btn btn-info" id="btnAddAction"><span aria-hidden="true" class="glyphicon glyphicon-home"></span> Regresar</a>
                                    <input type="submit" name="submit" id="btnAddAction" value="Guargar" class="btn btn-success" onClick="return validate_new_votante();" />
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