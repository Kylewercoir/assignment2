<?php

include "inc/header.php";
require "config.php";
require "inc/db.php";
require "order.php";

$success = false;
$error = "";

// Handling the  form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $db = new Database();
        $pdo = $db->getConnection();

        $order = new Order ($pdo);

        $success = $order->saveOrder($_POST);

        if (!$success) {
            $error = "There was an issue saving your order.";
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
//  div class to alert you your order was placed 
?>
<div class="container mt-4">
    <?php if($success): ?>
        <div class="alert alert-success">
            <p>Your pizza order was placed</p>
        </div>
    <?php endif; ?> 

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="post" class="mb-3">

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="tel" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pizza Size</label>
            <select name="pizza_size" class="form-select" required>
                <option value="">-- Choose Size --</option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>
        </div>

        <div class="container">
            <label class="form-label">Toppings</label><br>
            <input type="checkbox" name="toppings[]" value="Pepperoni"> Pepperoni
            <input type="checkbox" name="toppings[]" value="Mushrooms"> Mushrooms
            <input type="checkbox" name="toppings[]" value="Onions"> Onions
            <input type="checkbox" name="toppings[]" value="Cheese"> Extra Cheese
            <input type="checkbox" name="toppings[]" value="Green Peppers"> Green Peppers
            <input type="checkbox" name="toppings[]" value="Pineapple"> Pineapple
        </div>

        <div class="mb-3">
            <label class="form-label">Crust</label><br>
            <input type="radio" name="crust" value="Thin" required> Thin
            <input type="radio" name="crust" value="Regular"> Regular
            <input type="radio" name="crust" value="Thick"> Thick
             <input type="radio" name="crust" value="Deep Dish"> Deep Dish

        </div>

        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Place Order</button>
    </form>   
</div>

<?php include "inc/footer.php";