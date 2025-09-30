<?php
class Order {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function saveOrder($data) {
        $sql = "INSERT INTO orders (customer_name, email, phone, pizza_size, toppings, crust, notes)
                VALUES (:customer_name, :email, :phone, :pizza_size, :toppings, :crust, :notes)";
        $stmt = $this->pdo->prepare($sql);
