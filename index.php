<?php 
include "inc/header.php"; 
?>
// form to process the contact info 
<form action="process.php" method="POST">
    <fieldset>
        <legend>Customer info</legend>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>

        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone">

    </fieldset>




</form>