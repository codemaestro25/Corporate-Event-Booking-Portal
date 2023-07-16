<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
    <link rel="stylesheet" href="../../../components/css/canteenOperatorNavbar.css">
    <link rel="stylesheet" href="../../css/editItems.css">
    <link rel="stylesheet" href="../../../pages/css/vieworder.css">
</head>

<body>
    <?php 
    
    require_once('../../../db.php');
    $db = new DBConnection;
    $conn = $db->conn;
    ?>
    <div class="main">
    <?php 
    include('../../../components/canteenOperatorNavbar.php');
    ?>
        <div class="container">
            <h1>Edit Package Items</h1>

           
           
           <button class='add-btn' onclick="document.getElementById('id02').style.display='block'; document.getElementById('item_pack').value="<?php echo $_GET['id']; ?>"" >Add Item</button>
           

            <table class="package-table">
                <tr class="table-heading">
                    <th>Item Id</th>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th colspan="2">Action</th>


                </tr>

            <?php
            $sql = "select * from food_items where ".$_GET['id']." = 'y';";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr class='table-data-group'>
                    <td class='table-data'>".$row['it_id']."</td>
                    <td class='table-data'>".$row['it_name']."</td>
                    <td class='table-data'>".$row['it_category']."</td>
                    <td class='table-data'><a class='edit-btn' onclick=\"
                    document.getElementById('id01').style.display='block';document.getElementById('it_id').value=".$row['it_id'].";\"style=\"width:auto;\">Edit</a></td>
                    <td class='table-data'><a class='cancel-btn' onClick=\"javascript:return confirm('Do you really want to delete this item?');\" href=\"../../../actions/delete_item.php\">Delete</a></td>
                    </tr>";
                }
            }
            ?>

            </table>
    
    <!-- edit item modal -->

	<div id="id01" class="modal">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content animate" method="post" action="../../../actions/edit_item.php">
			<div class="container">

				<label><b>Update Item</b></label>
				<input type="text" placeholder="New Item" name="updated_item" required>
                
                <input type="text" name="it_id" id="it_id">

				<div class="clearfix">
                    <button type="submit" class="edit-btn">Update</button>
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancel-btn">Cancel</button>
				</div>
			</div>
		</form>
	</div>

    <!-- add button modal -->

    <div id="id02" class="modal">
		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content animate" method="post" action="../../../actions/add_item.php">
			<div class="container">

                <h4>Add New Item</h4>

				<label style="margin-top:15px;"> New Item Name</label>
				<input type="text" placeholder="New Item" name="new_item" required>
                
                <select name="new_item_cat" id="" required>
                    <option value="S">Starter</option>
                    <option value="M">Main Course</option>
                    <option value="D">Desert</option>
                </select>

                <label style="margin-top:15px;"> Package</label>
				<input type="text" placeholder="New Item" name="item_pack" id="item_pack" required>

				<div class="clearfix">
                    <button type="submit" class="edit-btn">Add</button>
					<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancel-btn">Cancel</button>
				</div>
			</div>
		</form>
	</div>

	<!--close the modal by just clicking outside of the modal-->
	<script>
		var modal1 = document.getElementById('id01');
		var modal2 = document.getElementById('id02');

		window.onclick = function(event) {
			if (event.target == modal1) {
				modal1.style.display = "none";
			}
		}
		window.onclick = function(event) {
			if (event.target == modal2) {
				modal2.style.display = "none";
			}
		}
	</script>

        </div>
    </div>
</body>

</html>