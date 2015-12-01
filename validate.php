<?php
session_start();
include('database.php');
if (isset($_POST)) {
    /* las funciones test las usaremos para evitar inyección de sql en el formulario. */

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function test_input_pass($data) {
        //$data = md5($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = test_input($_POST['user']);
    $password = test_input_pass($_POST['pass']);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM tbl_usuario where username=? and password=?';
    $q = $pdo->prepare($sql);
    $q->bindParam(1, $usuario);
    $q->bindParam(2, $password);
    $q->execute();
    if ($q->rowCount() == 1) {
        while ($row = $q->fetch()) {
            $_SESSION['clvusuario'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['nombres'] = $row['nombres'];
           
            $_SESSION['id_rol'] = $row['id_rol'];
            $_SESSION['id_eje'] = $row['id_eje'];
            if ($_SESSION['id_rol'] == 17) {
              
            header("Location: operador/index.php");
            }
        }
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <!-- TODAS las líneas genéricas del head menos el título se cargan  desde el head.php -->
                <?php include("head.php"); ?>
                <title>Iniciar sesión</title>
            </head>
            <body>
                <div id="login" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="./img/logo/logoOriginal.png" class="center-block logo">
                            <br/>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <h2>Fallo de inicio de sesión</h2>
                            <a class="btn btn-warning btn-mrgn" href="index.php">Reintentar</a>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div> <!-- /container -->
            </body>
        </html>
        <?php
    }
} else {
  		   header("Location: operador/index.php");
}
?> 