<?php 
 session_start();
    require_once('../../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    $filepath = strtolower($_SESSION['role']);
    echo $filepath; //name of the authority like gm, hr, com in small letters for accessing the database

    $o_id = $_POST['o_id'];
    $o_remark = $_POST['reject_reason'];
        $sql = "update orders set o_status ='Rejected by ".$_SESSION['role']."',  o_remark = '".$o_remark."' where o_id='".$o_id."';";
        if(mysqli_query($conn , $sql)){
            echo "<script>alert('Order Rejected Successfully')</script>";
            header("Location:http://localhost/canteen/approvers/".$filepath.".php?id=".$_SESSION['role']."");
            die();
        }
        else{
            echo "<script>alert('Failed to Reject order')</script>";
            die();
        }


    

?>