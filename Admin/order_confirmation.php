<?php
// Include the database connection
include('../Connection/conn.php');

// Get the order ID from the URL
$orderId = $_GET['order_id'] ?? null;
include('../includes/header.php');
?>
<!-- Inline CSS for Order Confirmation Page -->
<style>
  body {
    background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
    font-family: 'Helvetica Neue', Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
  }
  .container3 {
    max-width: 850px;
    margin: 50px auto;
    padding: 40px;
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    animation: fadeIn 1s ease-in-out;
  }
  .container3 h2 {
    text-align: center;
    color: #1abc9c; /* Bright cyan color */
    margin-bottom: 25px;
    font-size: 42px; /* Increased font size for more impact */
    font-weight: bold;
    letter-spacing: 3px; /* Increased letter spacing */
    text-transform: uppercase; /* Ensures text is in uppercase */
    text-shadow: 
        0 0 15px rgba(26, 188, 156, 0.8), 
        0 0 30px rgba(26, 188, 156, 1),
        0 0 45px rgba(26, 188, 156, 1), 
        0 0 60px rgba(26, 188, 156, 1), 
        0 0 75px rgba(26, 188, 156, 1); /* Enhanced glowing effect */
    animation: glowPulse 1.5s ease-in-out infinite; /* Adds a pulsating glow animation */
    background: linear-gradient(45deg, #1abc9c, #16a085); /* Gradient background */
    -webkit-background-clip: text;
    color: transparent;
}

@keyframes glowPulse {
    0% {
        text-shadow: 0 0 15px rgba(26, 188, 156, 0.8), 0 0 30px rgba(26, 188, 156, 1), 0 0 45px rgba(26, 188, 156, 1), 0 0 60px rgba(26, 188, 156, 1), 0 0 75px rgba(26, 188, 156, 1);
    }
    50% {
        text-shadow: 0 0 20px rgba(26, 188, 156, 0.9), 0 0 40px rgba(26, 188, 156, 1), 0 0 60px rgba(26, 188, 156, 1), 0 0 80px rgba(26, 188, 156, 1), 0 0 100px rgba(26, 188, 156, 1);
    }
    100% {
        text-shadow: 0 0 15px rgba(26, 188, 156, 0.8), 0 0 30px rgba(26, 188, 156, 1), 0 0 45px rgba(26, 188, 156, 1), 0 0 60px rgba(26, 188, 156, 1), 0 0 75px rgba(26, 188, 156, 1);
    }
}

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .container3 h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 25px;
    font-size: 32px;
    font-weight: bold;
    letter-spacing: 1px;
  }
  .container3 p {
    font-size: 18px;
    color: #34495e;
    line-height: 1.6;
    margin-bottom: 18px;
  }
  .total-price {
    font-weight: bold;
    font-size: 26px;
    color: #e74c3c;
    margin: 25px 0;
    text-align: center;
  }
  .delivery-message {
    background: rgba(230, 230, 250, 1);
    border-left: 6px solid rgba(46, 204, 113, 1);
    padding: 20px 25px;
    margin-bottom: 35px;
    font-style: italic;
    font-size: 18px;
    color: #2c3e50;
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
    border-radius: 5px;
  }
  .order-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 25px;
  }
  .order-table th,
  .order-table td {
    padding: 18px 14px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    text-align: left;
    font-size: 16px;
  }
  .order-table th {
    background: linear-gradient(135deg, #2980b9, #3498db);
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .order-table td {
    background: rgba(250, 250, 250, 1);
  }
  .order-table tbody tr:hover {
    background: rgba(241, 241, 241, 1);
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .order-table tbody tr:nth-child(even) td {
    background: rgba(245, 245, 245, 1);
  }
  .order-summary {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    gap: 20px;
  }
  .order-summary div {
    flex: 1;
    padding: 20px;
    background: rgba(255, 255, 255, 1);
    border-radius: 10px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
  }
  .order-summary strong {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-size: 18px;
  }
  @media (max-width: 768px) {
    .container3 {
      margin: 20px;
      padding: 25px;
    }
    .order-table th, .order-table td {
      padding: 12px 8px;
    }
    .total-price {
      font-size: 22px;
    }
    .order-summary {
      flex-direction: column;
    }
  }
</style>

<?php
if ($orderId) {
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch();

    if ($order) {
        echo "<div class='container3'>";
        // Use customer's name if available (assumes a 'customer_name' column exists)
        $customerName = isset($order['name']) ? htmlspecialchars($order['name']) : 'Valued Customer';
        echo "<h2>Order Confirmation</h2>";
        echo "<p>Thank you for your order, <strong>{$customerName}</strong>. Your order ID is: <strong>" . htmlspecialchars($order['order_id']) . "</strong>.</p>";
        echo "<p class='total-price'>Total Price: $" . number_format($order['total_price'], 2) . "</p>";
        
        // Formal delivery message
        echo "<div class='delivery-message'>Your order has been confirmed and is currently being processed. We anticipate that your items will be delivered within 3-5 business days. We appreciate your business and will notify you once your order has shipped.</div>";

        // Retrieve order details
        $stmt = $pdo->prepare("SELECT * FROM order_details WHERE order_id = ?");
        $stmt->execute([$orderId]);
        $orderDetails = $stmt->fetchAll();

        echo "<h3>Order Details:</h3>";
        echo "<table class='order-table'>";
        echo "<thead><tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>";
        echo "<tbody>";
        foreach ($orderDetails as $detail) {
            $stmt = $pdo->prepare("SELECT name FROM products WHERE id = ?");
            $stmt->execute([$detail['product_id']]);
            $product = $stmt->fetch();

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

        // Order Summary Section (Shipping Address & Payment Method)
        echo "<div class='order-summary'>";
        echo "<div><strong>Shipping Address</strong><p>" . htmlspecialchars($order['shipping_address']) . "</p></div>";
        echo "<div><strong>Payment Method</strong><p>" . htmlspecialchars($order['payment_method']) . "</p></div>";
        echo "</div>";

        echo "</div>";
    } else {
        echo "<p>Order not found!</p>";
    }
} else {
    echo "<p>No order ID provided.</p>";
}
include('../includes/footer.php');
?>
