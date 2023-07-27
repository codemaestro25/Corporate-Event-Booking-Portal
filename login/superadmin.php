<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>SuperAdmin Login</title>
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
        // $query    = "SELECT * FROM `users` WHERE pb_no='$pb_no'
        //             AND password='" . md5($password)."'AND role = '".$role."';";
        $query    = "SELECT * FROM `users` WHERE pb_no='$pb_no'
                    AND password='" . md5($password)."';";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['pb_no'] = 1234;
            $_SESSION['superadmin'] = 'y';
            
            

            // Redirect to user dashboard page
            header("Location: ../superadmin/home.php");
            
        } 
        else {
            echo "<div class='form'>
                <h3>Incorrect pb_no/password.</h3><br/>
                <p class='link'>Click here to <a href='superadmin.php'>Login</a> again.</p>
                </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Super Admin Login</h1>
        <input type="text" class="login-input" name="pb_no" placeholder="pb_no" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="login.php">User Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>