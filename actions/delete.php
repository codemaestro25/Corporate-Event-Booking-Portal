<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    if(isset($_GET['id'])){
        $sql = "delete from orders where o_id='".$_GET['id']."';";
        if(mysqli_query($conn , $sql)){

            echo "<script>alert('Order Deleted Successfully')</script>";
            if($_SESSION['order_type']=="guest_house"){
            header("Location:http://localhost/canteen/pages/guest_house/cancelOrder.php");
            }
            elseif($_SESSION['order_type']=="canteen"){
                header("Location:http://localhost/canteen/pages/canteen_courtesy/cancelOrder.php");
            }
            die();
        }
        else{
            echo "<script>alert('Failed to Delete order')</script>";
            die();
        }


    }

?>