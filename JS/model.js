// Function to open the modal and load the content
function openModal(type, id) {
    const modal = document.getElementById("popupModal");
    const modalTitle = document.getElementById("modalTitle");
    const modalBody = document.getElementById("modalBody");

    // Set the modal title based on the type (order, product, user)
    if (type === "order") {
        modalTitle.innerHTML = "Order Details";
        // Fetch and display order details based on the id
        fetchOrderDetails(id, modalBody);
    } else if (type === "product") {
        modalTitle.innerHTML = "Product Details";
        // Fetch and display product details based on the id
        fetchProductDetails(id, modalBody);
    } else if (type === "user") {
        modalTitle.innerHTML = "User Details";
        // Fetch and display user details based on the id
        fetchUserDetails(id, modalBody);
    }

    modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
    const modal = document.getElementById("popupModal");
    modal.style.display = "none";
}

// Fetch order details from the server
function fetchOrderDetails(orderId, modalBody) {
    fetch(`get_order_details.php?id=${orderId}`)
        .then(response => response.json())
        .then(data => {
            modalBody.innerHTML = `
                <p>Order ID: ${data.order_id}</p>
                <p>User ID: ${data.user_id}</p>
                <p>Total Price: ${data.total_price}</p>
                <p>Shipping Address: ${data.shipping_address}</p>
                <p>Payment Method: ${data.payment_method}</p>
                <p>Status: ${data.status}</p>
                <p>Order Date: ${data.order_date}</p>
            `;
        })
        .catch(error => console.error('Error:', error));
}

// Fetch product details from the server
function fetchProductDetails(productId, modalBody) {
    fetch(`get_product_details.php?id=${productId}`)
        .then(response => response.json())
        .then(data => {
            modalBody.innerHTML = `
                <p>Product ID: ${data.id}</p>
                <p>Name: ${data.name}</p>
                <p>Description: ${data.description}</p>
                <p>Price: ${data.price}</p>
                <p>Category: ${data.category}</p>
                <p>Stock: ${data.stock}</p>
            `;
        })
        .catch(error => console.error('Error:', error));
}

// Fetch user details from the server
function fetchUserDetails(userId, modalBody) {
    fetch(`get_user_details.php?id=${userId}`)
        .then(response => response.json())
        .then(data => {
            modalBody.innerHTML = `
                <p>User ID: ${data.id}</p>
                <p>Username: ${data.username}</p>
                <p>Email: ${data.email}</p>
                <p>Created At: ${data.created_at}</p>
            `;
        })
        .catch(error => console.error('Error:', error));
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById("popupModal");
    if (event.target === modal) {
        closeModal();
    }
}
