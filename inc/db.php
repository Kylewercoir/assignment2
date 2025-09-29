<?php
class Database {
    // Private properties to hold our connection details.
    private $host = "172.31.22.43"; // The database server hostname.
    private $db_name = "Kyle200431463"; // Your database name.
    private $username = "Kyle200431463"; // Your database username.
    private $password = "jVwfoehVCC"; // Your database password.
    public $conn;

    public function __construct() {
        try {
            
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);