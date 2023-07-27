<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION["role"])) {
        header("Location: http://localhost/canteen/login/approverLogin.php");
        exit();
    }
?> 