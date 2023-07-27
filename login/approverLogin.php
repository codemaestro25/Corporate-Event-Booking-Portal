<!DOCTYPE html>
<!-- this approver / role login -->
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    session_start();
    require('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    // When form submitted, check and create user session.
    if (isset($_POST['pb_no'])) {
        $pb_no = stripslashes($_REQUEST['pb_no']);    
        $pb_no = mysqli_real_escape_string($conn, $pb_no);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // $role = stripslashes($_REQUEST['role']);
        // $role = mysqli_real_escape_string($conn, $role);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE pb_no='$pb_no'
                    AND password='" . md5($password)."';";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            while($data = mysqli_fetch_array($result)){
                $emp_name = $data['emp_name'];
                $_SESSION['division'] = $data['division'];
                $role = $data['role'];
            }
            $_SESSION['pb_no'] = $pb_no;
            $_SESSION['role'] = $role;
            $_SESSION['emp_name'] = $emp_name;
            

            // Redirect to user dashboard page
            switch ($role) {
                case 'CoM':
                    header("Location: ../approvers/com.php?id=".$role."");
                    break;
                case 'HR':
                    header("Location: ../approvers/hr.php?id=".$role."");
                    break;
                case 'GM':
                    header("Location: ../approvers/gm.php?id=".$role."");
                    break;
                case 'Canteen_Operator':
                    header("Location: ../approvers/Canteen_Operator/approveOrders.php");
                    break;
            }
            
        } 
        else {
            echo "<div class='form'>
                <h3>Incorrect pb_no/password.</h3><br/>
                <p class='link'>Click here to <a href='approverLogin.php'>Login</a> again.</p>
                </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Approver Login</h1>
        <input type="text" class="login-input" name="pb_no" placeholder="pb_no" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <!-- <select name="role" class="role" id="role">
            <option value="Canteen_Operator">Canteen Operator</option>
            <option value="CoM">CoM</option>
            <option value="HR">HR Head</option>
            <option value="GM">GM</option>
        </select> -->
        <p class="link"><a href="login.php">User Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>