<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = '1'");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Azure Perfume</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.3">
    <link rel="stylesheet" type="text/css" href="css/about.css?v=1.3">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

    <!-- header -->
    <header>
        <div class="header-inner">
            <a href="home.php" class="logo">
                <img src="img/logo.png" alt="Azure Logo">
            </a>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php" class="active">About Us</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="profile-icon">
                <img src="img/login_logo.png" alt="Profile">
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-text">
            <h2>The Essence of Elegance in Every Scent</h2>
            <hr>
            <p>AZURE PERFUME is more than a fragrance. it's a story, a memory, and a statment. We blend the finest ingredients from around the world to create timeless scents that define who you are.</p>
        </div>
        <div class="about-hero-img"></div>
    </section>

    <!-- Features Section -->
    <section class="about-features">
        <div class="features-flex">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class='bx bx-leaf'></i>
                </div>
                <h4>Premium Ingredients</h4>
                <p>We source the finest natural ingredients for exceptional quality.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class='bx bx-time-five'></i>
                </div>
                <h4>Long Lasting</h4>
                <p>Our fragrances are crafted to last, leaving a lasting impression.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class='bx bx-spray-can'></i>
                </div>
                <h4>Elegant Design</h4>
                <p>Minimalist, timeless, and refined - designed to reflect luxury.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class='bx bx-check-shield'></i>
                </div>
                <h4>Trusted Quality</h4>
                <p>Every bottle represents our commitment to excellence.</p>
            </div>
        </div>
    </section>

    <!-- Story and Stats Section -->
    <section class="about-story-stats">
        <div class="story-stats-flex">
            <div class="story-text">
                <span class="small-title">ABOUT US</span>
                <h2>Crafted with Passion, <br>Inspired by Nature</h2>
                <hr>
                <p>Founded in 2024, AZURE PERFUME was born from a passion for fine fragrances and a belief that scent has the power to inspire, uplift, and reveal the truest version of yourself. Every creation is a harmony of art and nature, handcrafted with care and dedication.</p>
            </div>
            <div class="stats-list">
                <div class="stat-item">
                    <i class='bx bx-calendar'></i>
                    <div class="stat-item-text">
                        <h3>2024</h3>
                        <p>Year Established</p>
                    </div>
                </div>
                <div class="stat-item">
                    <i class='bx bx-spray-can'></i>
                    <div class="stat-item-text">
                        <h3>25+</h3>
                        <p>Unique Fragrances</p>
                    </div>
                </div>
                <div class="stat-item">
                    <i class='bx bx-group'></i>
                    <div class="stat-item-text">
                        <h3>10K+</h3>
                        <p>Happy Customers</p>
                    </div>
                </div>
                <div class="stat-item">
                    <i class='bx bx-globe'></i>
                    <div class="stat-item-text">
                        <h3>5+</h3>
                        <p>Countries Reached</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="main-footer">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="img/logo.png" alt="Azure Logo">
                </div>
                <p>Timeless scents crafted with passion and precision for every moment of your life.</p>
                <div class="social-icons">
                    <a href="javascript:void(0)"><i class='bx bxl-instagram'></i></a>
                    <a href="javascript:void(0)"><i class='bx bxl-twitter'></i></a>
                    <a href="javascript:void(0)"><i class='bx bxl-facebook'></i></a>
                    <a href="javascript:void(0)"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Menu</h4>
                <ul class="footer-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Customer Care</h4>
                <ul class="footer-links">
                    <li><a href="javascript:void(0)">Shipping & Delivery</a></li>
                    <li><a href="javascript:void(0)">Returns & Exchanges</a></li>
                    <li><a href="javascript:void(0)">FAQs</a></li>
                    <li><a href="javascript:void(0)">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul class="footer-links">
                    <li><i class='bx bx-phone'></i> <?php echo $a->admin_telp ?></li>
                    <li><i class='bx bx-envelope'></i> <?php echo $a->admin_email ?></li>
                    <li><i class='bx bx-map'></i> <?php echo $a->admin_address ?></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2026 AZURE. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>