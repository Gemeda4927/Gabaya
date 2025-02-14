<?php
session_start();

function addToCart($productId) {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $cart[] = $productId;
    $_SESSION['cart'] = $cart;
}

function getCartTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $productId) {
        $total += 25; // Assume price is $25 for all products
    }
    return $total;
}
?>
