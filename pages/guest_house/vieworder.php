<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="../css/vieworder.css">
    <link rel="stylesheet" href="../../components/css/navbar.css">
</head>
<body>
    <?php 
    require_once('../../login/session.php');
    require_once('../../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    ?>
    <div class="main">
    <?php 
    include ('../../components/navbar.php');
    ?>
    <div class="container">
        <h2>Your Canteen Event Orders</h2>

        <table class="orders">
            <tr class="table-heading">
                <th>Order Id</th>
                <th>Order Type</th>
                <th>Package</th>
                <th>Order Date</th>
                <th>Event Date</th>
                <th>Event Type</th>
                <th>Person Count</th>
                <th>Order Total</th>
                <th>Event Time</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>
            
            <?php
            $sql = "select o_id, o_pack, o_date, eve_date, eve_type, person_count, o_total, eve_time,o_status, o_remark, o_type from orders where uid='".$_SESSION['pb_no']."' and o_type = 'guest_house';";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['o_id']."</td>
                    <td class='table-data'>".$row['o_type']."</td>
                    <td class='table-data'>".$row['o_pack']."</td>
                    <td class='table-data'>".$row['o_date']."</td>
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