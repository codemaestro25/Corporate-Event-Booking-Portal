<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="../../pages/css/vieworder.css">
    <link rel="stylesheet" href="../css/approveOrders.css">
    <link rel="stylesheet" href="../css/editItems.css">
    <link rel="stylesheet" href="../../components/css/canteenOperatorNavbar.css">
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
        <h3>Canteen Operator)</h3>

        <table class="orders">
            <tr class="table-heading">
                <th>Order Id</th>
                <th>User Id</th>
                <th>Client Name</th>
                <th>Package</th>
                <th>Event Date</th>
                <th>Event Type</th>
                <th>Person Count</th>
                <th>Order Total</th>
                <th>Event Time</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Reject</th>

            </tr>
            
            <?php
            $sql = "select * from orders where gm = 'y';";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['o_id']."</td>
                    <td class='table-data'>".$row['uid']."</td>
                    <td class='table-data'>".$row['u_name']."</td>
                    <td class='table-data'>".$row['o_pack']."</td>
                    <td class='table-data'>".$row['eve_date']."</td>
                    <td class='table-data'>".$row['eve_type']."</td>
                    <td class='table-data'>".$row['person_count']."</td>
                    <td class='table-data'>".$row['o_total']."</td>
                    <td class='table-data'>".$row['eve_time']."</td>
                    <td class='table-data'>".$row['o_status']."</td>
                    <td class='table-data'><a class='approve-btn' onClick=\"javascript:return confirm('Approve the order?');\" href='../../actions/approve.php?id=".$row['o_id']."'>Approve</a></td>
                    <td class='table-data'><a class='cancel-btn' onclick=\"
                    document.getElementById('id03').style.display='block';document.getElementById('o_id').value=".$row['o_id'].";\" >Reject</a></td>
                    </tr>";
                }
            }
            // echo "<td><a href='delete.php?id=".$query2['id']."' onClick=\"javascript:return confirm('are you sure you want to delete this?');\">x</a></td><tr>";
            ?>
        </table>

        <!-- edit item modal -->

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

    <script>
		var modal3 = document.getElementById('id03');
		

		window.onclick = function(event) {
			if (event.target == modal3) {
				modal3.style.display = "none";
			}
		}
		}
	</script>
    </div>
    </div>
</body>
</html>