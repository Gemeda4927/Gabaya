<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - E-Commerce</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="../JS/main.js" defer></script>
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <section class="hero-banner">
        <img src="../assets/images/hero-banner.jpg" alt="Hero Banner">
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <!-- Example Product Card -->
            <div class="product-card">
                <img src="../assets/images/product1.jpg" alt="Product 1">
                <h3>Product 1</h3>
                <p>$25.00</p>
                <button onclick="addToCart(1)">Add to Cart</button>
            </div>
            <!-- More product cards... -->
        </div>
    </section>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
