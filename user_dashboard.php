<?php
session_start();

// Check if the user is logged in and has the 'user' role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');  // Redirect to login page if not logged in or not a user
    exit;
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!<br>";
echo "You have user access.<br><br>";

// User functionality: For example, browse property listings, view details, etc.
echo "<a href='index.php'>Browse Properties</a><br>";
echo "<a href='logout.php'>Logout</a><br>";
?>
