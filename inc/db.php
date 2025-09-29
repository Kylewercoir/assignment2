<?php
class Database {
    // Private properties to hold our connection details.
    private $host = "172.31.22.43"; 
    private $db_name = "Kyle200431463"; 
    private $username = "Kyle200431463"; 
    private $password = "jVwfoehVCC"; 
    public $conn;

    public function __construct() {
        try {
            
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
              }
    }

    public function insertOrder($name, $email, $phone, $size, $toppings, $qty, $instructions):  {
        $sql = "INSERT INTO orders (customer_name, email, phone, pizza_size, toppings, quantity, instructions)
                VALUES (:name, :email, :phone, :size, :toppings, :qty, :instructions)";
        $stmt = $this->conn->prepare(query: $sql);
        $stmt->execute(params: [
            ":name" => $name,
            ":email" => $email,
            ":phone" => $phone,
            ":size" => $size,
            ":toppings" => $toppings,
            ":qty" => $qty,
            ":instructions" => $instructions
        ]);
    }
}