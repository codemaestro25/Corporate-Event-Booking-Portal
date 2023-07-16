<?php 
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    $o_id = $_POST['o_id'];
    $o_remark = $_POST['reject_reason'];
        $sql = "update orders set o_status ='Rejected by Canteen Operator' , o_remark = '".$o_remark."' where o_id='".$o_id."';";
        if(mysqli_query($conn , $sql)){
            echo "<script>alert('Order Rejected Successfully')</script>";
            header("Location:http://localhost/canteen/approvers/Canteen_Operator/approveOrders.php");
            die();
        }
        else{
            echo "<script>alert('Failed to Reject order')</script>";
            die();
        }


    

?>