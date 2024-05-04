<?php
session_start();

// Authentication check
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect non-admins to login page
    exit();
}

include('includes/header.php');
?>

<div class="admin-panel">
    <h1>Admin Dashboard</h1>
    <!-- Add your CRUD sections here -->
</div>

<?php include('includes/footer.php'); ?>
