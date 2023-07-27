<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="../../pages/css/vieworder.css">
    <link rel="stylesheet" href="../css/approveOrders.css">
    <link rel="stylesheet" href="../../components/css/canteenOperatorNavbar.css">
</head>
<body>
    <?php 
    
    require_once('../../db.php');
    require_once('../../login/approverSession.php');
    $db = new DBConnection;
    $conn = $db->conn;
    ?>
    <div class="main">
    <?php 
    include ('../../components/canteenOperatorNavbar.php');
    ?>
    <div class="container">
        <h2>Your Canteen Event Orders</h2>

        <table class="orders">
        <tr class="table-heading">
                <th>Order Id</th>
                <th>Order Type</th>
                <th>User Id</th>
                <th>Client Name</th>
                <th>Package</th>
                <th>Event Date</th>
                <th>Event Type</th>
                <th>Person Count</th>
                <th>Order Total</th>
                <th>Event Time</th>
                <th>Status</th>
                <th>Remark</th>

            </tr>
            
            <?php
            $sql = "select * from orders ORDER BY eve_date DESC;";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['o_id']."</td>
                    <td class='table-data'>".$row['o_type']."</td>
                    <td class='table-data'>".$row['uid']."</td>
                    <td class='table-data'>".$row['u_name']."</td>
                    <td class='table-data'>".$row['o_pack']."</td>
                    <td class='table-data'>".$row['eve_date']."</td>
                    <td class='table-data'>".$row['eve_type']."</td>
                    <td class='table-data'>".$row['person_count']."</td>
                    <td class='table-data'>".$row['o_total']."</td>
                    <td class='table-data'>".$row['eve_time']."</td>
                    <td class='table-data'>".$row['o_status']."</td>
                    <td class='table-data'>".$row['o_remark']."</td>
                    </tr>";
                }
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>