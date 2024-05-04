<?php

// Fetch Categories
function fetchCategories() {
    // Your code to retrieve categories from the database goes here
}

// Link to Products
function linkToProducts($categoryId) {
    // Your code to generate a link to the products.php page with the filtered category goes here
}

// Display Categories
function displayCategories() {
    $categories = fetchCategories();

    foreach ($categories as $category) {
        $categoryId = $category['id'];
        $categoryName = $category['name'];

        $productLink = linkToProducts($categoryId);

        echo "<a href='$productLink'>$categoryName</a><br>";
    }
}

// Call the function to display categories
displayCategories();

?>
