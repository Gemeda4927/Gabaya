<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gabaya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the product ID from query parameters
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Query to get product details
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return product details as JSON
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Product not found"]);
    }
} else {
    echo json_encode(["error" => "Invalid product ID"]);
}

$conn->close();
?>
