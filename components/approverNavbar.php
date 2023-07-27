<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="./css/approverNavbar.css">
</head>
<body>
    <?php
    require_once('../login/approverSession.php'); 
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     }
    $smallcase = strtolower($_SESSION['role']);
    ?>
    <div class="navbar" >
        <?php
        echo "<h2>Approving Officer- ".$_SESSION['role']." </h2>";
        ?>
        <ul class="menu">
            <?php 
            if($_SESSION['role']=="CoM" ){
                ?>
                <li class="menu-items"><a href="http://localhost/canteen/approvers/<?php echo($smallcase)?>.php?id=<?php echo($_SESSION['role'])?>">Approve Guest House Orders</a></li>
                <li class="menu-items"><a href="http://localhost/canteen/approvers/com_cant_court.php?id=<?php echo($_SESSION['role'])?>">Approve Canteen Courtesy Orders</a></li>
            <?php
            }
            else {
            ?>
            <li class="menu-items"><a href="http://localhost/canteen/approvers/<?php echo($smallcase)?>.php?id=<?php echo($_SESSION['role'])?>">Approve Orders</a></li>
            <?php } ?>
            <li class="menu-items"><a href="http://localhost/canteen/approvers/viewAllOrders.php">View All Orders</a></li>
            <li class="menu-items"><a href="http://localhost/canteen/login/logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>