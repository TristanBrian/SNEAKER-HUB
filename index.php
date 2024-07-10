<?php
session_start ();
if (!isset ($_SESSION {"user"})){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Industry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="#" class="brand">SNEAKER HUB</a>
            <ul>
                <li><a href="#">Men</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Sale</a></li>
                <li><a href="logout.php" class="logout">Logout</a></li>
            </ul>
            <div class="cart">
                
            </div>
        </nav>
    </header>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>WELCOME TO OUR DASHBOARD</h1>
                <p>Discover the latest price reductions on sneakers and sports shoes</p>
                <button>See all discounts</button>
            </div>
        </section>
        <section class="products">
            <div class="product-grid">
                <div class="product">
                    <img src="blue.jfif" alt="Blue Sneaker">
                    <div class="product-info">
                        <h2>Red Nike Jordan Max</h2>
                        <p>Air Jordan 1's Mid Black and White</p>
                        <div class="price">
                            <span class="old-price">2500 KSH</span>
                            <span class="new-price">2000 KSH</span>
                        </div>
                        <button>Add to Cart</button>
                    </div>
                </div>
                <div class="product">
                    <img src="black.jfif" alt="Black Sneaker">
                    <div class="product-info">
                        <h2>Black Nike Air Force 1</h2>
                        <p>Air Force 1's Low Black and White</p>
                        <div class="price">
                            <span class="old-price">2200 KSH</span>
                            <span class="new-price">1800 KSH</span>
                        </div>
                        <button>Add to Cart</button>
                    </div>
                </div>
                <!-- Add more products here -->
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Sneaker Hub</p>
    </footer>
</body>
</html>