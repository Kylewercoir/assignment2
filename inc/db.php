<?php
class Database {
    // Private properties to hold our connection details.
    private $host = "172.31.22.43"; 
    private $db_name = "Kyle200431463"; 
    private $username = "Kyle200431463"; 
    private $password = "jVwfoehVCC"; 
    public $conn;

    public function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->db_name}",
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return $this->conn;
    }
}
