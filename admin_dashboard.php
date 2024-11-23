<?php
session_start();

// Check if the user is logged in and has the 'admin' role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');  // Redirect to login page if not logged in or not an admin
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Real Estate Management</title></head>
    <link rel="stylesheet" href="styleadmin.css">
<body>

    <header>
        <h1>Real Estate Management System</h1>
    </header>

    <div class="container">
        <p class="admin-welcome">Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p>You have admin access. From here, you can manage properties, users, and more.</p>

        <a href="manage_properties.php">Manage Properties</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Real Estate Management System. All rights reserved.</p>
    </footer>

</body>
</html>