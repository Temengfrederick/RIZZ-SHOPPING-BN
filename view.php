<?php
require_once("connection.php");
$order_id = $_GET['Order ID'] ?? null;

if ($order_id) {
    $order = [
        'Order ID' => '1001',
        'Customer' => 'Nana Aba',
        'Order Date' => '2024-07-01',
        'Status' => 'Shipped',
        'Total Amount' => 450.00
    ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    
        echo "<p>Order updated successfully!</p>";
    }
} else {
    echo "Invalid Order ID";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order #<?php echo htmlspecialchars($order_id); ?></title>
</head>
<body>
    <h1>Edit Order #<?php echo htmlspecialchars($order_id); ?></h1>

    <form action="edit.php?order_id=1001<?php echo htmlspecialchars($order_id); ?>" method="post">
        <label for="customer">Customer Name:</label>
        <input type="text" id="customer" name="customer" value="<?php echo htmlspecialchars($order['customer']); ?>" required>

        <label for="order-date">Order Date:</label>
        <input type="date" id="order-date" name="order-date" value="<?php echo htmlspecialchars($order['order_date']); ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="pending" <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="shipped" <?php if ($order['status'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
            <option value="delivered" <?php if ($order['status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
            <option value="cancelled" <?php if ($order['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
        </select>

        <label for="total-amount">Total Amount:</label>
        <input type="number" id="total-amount" name="total-amount" value="<?php echo htmlspecialchars($order['total_amount']); ?>" step="0.01" required>

        <button type="submit">Update Order</button>
    </form>
</body>
</html>
