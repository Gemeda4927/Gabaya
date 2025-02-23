<!-- <?php include('../includes/header.php')?> -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gabaya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete Action for Orders, Products, and Users
if (isset($_GET['delete_order_id'])) {
    $order_id = $_GET['delete_order_id'];
    $conn->query("DELETE FROM orders WHERE order_id = $order_id");
    header("Location: index.php"); // Refresh the page after deletion
}

if (isset($_GET['delete_product_id'])) {
    $product_id = $_GET['delete_product_id'];
    $conn->query("DELETE FROM products WHERE id = $product_id");
    header("Location: index.php"); // Refresh the page after deletion
}

if (isset($_GET['delete_user_id'])) {
    $user_id = $_GET['delete_user_id'];
    $conn->query("DELETE FROM users WHERE id = $user_id");
    header("Location: index.php"); // Refresh the page after deletion
}

// Handle Role Update Action
if (isset($_POST['user_id']) && isset($_POST['role'])) {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];
    $conn->query("UPDATE users SET role = '$role' WHERE id = $user_id");
    header("Location: index.php"); // Refresh the page after role update
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="container">
        <!-- Product Upload Form -->
        <div class="upload-form">
            <h2>Add New Product</h2>
            <form action="upload_product.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="electronics">Electronics</option>
                        <option value="clothing">Clothing</option>
                        <option value="accessories">Accessories</option>
                        <option value="home">Home</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock Quantity</label>
                    <input type="number" id="stock" name="stock" required>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <button type="submit" class="submit-btn">Add Product</button>
            </form>
        </div>

        <h2>Orders</h2>
        <table class="orders-table">
            <tr>
                <th>Order ID</th><th>User ID</th><th>Total Price</th><th>Shipping Address</th><th>Payment Method</th><th>Status</th><th>Order Date</th><th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM orders");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['total_price']}</td>
                        <td>{$row['shipping_address']}</td>
                        <td>{$row['payment_method']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['order_date']}</td>
                        <td>
                            <button class='action-btn view' onclick='viewOrder({$row['order_id']})'>View</button>
                            <button class='action-btn edit' onclick='editOrder({$row['order_id']})'>Edit</button>
                            <a href='?delete_order_id={$row['order_id']}' class='action-btn delete'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>

        <h2>Products</h2>
        <table class="products-table">
            <tr>
                <th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Stock</th><th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['stock']}</td>
                        <td>
                            <button class='action-btn view' onclick='viewProduct({$row['id']})'>View</button>
                            <button class='action-btn edit' onclick='editProduct({$row['id']})'>Edit</button>
                            <a href='?delete_product_id={$row['id']}' class='action-btn delete'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>

        <h2>Users</h2>
        <table class="users-table">
            <tr>
                <th>ID</th><th>Username</th><th>Email</th><th>Created At</th><th>Role</th><th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM users");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['created_at']}</td>
                        <td>{$row['role']}</td>
                        <td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='user_id' value='{$row['id']}'>
                                <button type='submit' name='role' value='admin' class='action-btn edit'>Make Admin</button>
                            </form>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='user_id' value='{$row['id']}'>
                                <button type='submit' name='role' value='user' class='action-btn edit'>Make User</button>
                            </form>
                            <button class='action-btn view' onclick='viewUser({$row['id']})'>View</button>
                            <a href='?delete_user_id={$row['id']}' class='action-btn delete'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>

    <script>
        // View functions for each type
        function viewOrder(orderId) {
            // You can implement a modal or a redirect to a detailed page for viewing the order
            alert('View Order: ' + orderId);
        }

        function viewProduct(productId) {
            // You can implement a modal or a redirect to a detailed page for viewing the product
            alert('View Product: ' + productId);
        }

        function viewUser(userId) {
            // You can implement a modal or a redirect to a detailed page for viewing the user
            alert('View User: ' + userId);
        }

        // Edit functions for each type
        function editOrder(orderId) {
            // Redirect to edit page or open a form
            alert('Edit Order: ' + orderId);
        }

        function editProduct(productId) {
            // Redirect to edit page or open a form
            alert('Edit Product: ' + productId);
        }

        function editUser(userId) {
            // Redirect to edit page or open a form
            alert('Edit User: ' + userId);
        }
    </script>

    <script src='../JS/model.js'></script>

    <?php $conn->close(); ?>
</body>
</html>
