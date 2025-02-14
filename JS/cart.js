// JavaScript to manage cart functionalities like add/remove items

function addToCart(productId) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Product added to cart!');
}

function getCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    return cart.length;
}
