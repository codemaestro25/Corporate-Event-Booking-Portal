<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Info</title>
    <link rel="stylesheet" href="../../components/css/adminNavbar.css">
    <link rel="stylesheet" href="../../pages/css/vieworder.css">
</head>
<body>
    <?php 
    require_once('../../login/adminSession.php');
    require_once('../../db.php');
    $db = new DBConnection;
    $conn = $db->conn;

    ?>
    <div class="main">
    <?php 
    include('../../components/adminNavbar.php');
    ?>
    <div class="container">
        <h2>Your Canteen Event Orders</h2>

        <table class="orders">
            <tr class="table-heading">
                <th>Package Id</th>
                <th>Package Name</th>
                <th>Operation</th>
                
                
            </tr>
            
            <?php
            $sql = "select p_id, p_name from packages;";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['p_id']."</td>
                    <td class='table-data'>".$row['p_name']."</td>
                    <td class='table-data'><a class='edit-btn' href='./editItems.php?id=".$row['p_name']."'>Edit</a></td>
                    
                    </tr>";
                }
            }
            ?>
        </table>
    </div>
    
    </div>
</body>
</html>