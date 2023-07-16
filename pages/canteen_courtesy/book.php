<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Order</title>
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="../../components/css/navbar.css">
</head>

<body>
    <div class="main">
        <?php 
        
        
        require_once('../../login/session.php');
            include('../../components/navbar.php');
            include('../../db.php');
            $db = new DBConnection;
            $conn = $db->conn;

            // fetching the packages
            $sql = "select p_cost from packages;";
            $result = mysqli_query($conn, $sql);
            $arr = array();
            $i = 0;
            while($row = mysqli_fetch_array($result)){
                $arr[$i] = $row[0];
                $i++;
            }
            
            
            

        ?>
        <div class="container">
            <h1 class"heading">Book New Canteen Courtesy Event</h1>
            <?php echo "<h4>Welcome ".$_SESSION['emp_name']."</h4>"?>
            <div class="form">
                <form action="../../actions/newOrder.php" method="post">
                    <div class="two-element">
                        <label for="eve_date">Delivery Date</label>
                        <input type="date" name="eve_date" id="" required>
                        <br>
                        <label for="eve_time">Delivery Time</label>
                        <input type="time" name="eve_time" id="" required>
                        <br>

                        <br>
                        <label for="person_count">Person Count</label>
                        <input name="person_count" id="person_count" type="text" onkeyup="calculateTotal(); " required>
                    </div>
                    <div class="package-section">
                        <p id="fphead">Food Packages</p>
                        <div class="packages">
                            <!-- selection options -->

                            <div class="pack_container" class='pack-radio'>

                                <label for="package" class="pack-head">Snacks </label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name, item_id, item_id from annexure_1 where item_category='snacks1'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo '<input type="radio" value="'.$row[1].'" name="snacks1" id="" required>'.$row[0].'<br>';
                                    }
                                ?>
                                </ul>

                                <h4>II</h4>
                                <ul class="starters">
                                <?php 
                                $sql = "select item_name, item_id from annexure_1 where item_category='snacks2'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo '<input type="radio" value="'.$row[1].'" name="snacks2" id="" required>'.$row[0].'<br>';
                                    }
                                ?>
                                </ul>

                                <h4>III</h4>
                                <ul class="starters">
                                <?php 
                                $sql = "select item_name, item_id from annexure_1 where item_category='snacks3'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo '<input type="radio" value="'.$row[1].'" name="snacks3" id="" required>'.$row[0].'<br>';
                                    }
                                ?>
                                </ul>


                            </div>
                            <div class="pack_container">
                                <label for="package" class="pack-head">Juices (200 ml) </label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name, item_id from annexure_1 where item_category='juices'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo '<input type="radio" value="'.$row[1].'" name="juices" id="" required>'.$row[0].'<br>';
                                    }
                                ?>
                                </ul>

                            </div>
                            <div class="pack_container">
                                <label for="package" class="pack-head">Sweets </label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name, item_id from annexure_1 where item_category='sweet'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo '<input type="radio" value="'.$row[1].'" name="sweets" id="" required>'.$row[0].'<br>';
                                    }
                                ?>
                                </ul>

                            </div>
                            <div class="pack_container">
                                <label for="package" class="pack-head">Water Bottle </label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name, item_id from annexure_1 where item_category='water'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo '<input type="radio" value="'.$row[1].'" value = "'.$row[1].'" name="water" id="" required>'.$row[0].'<br>';
                                    }
                                ?>
                                </ul>
                            </div>

                            <!-- non selection options -->
                            <div class="pack_container">
                                <label for="package" class="pack-head">Chocolates</label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name from annexure_1 where item_category='chocolate'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>
                                </ul>
                            </div>
                            <div class="pack_container">
                                <label for="package" class="pack-head">Dry Fruits</label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name from annexure_1 where item_category='dry_fruits'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>
                                </ul>
                            </div>
                            <div class="pack_container">
                                <label for="package" class="pack-head">Disposal</label>
                                <h4>I</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select item_name from annexure_1 where item_category='disposal'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>


                        <button type="submit" id="submit-btn">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function getHTTPObject() {
            if (window.ActiveXObject) {
                return new ActiveXObject('Microsoft.XMLHTTP');
            }
            else if (window.XMLHttpRequest) {
                return new XMLHttpRequest();
            }
            else {
                alert('nigh!');
                return null;
            }
        }

        function calculateTotal() {
            httpObject = getHTTPObject();
            if (httpObject != null) {
                httpObject.open("GET", "countTotal.php", true);
                httpObject.send(null);
                httpObject.onreadystatechange = setOutput;
            }
        }

        function setOutput() {
            if (httpObject.readyState == 4) {
                document.getElementById('totalPrice').value = httpObject.responseText;
            }
        }
    </script>
</body>

</html>