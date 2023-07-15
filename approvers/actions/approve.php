<html><body>
    <?php 
    session_start();
    require_once('../../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    $filepath = strtolower($_SESSION['role']);
    echo $filepath;

    if(isset($_SESSION['role'])){
        $sql = "update orders set o_status ='Approved by ".$_SESSION['role']."' where o_id='".$_GET['id']."';";
        if(mysqli_query($conn , $sql)){
            echo "<script>alert('Order Approved Successfully');</script>";
            header("Location:http://localhost/canteen/approvers/".$filepath.".php?id=".$_SESSION['role']."");
            
        }
        else{
            echo "<script>alert('Failed to Approve order')</script>";
            die();
        }


    }

?>
</body></html>