<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="store.css">
</head>
<body>
    <header>
    </header>
    <main>
        <section class="edit-item">
            <h2>Edit Item</h2>
            <?php
            $itemId = $_GET['item-id'];
            ?>
            <form action="update_item.php" method="post">
                <input type="hidden" name="item-id" value="<?php echo htmlspecialchars($itemId); ?>">
                
                <label for="item-name">Item Name:</label>
                <input type="text" id="item-name" name="item-name"  required>
                
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>
                
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
                
                <label for="location">Location:</label>
                <input type="text" id="location" name="location"  required>
                
                <button type="submit">Update Item</button>
            </form>
        </section>
    </main>
    <footer>
    </footer>
    <script src="store.js"></script>
</body>
</html>
