<?php
session_start();
include('database.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("head.php"); ?>
        <title>Inicio de sesión</title>
    </head>
    <body>
        <?php
        if (empty($_SESSION['username'])) {
            ?>
            <div id="login" class="contenedor-interno-login">
                <div class="logo">                    
                    <img class="img-responsive" src="img/logo/logoiniciosesion.png" style="width: 100%; height: 300px; border-radius: 0.5em 0.5em 0.5em 0.5em" >
                </div>
                <div id="login" class="container-fluid">
                    <div class="panel-body">
                        <form action="validate.php" class="form-signin" role="form" method="post">
                            <div class="row">  
                                <!--Campo Usuario-->
                                <div class="form-group">
                                    <label style="padding-top:20px;">Usuario</label>
                                    <span id="int-ci-patrullero-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" id="user" name="user" class="form-control" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" required autofocus>
                                    </div>
                                </div>
                                <!--Campo Password-->
                                <div class="form-group">
                                    <label style="padding-top:20px;">Cotraseña</label>
                                    <span id="int-ci-patrullero-info" class="info"></span><br/>  
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-wrench"></i>
                                        </span>
                                        <input type="password" id="user" name="pass" class="form-control" placeholder="Ingrese Corectamente la Informaci&oacute;n Solicitada" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">  
                                <!--Boton guardar-->
                                <div class="form-group">
                                    <div class="col-md-12" style="text-align: center; ">
                                        <button class="btn btn-info btn-block" type="submit">Acceder</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        } else {
            header("Location: index.php");
        }
        ?>  
    </body>
</html>
