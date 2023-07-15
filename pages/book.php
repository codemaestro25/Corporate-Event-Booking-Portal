<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Order</title>
    <link rel="stylesheet" href="./css/book.css">
    <link rel="stylesheet" href="../components/css/navbar.css">
</head>

<body>
    <div class="main">
        <?php 
        
        
        require_once('../login/session.php');
            include('../components/navbar.php');
            include('../db.php');
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
            <h1 class"heading">Book New Event</h1>
            <?php echo "<h4>Welcome ".$_SESSION['emp_name']."</h4>"?>
            <div class="form">
                <form action="../actions/newOrder.php" method="post">
                    <div class="two-element">
                        <label for="eve_date">Event Date</label>
                        <input type="date" name="eve_date" id="" required>
                        <br>
                        <label for="eve_time">Event Time</label>
                        <input type="time" name="eve_time" id="" required>
                        <br>
                        <label for="eve_type">Event Type</label>
                        <select name="eve_type" id="" required>
                            <option value="Retirement">Retirement</option>
                            <option value="Birthday">Birthday</option>
                            <option value="Anniversary">Anniversary</option>
                            <option value="Party">Get Together Party</option>
                        </select>
                        <br>
                        <label for="person_count">Person Count</label>
                        <input name="person_count" id="person_count" type="text" onkeyup="calculateTotal(); " required>
                    </div>
                    <div class="package-section">
                        <p id="fphead">Food Packages</p>
                        <div class="packages">
                            <div class="pack_container" class='pack-radio' id="bronze">
                                <input type="radio" name="package" value="Bronze" class="radio-btn" required>
                                <label for="package" class="pack-head">BRONZE </label>
                                <h4>Starter</h4>
                                <ul class="starters">
                                    <?php 
                                $sql = "select it_name from food_items where bronze = 'y' and it_category = 'S'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <h4>Main Course</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select it_name from food_items where bronze = 'y' and it_category = 'M'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <h4>Deserts</h4>
                                <ul class="deserts">
                                <?php 
                                $sql = "select it_name from food_items where bronze = 'y' and it_category = 'D'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <div class="price"><?php echo ("Rs. ".$arr[0]." /-"); ?></div>
                            </div>
                            <div class="pack_container" id="silver">
                                <input type="radio" name="package" class='pack-radio' value="Silver" class="radio-btn" required>
                                <label for="package" class="pack-head">SILVER </label>
                                <h4>Starter</h4>
                                <ul class="starters">
                                    <?php 
                                $sql = "select it_name from food_items where silver = 'y' and it_category = 'S'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <h4>Main Course</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select it_name from food_items where silver = 'y' and it_category = 'M'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <h4>Deserts</h4>
                                <ul class="deserts">
                                <?php 
                                $sql = "select it_name from food_items where silver = 'y' and it_category = 'D'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <div class="price"><?php echo ("Rs. ".$arr[1]." /-"); ?></div>
                                
                            </div>
                            <div class="pack_container" id="gold">
                                <input type="radio" class='pack-radio' name="package" value="Gold" class="radio-btn" required>
                                <label for="package" class="pack-head">GOLD </label>
                                <h4>Starter</h4>
                                <ul class="starters">
                                    <?php 
                                $sql = "select it_name from food_items where gold = 'y' and it_category = 'S'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <h4>Main Course</h4>
                                <ul class="main-course">
                                <?php 
                                $sql = "select it_name from food_items where gold = 'y' and it_category = 'M'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                <h4>Deserts</h4>
                                <ul class="deserts">
                                <?php 
                                $sql = "select it_name from food_items where gold = 'y' and it_category = 'D'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo ('<li>'.$row[0].'</li>');
                                    }
                                ?>

                                </ul>
                                
                                <div class="price"><?php echo ("Rs. ".$arr[2]." /-"); ?></div>
                            </div>
                                   
                        </div>
                        

                        <p id="totalPrice"></p>
                        <button type="submit" id="submit-btn">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
         function getHTTPObject(){
                if(window.ActiveXObject){
                    return new ActiveXObject('Microsoft.XMLHTTP');
                }
                else if(window.XMLHttpRequest){
                    return new XMLHttpRequest();
                }
                else{
                    alert('nigh!');
                    return null;
                }
            }

            function calculateTotal(){
                httpObject = getHTTPObject();
                if(httpObject!=null){
                    httpObject.open("GET","countTotal.php", true);
                    httpObject.send(null);
                    httpObject.onreadystatechange = setOutput;
                }
            }

            function setOutput(){
                if(httpObject.readyState == 4){
                    document.getElementById('totalPrice').value = httpObject.responseText;
                }
            }
    </script>
</body>

</html>