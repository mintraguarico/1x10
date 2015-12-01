<?php
    session_start();
    include('database.php');
    if(isset($_SESSION['username'])) {
        session_destroy();
        header("Location: login.php");
    }else{
        echo "Error desconocido";
    }
?> 