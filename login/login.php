<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['pb_no'])) {
        $pb_no = stripslashes($_REQUEST['pb_no']);    
        $pb_no = mysqli_real_escape_string($conn, $pb_no);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE pb_no='$pb_no'
                    AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['pb_no'] = $pb_no;
            while($data = mysqli_fetch_array($result)){
                $emp_name = $data['emp_name'];
                $division = $data['division'];
            }
            $_SESSION['emp_name'] = $emp_name;
            $_SESSION['division'] = $division;
            $_SESSION['order_type'] = $_REQUEST['order_type'];

            if ($_REQUEST['order_type']=="canteen") {
                // Redirect to guesthouse order dashboard page
                header("Location: ../pages/canteen_courtesy/book.php");
            }
            elseif($_REQUEST['order_type']=="guest_house"){
                // Redirect to guesthouse order dashboard page
                header("Location: ../pages/guest_house/book.php");
            }
            
        } else {
            echo "<div class='form'>
                <h3>Incorrect pb_no/password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">User Login</h1>
        <input type="text" class="login-input" name="pb_no" placeholder="pb_no" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button" required/>
       
        <input type="radio" name="order_type" id="" value="canteen" required>Canteen Courtesy
        <input type="radio" name="order_type" id="" value="guest_house">Guest House Courtesy

        <p class="link"><a href="registration.php">New Registration</a></p>
        <p class="link"><a href="approverLogin.php">Approver Login</a></p>
        <p class="link"><a href="superadmin.php">SuperAdmin Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>