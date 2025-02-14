<?php
session_start();
require_once('../Connection/conn.php');

// Initialize cart if it doesn't exist
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Handle removal of a product from the cart
if (isset($_GET['remove'])) {
    $productIdToRemove = $_GET['remove'];
    if (isset($_SESSION['cart'][$productIdToRemove])) {
        unset($_SESSION['cart'][$productIdToRemove]);
    }
    header("Location: cart.php");
    exit;
}

// Handle quantity update (increment/decrement)
if (isset($_POST['update_quantity'])) {
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$productId])) {
        if ($action === 'increment') {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } elseif ($action === 'decrement' && $_SESSION['cart'][$productId]['quantity'] > 1) {
            $_SESSION['cart'][$productId]['quantity'] -= 1;
        }
    }
    header("Location: cart.php");
    exit;
}

// Calculate total price
$totalPrice = 0;
foreach ($cart as $productId => $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - E-Commerce</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/cart.css">
    

</head>
<body>
    <?php include('../includes/header.php'); ?>

    <section class="cart">
        <h2>Your Cart</h2>

        <?php if (count($cart) > 0): ?>
            <div class="cart-items">
                <?php foreach ($cart as $productId => $item): ?>
                    <?php
                    // Fetch product details from the database
                    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
                    $stmt->execute([$productId]);
                    $product = $stmt->fetch();
                    ?>

                    <div class="cart-item">
                        <img src="../Image/Gabayaa.webp" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div>
                            <p><?php echo htmlspecialchars($product['name']); ?></p>
                            <p>$<?php echo number_format($product['price'], 2); ?></p>
                        </div>
                        <div class="quantity-controls">
                            <form action="cart.php" method="post" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="hidden" name="action" value="decrement">
                                <button type="submit" name="update_quantity">-</button>
                            </form>
                            <p><?php echo $item['quantity']; ?></p>
                            <form action="cart.php" method="post" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="hidden" name="action" value="increment">
                                <button type="submit" name="update_quantity">+</button>
                            </form>
                        </div>
                        <p>Total: <?php echo number_format($item['quantity'] * $product['price'], 2); ?> birr</p>
                        <a href="cart.php?remove=<?php echo $productId; ?>" class="remove-item">Remove</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-total">
                <p><strong>Total: $<?php echo number_format($totalPrice, 2); ?></strong></p>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <p class="empty-cart">Your cart is empty.</p>
        <?php endif; ?>
    </section>

    <?php include('../includes/footer.php'); ?>
</body>
</html>