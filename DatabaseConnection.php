<?php
class Database {
    private $host = "localhost"; // all private functions hold info to gain access to the database 
    private $db_name = "property_search";
    private $username = "root";
    private $password = "";
    public $conn; // store connection to be used in getconnect

    public function getConnection() { //public function that handles the connection of database and the system
        $this->conn = null; // insures connection reset

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
           // uses the conn for  the PDO(php data objects) and  DSN (data source name)
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //throws exception if there is error
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>