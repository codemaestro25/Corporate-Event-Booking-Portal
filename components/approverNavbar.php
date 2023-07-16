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
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     }
    $smallcase = strtolower($_SESSION['role']);
    ?>
    <div class="navbar" >
        <h2>Approving Officer</h2>
        <ul class="menu">
            <li class="menu-items"><a href="http://localhost/canteen/approvers/<?php echo($smallcase)?>.php?id=<?php echo($_SESSION['role'])?>">Approve Orders</a></li>
            <li class="menu-items"><a href="http://localhost/canteen/approvers/viewAllOrders.php">View All Orders</a></li>
            <li class="menu-items"><a href="http://localhost/canteen/login/logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>