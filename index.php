<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = '1'");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Azure store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

    <!-- header -->
    <header>
        <div class="header-inner">
            <a href="index.php" class="logo">
                <img src="img/logo.png" alt="Azure Logo">
            </a>   
            <nav>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="profile-icon">
                <img src="img/login_logo.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
            </a>
        </div>
    </header>
    
    <!-- Hero Slider -->
    <div class="hero-slider">
        <div class="slider-container">
            <!-- Slide 1 -->
            <div class="slide active" style="background-image: url('img/slider1.png');">
                <div class="slide-content">
                    <span class="subtitle">DISCOVER YOUR ESSENCE</span>
                    <h2>Elevate Your<br>Signature Scent</h2>
                    <p>Crafted with premium ingredients,<br>made to leave a lasting impression</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="slide" style="background-image: url('img/slider2.png');">
                <div class="slide-content">
                    <span class="subtitle">A SCENT THAT STAYS</span>
                    <h2>Create Memories<br>That Last Forever</h2>
                    <p>More than a fragrance, it's an<br>unforgettable part of your story.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="slide" style="background-image: url('img/slider3.png');">
                <div class="slide-content">
                    <span class="subtitle">EXPLORE THE COLLECTION</span>
                    <h2>Find The Fragrance<br>That Defines You</h2>
                    <p>From floral to woody, discover scents<br>crafted for every mood, moment, and personality.</p>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="slider-arrow prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="slider-arrow next" onclick="moveSlide(1)">&#10095;</button>

        <!-- Pagination Dots -->
        <div class="slider-dots">
            <span class="dot active" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </div>

    <!-- Category Section -->
    <section class="category-section">
        <span class="section-label">CATEGORY</span>
        <h2 class="section-title-main">Explore Our Fragrance</h2>
        
        <div class="category-flex">
            <div class="category-item">
                <div class="category-icon-wrapper">
                    <img src="img/floral.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <h3>FLORAL</h3>
                <p>Soft, romantic, and timeless scents inspired by nature.</p>
            </div>
            <div class="category-item">
                <div class="category-icon-wrapper">
                    <img src="img/woody.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <h3>WOODY</h3>
                <p>Warm, rich, and sophisticated aromas for a confident you.</p>
            </div>
            <div class="category-item">
                <div class="category-icon-wrapper">
                    <img src="img/fresh.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <h3>FRESH</h3>
                <p>Clean, airy, and energizing scents for everyday vibes.</p>
            </div>
            <div class="category-item">
                <div class="category-icon-wrapper">
                   <img src="img/leather.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <h3>LEATHER</h3>
                <p>Rich and bold scent with a luxurious touch.</p>
            </div>
        </div>
        
        
    </section>

    <!-- Best Seller Section -->
    <section class="best-seller-section">
        <span class="section-label">OUR PRODUCTS</span>
        <h2 class="section-title-main">Best Seller</h2>
        
        <div class="best-seller-grid">
            <?php
                // Fetching top 4 products for best seller
                $best_seller = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 4");
                if(mysqli_num_rows($best_seller) > 0){
                    while($p = mysqli_fetch_array($best_seller)){
            ?>
               <a href="detail.php?id=<?php echo $p['product_id'] ?>" class="product-card-v2">

        <img src="produk/<?php echo $p['product_image'] ?>" 
         alt="<?php echo $p['product_name'] ?>" 
         class="product-img-v2">

            <h4><?php echo $p['product_name'] ?></h4>

             <p><?php echo $p['product_description'] ?></p>

         <span class="product-price">
        IDR <?php echo number_format($p['product_price']) ?>
        </span>

</a>
            <?php }} ?>
        </div>
        
        <a href="produk.php" class="btn-view-all">VIEW ALL PRODUCT</a>
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
                    <a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a>
                    <a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.youtube.com/"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Menu</h4>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Customer Care</h4>
                <ul class="footer-links">
                    <li><a href="contact.php">Shipping & Delivery</a></li>
                    <li><a href="contact.php">Returns & Exchanges</a></li>
                    <li><a href="contact.php">FAQs</a></li>
                    <li><a href="contact.php">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul class="footer-links">
                    <li>
                        <a href="https://wa.me/6285934826191" target="_blank">
                            <i class='bx bx-phone'></i> <?php echo $a->admin_telp ?>
                        </a>
                    </li>

                    <li>
                        <a href="mailto:<?php echo $a->admin_email ?>">
                            <i class='bx bx-envelope'></i> <?php echo $a->admin_email ?>
                        </a>
                    </li>

                    <li>
                        <a href="https://maps.google.com/?q=<?php echo urlencode($a->admin_address); ?>" target="_blank">
                            <i class='bx bx-map'></i> <?php echo $a->admin_address ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2026 AZURE. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            slideIndex = (n + slides.length) % slides.length;
            
            slides[slideIndex].classList.add('active');
            dots[slideIndex].classList.add('active');
        }

        function moveSlide(step) {
            showSlide(slideIndex + step);
        }

        function currentSlide(n) {
            showSlide(n);
        }

        // Initialize slider on page load
        showSlide(slideIndex);

        // Mencegah halaman melompat ke atas saat klik link dengan href javascript:void(0)
        document.querySelectorAll('a[href^="javascript:void(0)"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>
</html>