<?php
if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $sql = "SELECT * FROM products WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<img src='assets/images/" . $row['image_path'] . "' alt='product image'>";
            echo "<p>" . $row['product_name'] . "</p>";
            echo "<p>Price: " . $row['price'] . "</p>";
            echo "<a href='cart.php?action=add&product_id=" . $row['product_id'] . "'>Add to Cart</a>";
            echo "</div>";
        }
    } else {
        echo "No products found in this category.";
    }
}
?>
