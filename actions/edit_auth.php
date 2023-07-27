<html>
    <body>
    <?php 
require_once('../db.php');
$db = new DBConnection;
$conn = $db->conn;

// extraction
$updated_auth_pb_no = $_POST['new_auth_pb_no'];


$sql = "update food_items set it_name = '".$updated_item."' where it_id = '".$item_id."';";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Item Edited successfully')</script>";
    header('Location:http://localhost/canteen/approvers/Canteen_Operator/editPackage/packageInfo.php');
}
else{
    echo "<script>alert('Error: Cannot update item')</script>";
}

?>
    </body>
</html>