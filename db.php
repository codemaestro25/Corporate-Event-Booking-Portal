<?php
class DBConnection{
    private $host = "localhost";
    private $username = "root";
    private $password = "12345678";
    private $db = "canteen";

    public $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        // if(!$this->conn){
        //     echo '<script>alert("Error in Connection")</script>';
        // }
        // else{
        //     echo '<script>alert("Connection Successfull")</script>';
        // }
    }

}
?>