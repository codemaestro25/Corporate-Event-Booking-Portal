<?php
//include session.php file on all user panel pages
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Canteen Booking</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Welcome to Canteen Booking Website, <?php echo $_SESSION['emp_name']; ?>!</p>
        <p>Lets manifest a great event!!.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>