<?php
session_start();
require_once('../Connection/conn.php');

// Check if product ID is passed via URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details from the database
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch();

    if (!$product) {
        echo "<p>Product not found.</p>";
        exit;
    }
} else {
    echo "<p>No product selected.</p>";
    exit;
}

// Handle adding to the cart
if (isset($_POST['add_to_cart'])) {
    $productIdToAdd = $_POST['product_id'];

    // Check if the product exists
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$productIdToAdd]);
    $productToAdd = $stmt->fetch();

    if ($productToAdd) {
        // Initialize the cart if not already done
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product already exists in the cart
        if (isset($_SESSION['cart'][$productIdToAdd])) {
            $_SESSION['cart'][$productIdToAdd]['quantity'] += 1; // Update quantity
        } else {
            // Add new product to the cart
            $_SESSION['cart'][$productToAdd['id']] = [
                'name' => $productToAdd['name'],
                'price' => $productToAdd['price'],
                'quantity' => 1,
                'image' => $productToAdd['image']
            ];
        }

        // Redirect to the cart page
        header("Location: cart.php");
        exit;
    } else {
        echo "<p>Product not found.</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - E-Commerce</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/product-detail.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <div class="container2">
        <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
        <div class="product-detail-card">
            <div class="product-image">
                <img src="../Image/Gabayaa.webp" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="product-info">
                <p class="product-description"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                <p class="product-price"><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
                <p class="product-category"><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                <p class="product-stock"><strong>Stock Availability:</strong> <?php echo $product['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?></p>
                
                <!-- Add to Cart Form -->
                <form action="product-detail.php?id=<?php echo $product['id']; ?>" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="add_to_cart" class="btn <?php echo $product['stock'] > 0 ? '' : 'disabled'; ?>" <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>>
                        <?php echo $product['stock'] > 0 ? 'Add to Cart' : 'Out of Stock'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>