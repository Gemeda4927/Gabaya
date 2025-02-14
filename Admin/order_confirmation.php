<?php
// Include the database connection
include('../Connection/conn.php'); // Adjust the path as needed

// Get the order ID from the URL
$orderId = $_GET['order_id'] ?? null;
include('../includes/header.php'); // Include header

if ($orderId) {
    // Fetch the order details from the orders table using the order_id from the URL
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch();

    if ($order) {
        echo "<div class='container3'>"; // Use the updated container class
        echo "<h2>Order Confirmation</h2>";
        echo "<p>Thank you for your order! Your order ID is: " . htmlspecialchars($order['order_id']) . "</p>";
        echo "<p class='total-price'>Total Price: <span>$" . number_format($order['total_price'], 2) . "</span></p>";

        // Fetch the order details (products) from the order_details table for the order_id
        $stmt = $pdo->prepare("SELECT * FROM order_details WHERE order_id = ?");
        $stmt->execute([$orderId]);
        $orderDetails = $stmt->fetchAll();

        echo "<h3>Order Details:</h3>";
        
        echo "<table class='order-table'>";
        echo "<thead><tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>";
        echo "<tbody>";
        foreach ($orderDetails as $detail) {
            // Fetch product name using product_id
            $stmt = $pdo->prepare("SELECT name FROM products WHERE id = ?");
            $stmt->execute([$detail['product_id']]);
            $product = $stmt->fetch();
            
            // Calculate total price for each item
            $totalPrice = $detail['quantity'] * $detail['price'];
            echo "<tr>
                    <td>" . htmlspecialchars($product['name']) . "</td>
                    <td>" . $detail['quantity'] . "</td>
                    <td>$" . number_format($detail['price'], 2) . "</td>
                    <td>$" . number_format($totalPrice, 2) . "</td>
                  </tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>Order not found!</p>";
    }
} else {
    echo "<p>No order ID provided.</p>";
}

// Include footer
include('../includes/footer.php');
?>
