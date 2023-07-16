<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="../../pages/css/vieworder.css">
    <link rel="stylesheet" href="../css/approveOrders.css">
    <link rel="stylesheet" href="../../components/css/approverNavbar.css">
</head>
<body>
    <?php 
    require_once('../../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    ?>
    <div class="main">
    <?php 
    include ('../../components/canteenOperatorNavbar.php');
    ?>
    <div class="container">
        
        <?php 
        $sql = "select item_list from orders where o_id ='".$_GET['id']."'; ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $items = $row[0];
        }
        // $items = explode(',', $items); // extracting single single values from the joint comma seperated value

        ?>


        <table class="orders">
        <tr class="table-heading">
                <th>Item Id</th>
                <th>Item Name</th>
                <th>Item Category</th>
            </tr>
            
            <?php
            $sql = "select * from annexure_1 where item_id in (".$items.");";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['item_id']."</td>
                    <td class='table-data'>".$row['item_name']."</td>
                    <td class='table-data'>".$row['item_category']."</td>
                    
                    </tr>";
                }
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>