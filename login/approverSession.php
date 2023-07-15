<?php
    session_start();
    if(!isset($_SESSION["role"])) {
        header("Location: http://localhost/canteen/login/superadmin.php");
        exit();
    }
?> 