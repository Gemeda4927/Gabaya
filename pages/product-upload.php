<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: ../Admin/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload - Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <section class="product-upload">
        <h2>Upload New Product</h2>
        <form action="../Backend/upload-product.php" method="POST" enctype="multipart/form-data">
            <label for="product-name">Product Name:</label>
            <input type="text" name="product_name" id="product-name" required><br>

            <label for="product-description">Product Description:</label>
            <textarea name="product_description" id="product-description" required></textarea><br>

            <label for="product-price">Price:</label>
            <input type="number" name="product_price" id="product-price" step="0.01" required><br>

            <label for="product-category">Category:</label>
            <input type="text" name="product_category" id="product-category" required><br>

            <label for="product-image">Product Image:</label>
            <input type="file" name="product_image" id="product-image" accept="image/*" ><br>

            <button type="submit" name="submit">Upload Product</button>
        </form>
    </section>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
