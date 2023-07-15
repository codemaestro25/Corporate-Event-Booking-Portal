<?php 
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    if(isset($_GET['id'])){
        $sql = "delete from orders where o_id='".$_GET['id']."';";
        if(mysqli_query($conn , $sql)){
            echo "<script>alert('Order Deleted Successfully')</script>";
            header("Location:http://localhost/canteen/pages/cancelOrder.php");
            die();
        }
        else{
            echo "<script>alert('Failed to Delete order')</script>";
            die();
        }


    }

?>