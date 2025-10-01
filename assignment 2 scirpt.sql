CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    pizza_size ENUM('Small','Medium','Large') NOT NULL,
    toppings TEXT,
    crust ENUM('Thin','Regular','Thick',"Deep Dish"