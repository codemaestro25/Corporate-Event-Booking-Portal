<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    if (isset($_REQUEST['pb_no'])) {
        // removes backslashes
        $pb_no = stripslashes($_REQUEST['pb_no']);
        //escapes special characters in a string
        $pb_no = mysqli_real_escape_string($conn, $pb_no);
        $contact_no    = stripslashes($_REQUEST['contact_no']);
        $contact_no    = mysqli_real_escape_string($conn, $contact_no);
        $emp_name    = stripslashes($_REQUEST['emp_name']);
        $emp_name    = mysqli_real_escape_string($conn, $emp_name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (pb_no, password, contact_no, emp_name, create_datetime)
                    VALUES ('$pb_no', '" . md5($password) . "', '$contact_no','$emp_name', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                <h3>You are registered successfully.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a></p>
                </div>";
        } else {
            echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="pb_no" placeholder="pb_no" required />
        <input type="text" class="login-input" name="emp_name" placeholder="Full Name" required>
        <input type="text" class="login-input" name="contact_no" placeholder="Contact Number" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>