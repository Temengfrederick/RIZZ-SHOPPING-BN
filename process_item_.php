<?php
// Establish database connection
require_once 'connection.php';

// Validate and sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Get and validate POST data
$itemId = sanitizeInput($_POST['item-id'] ?? '');
$itemName = sanitizeInput($_POST['item-name'] ?? '');
$category = sanitizeInput($_POST['category'] ?? '');
$quantity = filter_var($_POST['quantity'] ?? 0, FILTER_VALIDATE_INT);
$location = sanitizeInput($_POST['location'] ?? '');

// Validate required fields
if (empty($itemId) || empty($itemName) || empty($category) || $quantity === false || empty($location)) {
    $_SESSION['error'] = "All fields are required and must be valid";
    header("Location: inventory.php");
    exit();
}

try {
    // Prepare SQL statement
    $query = "INSERT INTO items (id, name, category, quantity, location) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    
    // Bind parameters and execute
    $stmt->bind_param("sssis", $itemId, $itemName, $category, $quantity, $location);
    
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    
    $_SESSION['success'] = "Item added successfully";
    $stmt->close();
    
} catch (Exception $e) {
    $_SESSION['error'] = "Error: " . $e->getMessage();
} finally {
    $conn->close();
    header("Location: inventory.php");
    exit();
}