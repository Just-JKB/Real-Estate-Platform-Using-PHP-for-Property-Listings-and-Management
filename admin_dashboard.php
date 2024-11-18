<?php
session_start();

// Check if the user is logged in and has the 'admin' role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');  // Redirect to login page if not logged in or not an admin
    exit;
}

echo "Welcome, Admin " . htmlspecialchars($_SESSION['username']) . "!<br>";
echo "You have admin access.<br><br>";

// Admin functionality: For example, view and manage property listings, users, etc.
echo "<a href='manage_properties.php'>Manage Properties</a><br>";
echo "<a href='logout.php'>Logout</a><br>";
?>