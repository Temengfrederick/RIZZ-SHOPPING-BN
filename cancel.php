<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Permissions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
      
    </header>
    <main>
        <section class="edit-user">
            <h2>Edit User Permissions</h2>
            <?php
            include 'connection.php';

            $username = $_GET['username'];
          
            $query = "SELECT username, role FROM users WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            ?>
            <form action="update_user.php" method="post">
                <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="Admin" <?php echo ($user['role'] === 'Admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="User" <?php echo ($user['role'] === 'User') ? 'selected' : ''; ?>>User</option>
                  
                </select>
                
                <button type="submit">Update Permissions</button>
            </form>
        </section>
    </main>
    <footer>
    
    </footer>
    <script src="scripts.js"></script>
</body>
</html>
