<?php
session_start();
require_once("dbcontroller.php");
require_once("combos.php");
$db_handle = new DBController();
if ($_SESSION['id_rol'] == 15) {
    if (!empty($_POST["submit"])) {
//    ' . $_POST["username"]
        $sql = 'SELECT * FROM tbl_usuario where username="' . $_POST["username"] . '";';
$tlf = str_replace("-", "", $_POST["telefono"]);
        $total = mysql_num_rows(mysql_query($sql));
        if ($total == 0) {
           /* var_dump("INSERT INTO tbl_usuario(cedual,nombres, telefono,id_rol,id_eje,username,password,clvadministrador) VALUES('" . $_POST["cedula"] . "','" . $_POST["nombres"] . "','" . $tlf . "','" . $_POST["id_rol"] . "','" . $_POST["id_eje"] . "','" . $_POST["username"] . "','" . md5($_POST["password"]) . "','" . $_SESSION['clvusuario'] . "')");
            die();
            exit();*/
            $result = mysql_query("INSERT INTO tbl_usuario(cedula,nombres, telefono,id_rol,id_eje,username,password,clvadministrador) VALUES('" . $_POST["cedula"] . "','" . $_POST["nombres"] . "','" . $tlf . "','" . $_POST["id_rol"] . "','" . $_POST["id_eje"] . "','" . $_POST["username"] . "','" . $_POST["password"] . "','" . $_SESSION['clvusuario'] . "')");

//        var_dump($result);
//        die();
//        exit();
            if (!$result) {
                $message = "Error Por Favor Comunicate con el Administrador";
            } else {
                header("Location:index.php");
            }
        } else {
            header("Location:exist_usario.php");
        }
    }
} else {
    header("Location:errores/permisologia.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Nuevos Usuarios</title>
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Area de Registro de Nuevos Usuarios</h3>
                </div>
                <div class="panel-body">
                    <form name="usuarios" method="post" action="" id="usuarios" >
                        <div class="row">  
                            <div class="form-group">
                                <!--Campo Nomres Usuario-->
                                <div class="col-md-4">
                                    <label style="padding-top:20px;">Cedula</label>
                                    <span id="cedula-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="cedula" name="cedula" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label style="padding-top:20px;">Nombres/Apellidos Usuario</label>
                                    <span id="nombres-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="nombres" name="nombres" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" class="form-control">
                                    </div>
                                </div>
                                <!--Apellidos Usuario-->
                                <div class="col-md-4">
                                    <label style="padding-top:20px;">Tel&eacute;fono</label>
                                    <span id="telefono-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="text" id="telefono" name="telefono" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" class="form-control" onkeydown="return enteros(this, event)">
                                    </div>
                                </div>     
                            </div>
                        </div>
                        <div class="row">  
                            <!--Campo Rol Usuario-->
                            <div class="form-group">
                                <div class="col-md-6">                                    
                                    <label style="padding-top:20px;">Rol Usuario</label>
                                    <span id="id_rol-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>

                                        <select  name="id_rol" id="id_rol" class="form-control" >
                                            <option value="0">Seleccione una Opci&oacute;n...</option>
                                            <?php
                                            rol();
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <!--Campo Eje Usuario-->
                                <div class="col-md-6">                                    
                                    <label style="padding-top:20px;">Eje</label>
                                    <span id="id_eje-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <select  name="id_eje" id="id_eje" class="form-control" >
                                            <option value="0">Seleccione una Opci&oacute;n...</option>
                                            <?php
                                            eje();
                                            ?>
                                        </select>

                                    </div>
                                </div>     
                            </div>
                        </div>
                        <div class="row">  
                            <div class="form-group">
                                <!--Campo Usuario-->
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Usuario</label>
                                    <span id="username-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class=" glyphicon glyphicon-sort-by-order"></i>
                                        </span>
                                        <input type="text" id="username" name="username" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" class="form-control">
                                    </div>
                                </div>
                                <!--Campo Contraseña-->
                                <div class="col-md-6">
                                    <label style="padding-top:20px;">Contrase&ntilde;a</label>
                                    <span id="password-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-sort-by-alphabet"></i>
                                        </span>
                                        <input type="password" id="password" name="password" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" class="form-control">
                                    </div>
                                </div>     
                            </div>
                        </div>
                        <div class="row">  
                            <!--Boton guardar-->
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: right; margin-top: 10px; ">
                                    <a href="index.php" class="btn btn-info" id="btnAddAction"><span aria-hidden="true" class="glyphicon glyphicon-home"></span> Regresar</a>
                                    <input type="submit" name="submit" id="btnAddAction" value="Guargar" class="btn btn-success" onClick="return validateNewUsuario();" />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>