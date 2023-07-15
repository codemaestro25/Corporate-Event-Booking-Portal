<?php 
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;



    // echo "<script>alert('Button working')</script>";
session_start();
$o_pack = $_POST["package"];

$eve_date = $_POST["eve_date"];
$eve_type = $_POST["eve_type"];
$eve_time = $_POST["eve_time"];
$person_count = $_POST["person_count"];
$create_datetime = date("Y-m-d H:i:s");


// to fetch the price of the package 
$sql = "select p_cost from packages where p_name='".$o_pack."';";
$result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_array($result)){
        $pack_cost = $row[0];
    }

$o_total = $pack_cost*$person_count;


// inserting the data into the table

$sql = "INSERT INTO orders (uid, u_name, o_date, eve_date, eve_type, person_count, eve_time, o_pack, o_total) values('".$_SESSION['pb_no']."','".$_SESSION['emp_name']."', '".$create_datetime."', '".$eve_date."','".$eve_type."','".$person_count."','".$eve_time."','".$o_pack."','".$o_total."');";


if(mysqli_query($conn, $sql)){
    echo '<script>alert("Order Place Successully!")</script>';
    header("Location:http://localhost/canteen/pages/viewOrder.php");
}
else{
    die("Error".mysqli_query_error());
}

    ?>