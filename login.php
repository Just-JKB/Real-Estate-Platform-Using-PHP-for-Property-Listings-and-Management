<?php
session_start();  // Start session to store user data

require_once 'users.php';  // Include the users array to check credentials

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');  // Redirect to dashboard if already logged in
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
                header('Location: admin_dashboard.php');  // Redirect to Admin Dashboard
            } else {
                header('Location: user_dashboard.php');  // Redirect to User Dashboard
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

<!-- Login Form -->
<form method="POST">
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <button type="submit">Login</button>
</form>
