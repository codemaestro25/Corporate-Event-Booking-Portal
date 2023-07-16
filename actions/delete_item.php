<?php 
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    if(isset($_GET['id'])){
        $sql = "delete from food_items where it_id='".$_GET['id']."';";
        if(mysqli_query($conn , $sql)){
            echo "<script>alert('Food Item Deleted Successfully')</script>";
            header('Location:http://localhost/canteen/approvers/Canteen_Operator/editPackage/packageInfo.php');
            die();
        }
        else{
            echo "<script>alert('Failed to Delete Food Item')</script>";
            die();
        }


    }

?>