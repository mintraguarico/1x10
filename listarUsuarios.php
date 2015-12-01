<?php
session_start();
include('database.php');
require_once("perpage.php");
require_once("dbcontroller.php");
$db_handle = new DBController();
$name = "";
$code = "";
$queryCondition = "";
if (!empty($_POST["search"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (!empty($v)) {
            $queryCases = array("Nombres_Usuario", "Usuario");
            if (in_array($k, $queryCases)) {
                if (!empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "Nombres_Usuario":
                    $name = $v;
                    $queryCondition .= "Nombres_Usuario LIKE '" . $v . "%'";
                    break;
                case "Usuario":
                    $code = $v;
                    $queryCondition .= "Usuario LIKE '" . $v . "%'";
                    break;
            }
        }
    }
}
$orderby = " ORDER BY Id_Usuario  ASC ";
$sql = "SELECT * FROM vsw_usuarios " . $queryCondition;

//exit();
$href = 'index.php';
$perPage = 10;
$page = 1;
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
$start = ($page - 1) * $perPage;
if ($start < 0)
    $start = 0;
$query = $sql . $orderby . " limit " . $start . "," . $perPage;
$result = $db_handle->runQuery($query);
if (!empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("head.php"); ?>
        <title>Inicio</title>
    </head>

    <body>
        <?php
        if (isset($_SESSION['username'])) {
            ?>
            <?php include("barner.php"); ?>
            <?php include("navi.php"); ?>
            <h2 style="text-align: center;">Listado De Usuarios Registrados</h2>
            <div class="container-fluid">  
                <div style="text-align:right;margin:20px 0px 10px;">
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                                    <h4 id="mySmallModalLabel" class="modal-title" style="text-align: left;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Area de Reportes</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row"  style="text-align: center;">
                                        <a id="btnAddAction" class="btn btn-info" href="pdf_votantes.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Generar Reporte De Votantes</a>
                                        <a id="btnAddAction" class="btn btn-info" href="pdf_patrulleros.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Generar Reporte de Jefes de Patrulla</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal de Registro-->
                    <div class="modal fade modal-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                                    <h4 id="mySmallModalLabel" class="modal-title" style="text-align: left;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Area de Registro</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="text-align: center;">
                                        <div class="col-sm-6">
                                            <a id="btnAddAction" class="btn btn-info" href="add_votante.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Nuevo Votante</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a id="btnAddAction" class="btn btn-info" href="add_jefe_patrulla.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nuevo Jefe Patrulla</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="toys-grid">      
                    <form name="frmSearch" method="post" action="listarUsuarios.php">
                        <div class="panel panel-info">
                            <div class="panel-heading"><div class="search-box">
                                    <p>
                                    <div class="form-group">
                                        <div class="col-md-4">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-text-height"></i>
                                                </span>
                                                <input type="text" name="search[Nombres_Usuario]" placeholder="Nombres/Apellidos" class="form-control" value="<?php echo $name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-sort-by-order"></i>
                                                </span>
                                                <input type="text" name="search[Usuario]" placeholder="Usuario" class="form-control" value="<?php echo $code; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="go" class="btn btn-primary" value="Buscar">  <input type="reset" class="btn btn-danger" value="Limpiar" onclick="window.location = 'listarUsuarios.php'"></p>
                                </div></div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id Usuario</th>
                                        <th>Nombres Usuario</th>
                                        <th>Tel&eacute;fono</th>
                                        <th>Usuario</th>
                                        <th>Contrase&ntilde;a</th>
                                        <th>Rol</th>
                                        <th>Eje</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result == 0) {
                                        ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong><span aria-hidden="true" class="glyphicon glyphicon-eye-close"></span> No Existe Data Asociada!</strong> 
                                    </div>
                                    <?php
                                    exit();
                                } else {
                                    foreach ($result as $k => $v) {
                                        if (is_numeric($k)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $result[$k]["Id_Usuario"]; ?></td>
                                                <td><?php echo $result[$k]["Nombres_Usuario"]; ?></td>
                                                <td><?php echo $result[$k]["Telefono"]; ?></td>                                                
                                                <td><?php echo $result[$k]["Usuario"]; ?></td> 
                                                <td><?php echo $result[$k]["Cotrasena"]; ?></td> 
                                                <td><?php echo $result[$k]["Rol"]; ?></td> 
                                                <td><?php echo $result[$k]["Eje"]; ?></td> 

                                               
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                if (isset($result["perpage"])) {
                                    ?>
                                    <tr>
                                        <td colspan="9" align=right> <?php echo $result["perpage"]; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        } else {
            header("Location: login.php");
        }
        ?>
    </body>
</html>