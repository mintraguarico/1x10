<?php

if (($_SESSION['id_rol']) == 15) {

    echo'<nav class="navbar navbar-default">
  <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>          
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<!--Menu usuario-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add_usuarios.php">Nuevos Usuarios Usuarios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="listarUsuarios.php">Listar Usuarios</a></li>
          </ul>
        <li>        
<!--Menu Maestro de Sistema-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Maestros de Sistema <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add_usuarios.php">Nuevo Maestro</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar Maestros</a></li>
          </ul>          
        <li>
<!--Menu Patrullero-->
        <li>
         <a id="" class="evento" href="add_patrullero.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Patrullero</a>
        </li>
<!--Menu Patrullado-->
        <li>
         <a id="" class="evento" href="add_patrullado.php"><span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span> Patrullado</a>
        </li>
    </ul>
      
      <ul class="nav navbar-nav navbar-right">
           <li>
         <a id="btnCerraraSesion" class="evento" href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrara Sesion</a>
         </li> 
 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
} elseif (($_SESSION['id_rol']) == 16)  {
    echo'<nav class="navbar navbar-default">
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
         <a id="btnAddAction" class="evento" data-toggle="modal" data-target=".modal-new"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Nuevos Registros</a>
         </li>   
        <li>
        <a id="btnAddAction" class="evento" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Generar PDF</a>
         </li>   
		
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
           <li>
         <a id="btnCerraraSesion" class="evento" href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrara Sesion</a>
         </li> 
 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
}?>