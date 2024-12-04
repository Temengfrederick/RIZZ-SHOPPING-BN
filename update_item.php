<?php

include 'connection.php';

$itemId = $_POST['item-id'];
$itemName = $_POST['item-name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$location = $_POST['location'];


$query = "UPDATE items SET item-id ='".$itemId."',  item-name ='".$itemName."', category='".$category."', quantity='".$quantity."' WHERE item-id= '".$itemId ."'";


header("Location: store.html");
exit();
?>
