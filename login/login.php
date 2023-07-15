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
            }
            $_SESSION['emp_name'] = $emp_name;

            // Redirect to user dashboard page
            header("Location: ../pages/book.php");
            
        } else {
            echo "<div class='form'>
                <h3>Incorrect pb_no/password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="pb_no" placeholder="pb_no" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button" required/>
        <p class="link"><a href="registration.php">New Registration</a></p>
        <p class="link"><a href="approverLogin.php">Approver Login</a></p>
        <p class="link"><a href="superadmin.php">SuperAdmin Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>