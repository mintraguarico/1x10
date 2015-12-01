<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_POST["submit"])) {
    $result = mysql_query("UPDATE votantes set cedula = '" . $_POST["int-ci"] . "', nombre = '" . $_POST["txt-nom-ape"] . "', telefono = '" . $_POST["int-telefono"] . "'  WHERE  cedula=" . $_GET["id"]);
    if (!$result) {
        $message = "Problem in Editing! Please Retry!";
    } else {
        header("Location:index.php");
    }
}
$result = $db_handle->runQuery("SELECT * FROM vsw_jefe_votante WHERE Cedula_Votante=" . $_GET["id"]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Editar Registro</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="style.css" type="text/css" rel="stylesheet" />
        <script src="validaciones.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Area de Modificaci&oacute; de Patrulleros</h3>
                </div>
                <div class="panel-body">
                    <img class="img-responsive" src="slide2.jpg" style="width: 100%">
                    <form name="frmToy" method="post" action="" id="frmToy" >
                        <div class="row">  
                            <!--datos del jefe-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">C&eacute;dula Jefe Patrulla</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="int-ci-j-p" name="int-ci-j-p" value="<?php echo $result[0]["Cedula_Jefe"]; ?>" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Nombres/Apelliodos Jefe Patrulla</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="txt-nmbre-j-f" name="txt-nmbre-j-f" value="<?php echo $result[0]["Nombres_Apellidos_Jefe"]; ?>" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <input type="text" id="int-ci" name="int-ci" placeholder="Ingrese Correctamente la C&eacute;dula" value="<?php echo $result[0]["Cedula_Votante"]; ?>" class="form-control" onkeydown="return enteros(this, event)" readonly="readonly">
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
                                        <input type="text" id="txt-nom-ape" name="txt-nom-ape" placeholder="Ingrese Correctamente los Nombres y Apellidos" value="<?php echo $result[0]["Nombres_Apellidos_Votante"]; ?>" class="form-control">
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
                                        <input type="text" id="int-telefono" name="int-telefono" placeholder="Ingrese Correctamente el N&uacute;mero de Telef&oacute;nico" value="<?php
                                        if ($result[0]["Telefono_Votante"] == "NO TIENE") {
                                            echo "";
                                        } else {
                                            echo $result[0]["Telefono_Votante"];
                                        }
                                        ?>" class="form-control" onkeydown="return enteros(this, event)">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
						
						
						
						 <div class="row">  
                            <!--Campo Centro Votacion-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label style="padding-top:20px;">Centro de Votaci&oacuten</label>
                                    <span id="txt-Centro_Votacion_Jefe-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-Centro_Votacion_Jefe" name="txt-Centro_Votacion_Jefe" placeholder="Ingrese Correctamente la Informaci&oacute;n Solicitada" value="<?php echo $result[0]["Centro_Votacion_Jefe"]; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
							
						 <div class="row">  
                            <!--Campo Aporte_Institucion-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label style="padding-top:20px;">Centro de Votaci&oacuten</label>
                                    <span id="txt-Aporte_Institucion-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="txt-Aporte_Institucion" name="txt-Aporte_Institucion" placeholder="Ingrese Correctamente la Informaci&oacute;n Solicitada" value="<?php echo $result[0]["Aporte_Institucion"]; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
						
						
						
						
						
						
						
						
                        <div class="row">  
                            <!--Boton guardar-->
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: right; margin-top: 10px; ">
                                    <a href="index.php" class="btn btn-info" id="btnAddAction"><span aria-hidden="true" class="glyphicon glyphicon-home"></span> Regresar</a>
                                    <input type="submit" name="submit" id="btnAddAction" value="Guargar" class="btn btn-success" onClick="return validate_edit_jefe_votante()"/>

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