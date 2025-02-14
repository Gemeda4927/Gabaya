<?php
session_start();

// If the user is not an admin, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

require_once('../Connection/conn.php');

// Handle form submission
if (isset($_POST['submit'])) {
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    $productPrice = $_POST['product_price'];
    $productCategory = $_POST['product_category'];

    // Handle image upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $imageName = $_FILES['product_image']['name'];
        $imageTmpName = $_FILES['product_image']['tmp_name'];
        $uploadDir = '../assets/images/products/';
        $uploadPath = $uploadDir . $imageName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpName, $uploadPath)) {
            // Insert product data into the database
            $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$productName, $productDescription, $productPrice, $productCategory, $imageName]);

            echo "<p>Product uploaded successfully!</p>";
        } else {
            echo "<p>Error uploading the image. Please try again.</p>";
        }
    }

    // Insert product data without the image if no image is uploaded
    else {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category) VALUES (?, ?, ?, ?)");
        $stmt->execute([$productName, $productDescription, $productPrice, $productCategory]);

        echo "<p>Product uploaded successfully without an image!</p>";
    }
}
?>
