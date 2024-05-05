<?php

// Start the session for cart and wishlist handling
session_start();

$product_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$product_details = []; 

if ($product_id) {
    $product_details = getProductDetailsById($product_id);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $product_details; 
    } elseif (isset($_POST['add_to_wishlist'])) {
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = [];
        }
        $_SESSION['wishlist'][] = $product_details;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>

    <?php if ($product_details): ?>
        <div>
            <img src="<?php echo htmlspecialchars($product_details['image_url']); ?>" alt="Product Image">
            <h2><?php echo htmlspecialchars($product_details['name']); ?></h2>
            <p><?php echo htmlspecialchars($product_details['description']); ?></p>
            <p>Price: <?php echo htmlspecialchars($product_details['price']); ?></p>
            <form method="post">
                <button type="submit" name="add_to_cart">Add to Cart</button>
                <button type="submit" name="add_to_wishlist">Add to Wishlist</button>
            </form>
        </div>
    <?php else: ?>
        <p>No product details found.</p>
    <?php endif; ?>

</body>
</html>
