<?php 
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;



    // echo "<script>alert('Button working')</script>";
session_start();

$eve_date = $_POST["eve_date"];
$person_count = $_POST["person_count"];
$create_datetime = date("Y-m-d H:i:s");
$eve_time = $_POST["eve_time"];

// for guest house courtesy orders
if($_SESSION['order_type']=='guest_house'){
    $o_pack = $_POST["package"];


$eve_type = $_POST["eve_type"];
$eve_time = $_POST["eve_time"];



// to fetch the price of the package 
$sql = "select p_cost from packages where p_name='".$o_pack."';";
$result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_array($result)){
        $pack_cost = $row[0];
    }

$o_total = $pack_cost*$person_count;


// inserting the data into the table

$sql = "INSERT INTO orders (uid, u_name, o_date, eve_date, eve_type, person_count, eve_time, o_pack, o_total, o_type) values('".$_SESSION['pb_no']."','".$_SESSION['emp_name']."', '".$create_datetime."', '".$eve_date."','".$eve_type."','".$person_count."','".$eve_time."','".$o_pack."','".$o_total."','".$_SESSION['order_type']."');";


if(mysqli_query($conn, $sql)){
    echo '<script>alert("Order Place Successully!")</script>';
    header("Location:http://localhost/canteen/pages/guest_house/viewOrder.php");
}
else{
    die("Error".mysqli_query_error());
}
}

// for canteen courtesy orders
elseif($_SESSION['order_type']=='canteen'){
    $itemlist  = array($_POST['snacks1'],$_POST['snacks2'],$_POST['snacks3'],$_POST['juices'], $_POST['sweets'], $_POST['water']);

    $itemlist = implode(',', $itemlist); // comma seperate item_id of all the optionally selected food_items
    // echo $itemlist;

    $sql = "INSERT INTO orders (uid, u_name, o_date, eve_date, person_count, eve_time, o_type, item_list) values('".$_SESSION['pb_no']."','".$_SESSION['emp_name']."', '".$create_datetime."', '".$eve_date."','".$person_count."','".$eve_time."','".$_SESSION['order_type']."','".$itemlist."');";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Order Place Successully!")</script>';
        header("Location:http://localhost/canteen/pages/canteen_courtesy/viewOrder.php");
    }
    else{
        die("Error".mysqli_query_error());
    }

}


    ?>