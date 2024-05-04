<?php

// FILEPATH: /Users/mac/e-commerce/ecommerce-site/signup.php

// Form Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect user input
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Input Validation
    // TODO: Add validation logic here

    // User Registration
    // TODO: Hash the password and store user information in the database

    // Session Handling
    // TODO: Start a session for the user upon successful registration
}

?>

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
