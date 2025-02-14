<?php
require_once('../Connection/conn.php');

// Get the selected category from the GET request, if any
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch distinct categories from the database to populate the dropdown
$stmt = $pdo->query("SELECT DISTINCT category FROM products");
$categories = $stmt->fetchAll();

// Build the SQL query
$sql = "SELECT * FROM products";

// If a category is selected, modify the query to filter by category
if ($category) {
    $sql .= " WHERE category = ?";
}

// Prepare and execute the query
$stmt = $pdo->prepare($sql);

// If a category is selected, bind the category parameter
if ($category) {
    $stmt->execute([$category]);
} else {
    $stmt->execute();
}

// Fetch the products
$products = $stmt->fetchAll();
?>

<?php include('../includes/header.php'); ?>
<head>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<!-- Category Selection Form -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
    <label for="category">Select Category:</label>
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">All Categories</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?php echo htmlspecialchars($cat['category']); ?>"
                <?php if ($category == $cat['category']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($cat['category']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<!-- Display Products -->
<div class="product-list">
    <?php if ($products): ?>
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="../Image/Gabayaa.webp" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                <a href="../pages/product-detail.php?id=<?php echo $product['id']; ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No products found in this category.</p>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
