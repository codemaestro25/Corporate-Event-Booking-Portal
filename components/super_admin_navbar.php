<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="./css/adminNavbar.css">
    <link rel="stylesheet" href="../approvers/css/editItems.css">
    <link rel="stylesheet" href="../approvers/css/approver.css">
</head>
<body>
<?php 
    require_once('../login/adminSession.php'); 
    ?>
    <div class="navbar" >
        <h2>Booking Admin</h2>
        <ul class="menu">
            <li class="menu-items"><a href="http://localhost/canteen/superadmin/home.php">Home</a></li>
            <li class="menu-items"><a onclick="
                    document.getElementById('id05').style.display='block';">Edit Roles</a></li>
            <li class="menu-items"><a href="http://localhost/canteen/login/logout.php">Logout</a></li>
        </ul>
    </div>
    <div id="id05" class="modal">
		<span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content animate" method="post" action="http://localhost/canteen/superadmin/edit_roles.php">
			<div class="container">

                <h4>Select Division</h4>

				
                <select name="division" class="division-modal" id="" required>
                    <option value="AOD">AOD</option>
                    <option value="AMD">AMD</option>
                    <option value="AURDC">AURDC</option>
                </select>

                

				<div class="clearfix">
                    <button type="submit" class="edit-btn">Submit</button>
					<button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancel-btn">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>