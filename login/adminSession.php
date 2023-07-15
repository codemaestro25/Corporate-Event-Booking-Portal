<?php
    session_start();
    if(!isset($_SESSION["superadmin"])) {
        header("Location: http://localhost/canteen/login/superadmin.php");
        exit();
    }
?> 