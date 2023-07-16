<html>
    <body>
<?php 
require_once('../db.php');
$db = new DBConnection;
$conn = $db->conn;

// extraction
$new_item_name = $_POST['new_item'];
$new_item_cat = $_POST['new_item_cat'];
$new_item_pack = $_GET['id'];
<<<<<<< HEAD
echo $new_item_pack;
=======
>>>>>>> 5c791881d085894a34ebeda2da039c151f747517
// if($new_item_pack=="bronze"){
//     $sql = "insert into food_items (it_name, it_category, bronze , silver, gold) values('".$new_item_name."','".$new_item_cat."', 'y', 'n', 'n');";

// }



// if(mysqli_query($conn, $sql)){
//     echo "<script>alert('Item Edited successfully')</script>";
//     header('Location:http://localhost/canteen/admin/editPackage/packageInfo.php');
// }   
// else{
//     echo "<script>alert('Error: Cannot update item')</script>";
// }

?>
    </body>
</html>