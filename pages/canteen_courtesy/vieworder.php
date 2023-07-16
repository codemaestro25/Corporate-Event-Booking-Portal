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
                <th>Order Date</th>
                <th>Delivery Date</th>
                
                <th>Person Count</th>
                
                <th>Delivery Time</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>
            
            <?php
            $sql = "select o_id, o_type, o_date, eve_date, person_count, eve_time,o_status, o_remark from orders where uid='".$_SESSION['pb_no']."' and o_type = 'canteen';";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['o_id']."</td>
                    <td class='table-data'>".$row['o_type']."</td>
                    <td class='table-data'>".$row['o_date']."</td>
                    <td class='table-data'>".$row['eve_date']."</td>
                    
                    <td class='table-data'>".$row['person_count']."</td>
                    
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