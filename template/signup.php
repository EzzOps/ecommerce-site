<?php

// FILEPATH: /Users/mac/e-commerce/ecommerce-site/signup.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format');
    }
    if (strlen($password) < 8) {
        die('Password must be at least 8 characters long');
    }

    global $wpdb;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $tableName = $wpdb->prefix . 'users'; 
    $wpdb->insert(
        $tableName,
        [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $hashedPassword
        ],
        ['%s', '%s', '%s', '%s']
    );

    // Session Handling
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['firstName'] = $firstName;
    header('Location: welcome.php'); 
}

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="POST" action="signup.php">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
