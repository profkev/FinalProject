<?php
$host = 'localhost'; // or your host
$dbName = 'g2f_connect';
$username = 'root'; // your database username
$password = ''; // your database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, price, description, image_url FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="market.css">
    <script src="marketplace.js" defer></script>
</head>
<body>
    <nav class="navbar">
        <h1 class="logo">Farmer's Marketplace</h1>
        <div class="cart-view">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart cart-icon" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
    </svg>
    <span id="cartCount">0</span>
</div>

    </nav>
    <div class="products-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="product-image">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p class="price"><?php echo htmlspecialchars($row['price']); ?></p>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <button class="btn-description">Description</button>
                    <button class="btn-add-to-cart" data-name="<?php echo htmlspecialchars($row['name']); ?>" data-price="<?php echo htmlspecialchars($row['price']); ?>">Add to Cart</button>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found</p>
        <?php endif; ?>
    </div>
    <!-- Existing HTML structure -->

    <div class="cart-sidebar" id="cartSidebar">
    <h2>Cart Items</h2>
    <div id="cartItems">
        <!-- Cart items will be dynamically inserted here -->
    </div>
    <div id="totalPrice">
        <!-- Total price will be dynamically updated here -->
    </div>
    <button onclick="closeCart()">Close Cart</button>
    <button id="checkoutButton">Checkout</button>
</div>

<!-- Continue with the rest of your HTML structure -->

</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
    let cart = {};

    function addToCart(productName, productPrice) {
        if (cart[productName]) {
            cart[productName].qty += 1;
        } else {
            cart[productName] = {price: parseFloat(productPrice), qty: 1};
        }
        updateCartDisplay();
    }

    function updateCartCount() {
        let totalCount = 0;
        for (let product in cart) {
            totalCount += cart[product].qty;
        }
        document.getElementById('cartCount').innerText = totalCount;
    }

    function updateCartDisplay() {
        updateCartCount();
        displayCartItems();
        displayTotalPrice();
    }

    function displayCartItems() {
        const cartItemsContainer = document.getElementById('cartItems');
        cartItemsContainer.innerHTML = ''; // Clear existing items
        for (let [productName, productDetails] of Object.entries(cart)) {
            const itemElement = document.createElement('div');
            itemElement.innerText = `${productName} - Quantity: ${productDetails.qty} Price: ${productDetails.price * productDetails.qty}`;
            const removeButton = document.createElement('button');
            removeButton.innerText = 'Remove';
            removeButton.onclick = function() { removeItem(productName); };
            itemElement.appendChild(removeButton);
            cartItemsContainer.appendChild(itemElement);
        }
    }

    function displayTotalPrice() {
        let total = 0;
        for (let product in cart) {
            total += cart[product].qty * cart[product].price;
        }
        const totalPriceElement = document.getElementById('totalPrice');
        totalPriceElement.innerText = `Total Price: ${total.toFixed(2)}`;
    }

    function removeItem(productName) {
        delete cart[productName];
        updateCartDisplay();
    }

    document.querySelectorAll('.btn-add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productName = button.getAttribute('data-name');
            const productPrice = button.getAttribute('data-price');
            addToCart(productName, productPrice);
        });
    });

    document.querySelector('.cart-view').addEventListener('click', () => {
        document.getElementById('cartSidebar').classList.add('open');
    });
});

function closeCart() {
    document.getElementById('cartSidebar').classList.remove('open');
}
</script>

</html>
