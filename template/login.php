<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the home page or account page
    header("Location: home.php");
    exit;
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Validate and sanitize the input

    // TODO: Verify the credentials against the database
    // Example code:
    // $user = getUserByUsername($username);
    // if ($user && password_verify($password, $user['password'])) {
    //     // Credentials are valid, initiate a session
    //     $_SESSION['user_id'] = $user['id'];
    //     // Redirect to the home page or account page
    //     header("Location: home.php");
    //     exit;
    // }

    // If the credentials are not valid, show an error message
    $error = "Invalid username or password";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
