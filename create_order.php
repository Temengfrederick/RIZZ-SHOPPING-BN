<?php 
 require_once("connection.php");
 $query = "SELECT * FROM orders";
    $result = mysqli_query($con, $query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Create New Order</title>
</head>
<body>
    <section class="create-order">
        <h3>Create New Order</h3>
        <form action="order_summary.php" method="post">
            <label for="order-id">Order ID:</label>
            <input type="text" id="order-id" name="order-id" required>
            
            <label for="customer">Customer Name:</label>
            <input type="text" id="customer" name="customer" required>
            
            <label for="order-date">Order Date:</label>
            <input type="date" id="order-date" name="order-date" required>
            
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="pending">Pending</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>
            
            <label for="total-amount">Total Amount:</label>
            <input type="number" id="total-amount" name="total-amount" step="0.01" required>
            
            <button type="submit">Create Order</button>
        </form>
    </section>
</body>
</html>
