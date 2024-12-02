<?php
session_start();  // Start session to store user data

require_once 'users.php';  // Include the users array to check credentials

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header('Location: logout.php');  // Redirect to dashboard if already logged in
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $username = filter_var ($_POST['username']);
    $password = $_POST['password'];

    // Check if the username exists in the users array
    if (isset($users[$username])) {
        // Verify the password using password_verify()
        if (password_verify($password, $users[$username]['password'])) {
            // Successful login, set session variables
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]['role'];

            // Redirect based on user role
            if ($_SESSION['role'] == 'admin') {
                header('Location: manage_properties.php');  // Redirect to Admin Dashboard
            } else {
                header('Location: index.php');  // Redirect to User Dashboard
            }
            exit;
        } else {
            $error = 'Incorrect password!';
        }
    } else {
        $error = 'Username not found!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clavem</title>
    <link rel="stylesheet" href="Styles/stylelogin.css">
</head>
<body> 

<nav>
    <div class="logo">
    <img src="logo\clavem-logo.png.png" alt="Clavem" height="50" class="img-size"> <!-- Add your logo image here -->
    </div>
</nav>

<div class= "login-container" >                                                                                                                                                                                                                                                                                                                    
        <h2>Real Estate Management Login</h2>
        <form method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
    </div>
</div>
<footer class="footer-bar">
	&copy; 2024 Clavem. All rights reserved.
</footer>
</body>
</html>