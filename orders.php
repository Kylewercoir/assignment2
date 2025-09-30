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
         return $stmt->execute([
            ':customer_name' => $data['name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':pizza_size' => $data['pizza_size'],
            ':toppings' => isset($data['toppings']) ? implode(", ", $data['toppings']) : '',
            ':crust' => $data['crust'],
            ':notes' => $data['notes']
        ]);
    }
}
