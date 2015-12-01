<?php
session_start();
if (isset($_SESSION['username'])) {
    require_once("../dbcontroller.php");
    require_once("../combos.php");
    $db_handle = new DBController();
    if (!empty($_POST["submit"])) {

        $tlf = str_replace("-", "", $_POST["int-telefono"]);

        /*
          nacinalidad*,cedula*,nombre*,telefono*,ci_patrullero*,aporte_institucion*,municipio*,parroquia*,centrovotacion* */

        $sql = 'SELECT * FROM tbl_patrullado where cedula=' . $_POST["ci-patrullado"];
        $total = mysql_num_rows(mysql_query($sql));
        if ($total == 0) {
            $result = mysql_query("INSERT INTO tbl_patrullado(nacinalidad,cedula,nombre,telefono,ci_patrullero,aporte_institucion,municipio,parroquia,centrovotacion,clvadministrador) VALUES('" . $_POST["txt-nacionalidad-patrullado"] . "','" . $_POST["ci-patrullado"] . "','" . $_POST["txt-nombre-patrullado"] . "','" . $tlf . "','" . $_POST["ci-patrullero"] . "','" . $_POST["id-eje-patrullado"] . "','" . $_POST["txt-municipio"] . "','" . $_POST["txt-parroquia"] . "','" . $_POST["txt-centrovotacion"] . "','" . $_SESSION['clvusuario'] . "')");
//            var_dump("INSERT INTO tbl_patrullado(nacinalidad,cedula,nombre,telefono,ci_patrullero,aporte_institucion,municipio,parroquia,centrovotacion) VALUES('" . $_POST["txt-nacionalidad-patrullado"] . "','" . $_POST["ci-patrullado"] . "','" . $_POST["txt-nombre-patrullado"] . "','" . $tlf . "','" . $_POST["ci-patrullero"] . "','" . $_POST["id-eje-patrullado"] . "','" . $_POST["txt-municipio"] . "','" . $_POST["txt-parroquia"] . "','" . $_POST["txt-centrovotacion"] . "')");
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
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Nuevos Ptrullados</title>
            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="../css/style.css" type="text/css" rel="stylesheet" />
            <script src="../js/jquery.min.js" type="text/javascript"></script>
            <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

            <script src="../js/validaciones.js" type="text/javascript"></script>
            <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
        </head>
        <body>
            <img class="img-responsive" src="../img/barnerindex.jpg" style="width: 100%">
            <div id="loading" style="display: none;"><div class="imgLoad"></div></div>

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            <li>
                                <a href="add_patrullado.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Nuevo Patrullado</a>
                           <!--<a id="btnAddAction" class="evento" data-toggle="modal" data-target=".modal-new"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Nuevos Registros</a>-->
                            </li>   
                            <li>
                                <a id="btnAddAction" class="evento" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Generar PDF</a>
                            </li>   

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a id="btnCerraraSesion" class="evento" href="../logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrara Sesion</a>
                            </li> 

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="container-fluid">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Area de Registro de Patrullados</h3>
                    </div>
                    <div class="panel-body">
                        <form name="frmPatrullado" method="post" action="" id="frmPatrullado" >
                            <div class="row">  
                                <!--Campo Cedula Jefe Patrulla-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">Buscar Jefe de Patrulla</label>
                                        <span id="int-ci-busqueda_patrullero-info" class="info"></span><br/>  
                                        <div class="input-group"> 
                                            <input type="text"  name="int-ci-busqueda_patrullero" id="int-ci-busqueda_patrullero" placeholder="Ingrese C&eacute;dula a Buscar"  class="form-control"  class="form-control"  onkeydown="return enteros(this, event)"> 
                                            <input type="hidden"  id="ci-patrullero" name="ci-patrullero"> 
                                            <div class="input-group-btn">
                                                <button id="btnNuevoBusquedaPatrullero" style="display: none" class="btn btn-warning" type="button" onclick="nuevaBusquedaPatrullero();"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Nueva Busqueda</button> 
                                                <button id="btnPatrullero" class="btn btn-info" type="button"  onclick="buscarPatrulleroOperador();"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Buscar Patrullero</button> 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">C&eacute;dula del Patrullero</label>
                                        <span id="int-ci-patrullero-info" class="info"></span><br/>  
                                        <div id="id-div-int-ci-patrullero"class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                            </span>
                                            <input type="text" id="int-ci-patrullero" name="int-ci-patrullero" placeholder="" class="form-control" readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">Nombre del Jefe de Patrulla</label>
                                        <span id="txt-nombre-patrullero-info" class="info"></span><br/>  
                                        <div  id="id-div-txt-nombre-patrullero" class="input-group">
                                            <span class="input-group-addon">
                                                <i class=" glyphicon glyphicon-sort-by-order"></i>
                                            </span>
                                            <input type="text" id="txt-nombre-patrullero" name="txt-nombre-patrullero" placeholder="" class="form-control" onkeydown="return enteros(this, event)" readonly="">
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">Tel&eacute;fono del Jefe de Patrulla</label>
                                        <span id="txt-telefono-patrullero-info" class="info"></span><br/>  
                                        <div id="id-div-txt-telefono-patrullero" class="input-group">
                                            <span class="input-group-addon">
                                                <i class=" glyphicon glyphicon-sort-by-order"></i>
                                            </span>
                                            <input type="text" id="txt-telefono-patrullero" name="txt-nombree-patrullero" placeholder="" class="form-control" readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">Buscar Patrullado</label>
                                        <span id="int-ci-busqueda_patrullado-info" class="info"></span><br/>  
                                        <div class="input-group"> 
                                            <input type="text"  id="int-ci-busqueda_patrullado" name="int-ci-busqueda_patrullado" value="" placeholder="Ingrese C&eacute;dula a Buscar" class="form-control"  class="form-control" onkeydown="return enteros(this, event)"> 
                                            <input type="hidden"  id="ci-patrullado" name="ci-patrullado"> 
                                            <input type="hidden"  id="txt-nacionalidad-patrullado" name="txt-nacionalidad-patrullado"> 
                                            <div class="input-group-btn"> 
                                                <button id="btnNuevaBusquedaPatrullado" style="display: none" class="btn btn-warning" type="button" onclick="nuevaBusquedaPatrullado();"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Nueva Busqueda</button> 
                                                <button id="btnPatrullado" class="btn btn-success" type="button" onclick="buscarPatrulladoOperador();"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Buscar Patrullado</button> 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">C&eacute;dula del Patrullado</label>
                                        <span id="int-ci-patrullado-info" class="info"></span><br/>  
                                        <div id="id-div-cedula-patrullado"class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                            </span>
                                            <input type="text" id="int-ci-patrullado" name="int-ci-patrullado" class="form-control" readonly="" >
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label style="padding-top:20px;">Nombres/Apellidos del Patrullado</label>
                                        <span id="txt-nombre-patrullado-info" class="info"></span><br/>  
                                        <div id="id-div-nombre-apellido-patrullado" class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                            </span>
                                            <input type="text" id="txt-nombre-patrullado" name="txt-nombre-patrullado"  class="form-control" readonly="">
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
                                        <span id="id-eje-patrullado-info" class="info"></span><br/>  
                                        <div id="id-div-eje-patrullado" class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                            </span>
                                            <select  name="id-eje-patrullado" id="id-eje-patrullado" class="form-control" >
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
                                        <input type="submit" name="submit" id="btnGuardarPatrullado" value="Guargar" class="btn btn-success" onClick="return validate_new_Patrullado();" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </body>
    </html>
    <?php
} else {
    header("Location: login.php");
}
?>