<?php 
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    if(isset($_GET['id'])){
        $sql = "update orders set o_status ='Confirmed' where o_id='".$_GET['id']."';";
        if(mysqli_query($conn , $sql)){
            echo "<script>alert('Order Approved Successfully')</script>";
            header("Location:http://localhost/canteen/admin/approveOrders.php");
            die();
        }
        else{
            echo "<script>alert('Failed to Approve order')</script>";
            die();
        }


    }

?>