<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="../../pages/css/vieworder.css">
    <link rel="stylesheet" href="../css/approveOrders.css">
    <link rel="stylesheet" href="../css/editItems.css">
    <link rel="stylesheet" href="../../components/css/approverNavbar.css">
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
        
        <?php 
        $sql = "select item_list from orders where o_id ='".$_GET['id']."'; ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $items = $row[0];
        }
        // $items = explode(',', $items); // extracting single single values from the joint comma seperated value

        ?>

        <h3>Selected Optional Items</h3>
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
        <div class="buttons">
        <a class='approve-btn' onClick="javascript:return confirm('Approve the order?');" href='../../actions/approve.php?id=<?php echo $_GET['id']; ?>'>Approve</a>
        <a class='cancel-btn' onclick="
                    document.getElementById('id03').style.display='block';document.getElementById('o_id').value=<?php echo $_GET['id']; ?>" >Reject</a>
        </div>
        <div id="id03" class="modal">
		<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content animate" method="post" action="../../actions/reject.php">
			<div class="container">

				<label><b>Reason for rejection</b></label>
				<input type="text" name="reject_reason" required>
                <input type="text" name="o_id" id="o_id">

				<div class="clearfix">
                    <button type="submit" class="edit-btn">Reject</button>
					<button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancel-btn">Cancel</button>
				</div>
			</div>
		</form>
	</div>
    </div>
    </div>
</body>
</html>