<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Roles</title>
</head>
<link rel="stylesheet" href="../components/css/approverNavbar.css">
<link rel="stylesheet" href="../pages/css/vieworder.css">
    <link rel="stylesheet" href="../approvers/css/approveOrders.css">
    <link rel="stylesheet" href="../approvers/css/editItems.css">
<body>
    <?php 
    require_once('../login/adminSession.php');
    require_once('../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    ?>
    <div class="main">
    <?php
    include("../components/super_admin_navbar.php")
    ?>
    <div class="container">
        <h1><?php echo $_POST['division']?></h1>

        <table class="orders">
            <tr class="table-heading">
                <th>Designation</th>
                <th>Name</th>
                <th>PB No</th>
                <th>Action</th>

            </tr>
            
            <?php
            $sql = "select * from users where division = '".$_POST['division']."' and role!='user';";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['role']."</td>
                    <td class='table-data'>".$row['emp_name']."</td>
                    <td class='table-data'>".$row['pb_no']."</td>
                    
                    <td class='table-data'><a class='edit-btn' onClick=\"document.getElementById('id06').style.display='block'; document.getElementById('it_id').value=".$row['pb_no']."; \" >Change</a></td>
                    
                    </tr>";
                }
            }
          
            ?>
        </table>

        <!-- edit item modal -->

	<div id="id06" class="modal">
		<span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content animate" method="post" action="../actions/edit_auth.php">
			<div class="container">
                <h4>Edit Roles</h4>
                <label><b>Old Authourity PB no</b></label>
                <input type="text" name="old_auth_pb_no" id="old_auth_pb_no">
                <br>
				<label><b>Enter PB no of new Authourity</b></label>
				<input type="text" name="new_auth_pb_no" required>
                

				<div class="clearfix">
                    <button type="submit" class="edit-btn">Update</button>
					<button type="button" onclick="document.getElementById('id06').style.display='none'" class="cancel-btn">Cancel</button>
				</div>
			</div>
		</form>
	</div>

    <script>
		var modal3 = document.getElementById('id06');
		

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
