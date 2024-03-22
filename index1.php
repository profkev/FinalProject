<?php
// Start session
session_start();

// Check if username session variable is set
if (isset($_SESSION['username'])) {
    // User is logged in, display user-specific content
    $username = $_SESSION['username'];
} else {
    // User is not logged in, redirect to login page
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="landing.css">
    <title>G2F Connect - Farmers' Hub</title>
</head>
<body>
    <header>
        <nav class="nav">
            <div class="logo">
                <a href="index.html"><h1>G2F Connect</h1></a>
            </div>
            <button class="navbar-toggle" aria-label="Toggle navigation">Menu</button>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
               
                <li><a href="index.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero section with swiper -->
    <section class="hero">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./indeximages/image2.jpg" alt="Slider Image 1">
                </div>
                <div class="swiper-slide">
                    <img src="./indeximages/image5.jpg" alt="Slider Image 2">
                </div>
                <div class="swiper-slide">
                    <img src="./indeximages/image1.jpg" alt="Slider Image 1">
                </div>
                <div class="swiper-slide">
                    <img src="./indeximages/image5.jpg" alt="Slider Image 1">
                </div>
                <!-- Add more slides as needed -->
            </div>
        </div>
    </section>

    <!-- About section -->
    <section id="about" class="about-section">
        <div class="container">
            <h2>Welcome, <?php echo $username; ?></h2>
            <p>G2F Connect empowers farmers by bridging the gap between traditional agriculture and the digital marketplace. Through our innovative platform, farmers gain access to vital resources, expert advice, and a community committed to sustainable agriculture.</p>
            <p>Join us in our mission to revolutionize farming practices, ensuring profitability and sustainability for farmers worldwide.</p>
        </div>
    </section>

    <!-- Services section with cards -->
    <section id="services" class="services-section">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-row">
                <div class="service-card">
                    <a href="marketplace.php" class="service-card-link">
                        <img src="./indeximages/marketplace.avif" alt="Marketplace Access">
                    </a>
                    <a href="marketplace.php" class="service-card-link">
                        <h3>Marketplace</h3>
                    </a>
                    <p>Connect directly with buyers and sellers in the agricultural market to trade produce and supplies efficiently.</p>
                </div>
                <div class="service-card">
                    <a href="subsidizedmarket.php" class="service-card-link">
                        <img src="./indeximages/subsidised.avif" alt="Subsidized">
                    </a>
                    <a href="subsidizedmarket.php" class="service-card-link">
                        <h3>Subsidized Products</h3>
                    </a>
                    <p>Gain access to government-subsidized seeds, fertilizers, and equipment to lower production costs.</p>
                </div>
            </div>
            <div class="service-row">
                <div class="service-card">
                <a href="support.php" class="service-card-link">
                     
                        <img src="./indeximages/support.avif" alt="Expert Advisory">
                    </a>   
                    <a href="support.php" class="service-card-link">
                    <h3>Expert Advisory</h3>
</a>
                    <p>Receive tailored advice from agriculture experts to optimize crop yields and farming practices.</p>
                </div>
                <div class="service-card">
                <a href="weather.html" class="service-card-link"> 
                <img src="./indeximages/weather2.avif" alt="Weather Updates">
</a>
                <a href="weather.html" class="service-card-link"> 
                    <h3>Weather Updates</h3>
</a>
                    <p>Stay informed with real-time weather forecasts to make timely decisions about your farming activities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2>Get in Touch</h2>
            <p>We're here to help and answer any question you might have. We look forward to hearing from you.</p>
            <a href="contact.html" class="btn">Contact Form</a>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 G2F Connect. Empowering Farmers. Enhancing Futures.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="landing.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select the toggle button and the nav-links list
            const toggleButton = document.querySelector('.navbar-toggle');
            const navLinks = document.querySelector('.nav-links');

            // Add an event listener for click events on the toggle button
            toggleButton.addEventListener('click', function () {
                // Toggle the 'active' class on the nav-links list
                navLinks.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
