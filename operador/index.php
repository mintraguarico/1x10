<?php
session_start();
include('../database.php');
require_once("../perpage.php");
require_once("../dbcontroller.php");
$db_handle = new DBController();
$name = "";
$code = "";
$queryCondition = "";
if (!empty($_POST["search"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (!empty($v)) {
            $queryCases = array("Nombres_Apellidos_Jefe", "Cedula_Jefe");
            if (in_array($k, $queryCases)) {
                if (!empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "Nombres_Apellidos_Jefe":
                    $name = $v;
                    $queryCondition .= "Nombres_Apellidos_Jefe LIKE '" . $v . "%'";
                    break;
                case "Cedula_Jefe":
                    $code = $v;
                    $queryCondition .= "Cedula_Jefe LIKE '" . $v . "%'";
                    break;
            }
        }
    }
}
$orderby = " ORDER BY Id_Jefe_Patrulla ASC";
$sql = "SELECT * FROM vsw_jefe_votante " . $queryCondition;
//var_dump($sql);
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
        <meta charset="utf-8">
        <meta name="author" content="Fernando Pablo">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="#">

        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" type="text/css" rel="stylesheet" />
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/validaciones.js" type="text/javascript"></script>


        <script>
            $(document).ready(function () {
                $(function () {
                    $('[rel="popover"]').popover({
                        container: 'body',
                        html: true,
                        content: function () {
                            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
                            return clone;
                        }
                    }).click(function (e) {
                        e.preventDefault();
                    });
                });
            });
        </script>
        <title>Inicio</title>
    </head>

    <body>
        <?php
        if (isset($_SESSION['username'])) {
            ?>

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
                                <!--<a id="btnAddAction" class="evento" data-toggle="modal" data-target=".modal-new"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Nuevos Registros</a>-->
                                <a href="add_patrullado.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Nuevo Patrullado</a>
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
            <h2 style="text-align: center;">Listado De Votantes Asociados A los Jefes de Patrulla</h2>
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
                                            <a id="btnAddAction" class="btn btn-info" href="add_patrullado.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Nuevo Votante</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a id="btnAddAction" class="btn btn-info" href="add_patrullero.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nuevo Jefe Patrulla</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="toys-grid">      
                    <form name="frmSearch" method="post" action="index.php">
                        <div class="panel panel-info">
                            <div class="panel-heading"><div class="search-box">
                                    <p>
                                    <div class="form-group">
                                        <div class="col-md-4">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-text-height"></i>
                                                </span>
                                                <input type="text" name="search[Nombres_Apellidos_Jefe]" placeholder="Nombres/Apellidos del Patrullero" class="form-control" value="<?php echo $name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-sort-by-order"></i>
                                                </span>
                                                <input type="text" name="search[Cedula_Jefe]" placeholder="C&eacute;dula del Patrullero" class="form-control" value="<?php echo $code; ?>" onkeydown="return enteros(this, event)">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="go" class="btn btn-primary" value="Buscar">  <input type="reset" class="btn btn-danger" value="Limpiar" onclick="window.location = 'index.php'"></p>
                                </div></div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombres/Apellidos Votantes</th>
                                        <th>C&eacute;dula Votante</th>
                                        <th>Tlf Votante</th>
                                        <th>Nombre Jefe Patrulla</th>
                                        <th>Cedula Jefe</th>
                                        <th>Tlf Jefe Patrulla</th>
                                        <th>Centro Votaci&oacute;n</th>
                                        <th>Estatus</th>

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
                                                <td><?php echo $result[$k]["Nombres_Apellidos_Votante"]; ?></td>
                                                <td><?php echo $result[$k]["Cedula_Votante"]; ?></td>
                                                <td><?php echo $result[$k]["Telefono_Votante"]; ?></td>
                                                <td><?php echo $result[$k]["Nombres_Apellidos_Jefe"]; ?></td>
                                                <td><?php echo $result[$k]["Cedula_Jefe"]; ?></td> 
                                                <td><?php echo $result[$k]["Telefono_Jefe"]; ?></td> 
                                                <td><?php echo $result[$k]["Centro_Votacion_Jefe"]; ?></td> 
                                                <td><?php
                                                    if ($result[$k]["Estatus_Votante"] == 1) {
                                                        ?>
                                                        <span class="label label-success">Si</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="label label-danger">No</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td> 
                <!--                                                <td>
                                                    <a class="btn btn-info" href="#" rel="popover" data-placement="top" data-popover-content="#myPopover"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a>
                                                    <div id="myPopover" class="hide" style="text-align: center;" |>
                                                        <table >
                                                            <tr >
                                                                <td>
                                                                    <a href="edit_votante.php?id=<?php echo $result[$k]["Cedula_Votante"]; ?>" class="btn btn-warning popper"  data-toggle="popover" data-placement="top" ><span aria-hidden="true" class="glyphicon glyphicon-edit"></span> Votante</a>
                                                                </td>
                                                                <td>&nbsp;</td>
                                                                <td>
                                                                    <a href="edit_patrullero.php?id=<?php echo $result[$k]["Cedula_Jefe"]; ?>" class="btn btn-primary popper"  data-toggle="popover" data-placement="top" ><span aria-hidden="true" class="glyphicon glyphicon-edit"></span> Patrullero</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <a class="btn btn-danger"  href="delete.php?action=delete&id=<?php echo $result[$k]["Cedula_Votante"]; ?>"><span aria-hidden="true" class="glyphicon glyphicon-trash"></span></a>
                                                    <a class="btn btn-success" href="#" rel="popover" data-placement="top" data-popover-content="#blnVoto"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span></a>
                                                    <div id="blnVoto" class="hide" style="text-align: center;" |>
                                                        <table >
                                                            <tr >
                                                                <td>
                                                                    <a href="edit_votante.php?id=<?php echo $result[$k]["Cedula_Votante"]; ?>" class="btn btn-warning popper"  data-toggle="popover" data-placement="top" ><span aria-hidden="true" class="glyphicon glyphicon-edit"></span> Si</a>
                                                                </td>
                                                                <td>&nbsp;</td>
                                                                <td>
                                                                    <a href="edit_patrullero.php?id=<?php echo $result[$k]["Cedula_Jefe"]; ?>" class="btn btn-primary popper"  data-toggle="popover" data-placement="top" ><span aria-hidden="true" class="glyphicon glyphicon-edit"></span> No</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>-->
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
            header("Location: ../login.php");
        }
        ?>
    </body>
</html>