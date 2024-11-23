<?php
session_start();

// Check if the user is logged in and has the 'user' role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');  // Redirect to login page if not logged in or not a user
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Management - User Dashboard</title>
    <link rel="stylesheet" href="styleuser.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Your Dashboard</h1>
        </header>

        <main>
            <div class="user-info">
                <h2>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                <p>You have user access.</p>
            </div>

            <div class="user-actions">
                <h3>What would you like to do?</h3>
                <ul>
                    <li><a href="index.php" class="button">Browse Properties</a></li>
                    
                </ul>
            </div>
        </main>
        
        <footer>
            <p>&copy; 2024 Real Estate Management. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>