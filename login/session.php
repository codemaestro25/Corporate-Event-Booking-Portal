<?php
    session_start();
    if(!isset($_SESSION["pb_no"])) {
        header("Location: http://localhost/canteen/login/login.php");
        exit();
    }
?> 