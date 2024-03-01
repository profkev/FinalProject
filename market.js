document.addEventListener('DOMContentLoaded', () => {
    // Simulate a cart with a simple object
    let cart = {};

    // Function to add an item to the cart
    function addToCart(productName, productPrice) {
        if (cart[productName]) {
            cart[productName].qty += 1;
        } else {
            cart[productName] = {price: productPrice, qty: 1};
        }
        updateCartCount();
    }

    // Function to update the displayed cart count
    function updateCartCount() {
        let totalCount = 0;
        for (let product in cart) {
            totalCount += cart[product].qty;
        }
        document.getElementById('cartCount').innerText = totalCount;
    }

    // Add event listeners to "Add to Cart" buttons
    document.querySelectorAll('.btn-add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productName = button.getAttribute('data-name');
            const productPrice = button.getAttribute('data-price');
            addToCart(productName, productPrice);
        });
    });
});
