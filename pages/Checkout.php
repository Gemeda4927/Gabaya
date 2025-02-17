<?php
session_start();
require_once('../Connection/conn.php'); // Database connection

// Check if cart exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

// Handle POST request from checkout form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id'])) {
        echo "User not logged in.";
        exit;
    }

    $userId = $_SESSION['id']; // User ID from session
    $shippingAddress = trim($_POST['shipping_address']);
    $paymentMethod = trim($_POST['payment_method']);

    // Validate input
    if (empty($shippingAddress) || empty($paymentMethod)) {
        echo "All fields are required.";
        exit;
    }

    // Calculate total price
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $productId => $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }

    try {
        $pdo->beginTransaction();

        // Insert order into orders table
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, shipping_address, payment_method, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $totalPrice, $shippingAddress, $paymentMethod, 'pending']);
        $orderId = $pdo->lastInsertId();

        // Insert order details
        $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($_SESSION['cart'] as $productId => $item) {
            $stmt->execute([$orderId, $productId, $item['quantity'], $item['price']]);
        }

        $pdo->commit();
        unset($_SESSION['cart']); // Clear cart
        header("Location: ../Admin/order_confirmation.php?order_id=" . $orderId);
        exit;
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Order processing failed: " . $e->getMessage();
        exit;
    }
}
include('../includes/header.php');
?>

<link rel="stylesheet" href="../css/Checkout.css">
<form action="checkout.php" method="POST">
    <label for="shipping_address">Shipping Address</label>
    <textarea name="shipping_address" id="shipping_address" required></textarea>
    
    <label for="payment_method">Payment Method</label>
    <select name="payment_method" id="payment_method" required>
        <option value="credit_card">Credit Card</option>
        <option value="paypal">PayPal</option>
        <option value="bank_transfer">Bank Transfer</option>
    </select>
    
    <button type="submit">Complete Order</button>
</form>
<?php include('../includes/footer.php'); ?>
