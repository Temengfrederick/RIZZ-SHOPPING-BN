<?php
// Connect to the database
include 'connection.php';

$itemId = $_GET['item-id'];

// Delete item from the database
$query = "DELETE FROM items WHERE item-id= '".$itemId ."'";
$result = mysqli_query($con, $query);
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $itemId);
$stmt->execute();
$stmt->close();

// Redirect back to the store page or another page
header("Location: inventory.html");
exit();
?>
