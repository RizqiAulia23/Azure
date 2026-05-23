<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = '1'");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $p->product_name ?> - Azure Perfume</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.4">
    <link rel="stylesheet" type="text/css" href="css/detail.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
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
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="profile-icon">
                <img src="img/login_logo.png" alt="Profile">
            </a>
        </div>
    </header>

    <!-- Detail Section -->
    <section class="detail-section">
        <div class="container">
            <div class="breadcrumb">
                <a href="home.php">Home</a> <i class='bx bx-chevron-right'></i> 
                <a href="produk.php">Products</a> <i class='bx bx-chevron-right'></i> 
                <span><?php echo $p->product_name ?></span>
            </div>

            <div class="detail-grid">
                <!-- Left: Product Image -->
                <div class="detail-image">
                    <div class="image-wrapper">
                        <img src="produk/<?php echo $p->product_image ?>" alt="<?php echo $p->product_name ?>">
                    </div>
                </div>

                <!-- Right: Product Info -->
                <div class="detail-info">
                    <span class="category-label">PREMIUM FRAGRANCE</span>
                    <h1><?php echo $p->product_name ?></h1>
                    <div class="price">IDR <?php echo number_format($p->product_price) ?></div>
                    
                    <div class="description">
                        <h3>Description</h3>
                        <p><?php echo $p->product_description ?></p>
                    </div>
                    
                    <div class="product-features">
                        <div class="feature-item">
                            <i class='bx bx-check-shield'></i>
                            <span>100% Original</span>
                        </div>
                        <div class="feature-item">
                            <i class='bx bx-time-five'></i>
                            <span>Long Lasting</span>
                        </div>
                        <div class="feature-item">
                            <i class='bx bx-package'></i>
                            <span>Safe Delivery</span>
                        </div>
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
