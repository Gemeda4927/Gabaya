<?php
session_start();
require_once('../Connection/conn.php');  // Your database connection



// Check if the cart exists
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "Your cart is empty.";
    exit;
}

// Handle POST request from checkout form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id']; // Assuming the user is logged in and you have their ID
    $shippingAddress = $_POST['shipping_address'];
    $paymentMethod = $_POST['payment_method'];

    // Calculate total price from the cart
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $productId => $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }

    // Insert order into orders table
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, shipping_address, payment_method, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$userId, $totalPrice, $shippingAddress, $paymentMethod, 'pending']);

    // Get the order ID of the newly inserted order
    $orderId = $pdo->lastInsertId();

    // Insert order details (products in the cart) into the order_details table
    foreach ($_SESSION['cart'] as $productId => $item) {
        $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$orderId, $productId, $item['quantity'], $item['price']]);
    }

    // Clear the cart after the order is placed
    unset($_SESSION['cart']);

    // Redirect to a confirmation page or display order details
    header("Location: order_confirmation.php?order_id=" . $orderId);
    exit;
}

include('../includes/header.php');
?>
    <link rel="stylesheet" href="../css/Checkout.css">



<!-- Example HTML form for checkout -->
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

<?php
// Include the footer
include('../includes/footer.php');
?>
