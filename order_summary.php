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
    <title>Order Summary</title>
</head>
<body>
    <h3>Order Summary</h3>
    <p><strong>Order ID:</strong> <?php echo htmlspecialchars($_POST['order-id']); ?></p>
    <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($_POST['customer']); ?></p>
    <p><strong>Order Date:</strong> <?php echo htmlspecialchars($_POST['order-date']); ?></p>
    <p><strong>Status:</strong> <?php echo htmlspecialchars($_POST['status']); ?></p>
    <p><strong>Total Amount:</strong> $<?php echo htmlspecialchars($_POST['total-amount']); ?></p>
    
    <a href="create_order.php">Create Another Order</a>
</body>
</html>
