<?php
include 'connection.php';

$itemId = $_POST['item-id'];
$itemName = $_POST['item-name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$location = $_POST['location'];

$query = "INSERT INTO items (id, name, category, quantity, location) VALUES ('$itemId', '$itemName', '$category', '$location')";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssiss", $itemId, $itemName, $category, $quantity, $location);
$stmt->execute();
$stmt->close();
header("Location: store.html");
exit();
?>
