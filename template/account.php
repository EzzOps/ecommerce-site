<?php

// FILEPATH: /Users/mac/e-commerce/ecommerce-site/account.php

// Session Check: Ensure the user is logged in before allowing access to this page.
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display an error message
    header('Location: login.php');
    exit;
}

// Fetch User Data: Retrieve and display the user's stored information from the database.
// Replace this with your own logic to fetch user data from the database
$userData = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    // Add more user data fields as needed
];

// Order History: Fetch and display a list of past orders linked to the user.
// Replace this with your own logic to fetch and display order history
$orderHistory = [
    ['order_id' => 1, 'date' => '2022-01-01', 'total' => 100.00],
    ['order_id' => 2, 'date' => '2022-02-01', 'total' => 150.00],
    // Add more order history data as needed
];

// Form Handling: If the user updates their information, validate and save the changes to the database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    // Replace this with your own logic to handle form submission and update user data in the database
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validate and save the changes
    // ...

    // Redirect to the account page or display a success message
    header('Location: account.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Management</title>
    <!-- Add your CSS and JavaScript files here -->
</head>
<body>
    <h1>Account Management</h1>

    <h2>User Information</h2>
    <p>Name: <?php echo $userData['name']; ?></p>
    <p>Email: <?php echo $userData['email']; ?></p>
    <!-- Add more user information fields as needed -->

    <h2>Order History</h2>
    <ul>
        <?php foreach ($orderHistory as $order) : ?>
            <li>Order ID: <?php echo $order['order_id']; ?>, Date: <?php echo $order['date']; ?>, Total: <?php echo $order['total']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Edit Account Information</h2>
    <form method="POST" action="account.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $userData['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $userData['email']; ?>" required>

        <!-- Add more input fields for other user information as needed -->

        <button type="submit">Save Changes</button>
    </form>

    <!-- Add your additional HTML content here -->

</body>
</html>
