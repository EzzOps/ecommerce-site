<?php
session_start();

// Session Check
if (isset($_SESSION['user'])) {
    // User is logged in
    $loggedIn = true;
} else {
    // User is not logged in
    $loggedIn = false;
}

function loadFeaturedProducts() {
    global $wpdb; 
    $tableName = $wpdb->prefix . 'products';

    $query = "SELECT id, name, description, price FROM {$tableName} WHERE featured = 1";
    $featuredProducts = $wpdb->get_results($query, ARRAY_A);

    return $featuredProducts;
}

// Function to filter products based on keyword
function filterProductsByKeyword($keyword) {
    $allProducts = loadFeaturedProducts();
    return array_filter($allProducts, function($product) use ($keyword) {
        return stripos($product['name'], $keyword) !== false;
    });
}

// Function to sort products
function sortProducts($products, $sortOption) {
    usort($products, function($a, $b) use ($sortOption) {
        return $sortOption === 'price_asc' ? $a['price'] <=> $b['price'] : $b['price'] <=> $a['price'];
    });
    return $products;
}

$featuredProducts = loadFeaturedProducts();

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $filteredProducts = filterProductsByKeyword($keyword);
} else {
    $filteredProducts = $featuredProducts;
}

if (isset($_GET['sort'])) {
    $sortOption = $_GET['sort'];
    $filteredProducts = sortProducts($filteredProducts, $sortOption);
}

include('includes/header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-commerce Website</title>
</head>
<body>
    <main>
        <div class="slider">
            <?php foreach ($featuredProducts as $product): ?>
                <div>
                    <img src="placeholder.jpg" alt="<?php echo htmlspecialchars($product['name']); ?>"> <!-- Placeholder image -->
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>$<?php echo htmlspecialchars($product['price']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search products" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">Search</button>
        </form>

        <div class="options">
            <form action="" method="GET">
                <select name="sort" onchange="this.form.submit()">
                    <option value="price_asc">Price Low to High</option>
                    <option value="price_desc">Price High to Low</option>
                </select>
            </form>
        </div>

        <div class="products">
            <?php foreach ($filteredProducts as $product): ?>
                <div>
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>$<?php echo htmlspecialchars($product['price']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php
    include('includes/footer.php');
    ?>

</body>
</html>
