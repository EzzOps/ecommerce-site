<?php

// Session Check: Ensure the user is logged in.
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$cartItems = &$_SESSION['cart'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    foreach ($_POST['quantities'] as $key => $quantity) {
        if ($quantity == 0) {
            unset($cartItems[$key]);
        } else {
            $cartItems[$key]['quantity'] = $quantity;
        }
    }
}

if (isset($_POST['checkout'])) {
    header('Location: checkout.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <div>
        <?php if (!empty($cartItems)): ?>
            <form method="post">
                <?php foreach ($cartItems as $index => $item): ?>
                    <div>
                        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                        <p>Price: <?php echo htmlspecialchars($item['price']); ?></p>
                        <p>
                            Quantity:
                            <input type="number" name="quantities[<?php echo $index; ?>]" value="<?php echo $item['quantity']; ?>" min="0">
                        </p>
                    </div>
                <?php endforeach; ?>
                <button type="submit" name="update">Update Cart</button>
                <button type="submit" name="checkout">Proceed to Checkout</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
