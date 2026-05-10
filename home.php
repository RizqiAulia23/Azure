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
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
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
        
        <a href="produk.php" class="btn-explore">EXPLORE</a>
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
                <a href="data_produk.php?id=<?php echo $p['product_id'] ?>" class="product-card-v2">
                    <img src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>" class="product-img-v2">
                    <h4><?php echo $p['product_name'] ?></h4>
                    <p><?php echo $p['product_description'] ?></p>
                </a>
            <?php }} ?>
        </div>
        
        <a href="produk.php" class="btn-view-all">VIEW ALL PRODUCT</a>
    </section>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>
            
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            
            <h4>No. Hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            
            <small>Copyright &copy; 2026 - Azure store.</small>
        </div>
    </div>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        let slideInterval;

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            slideIndex = (n + slides.length) % slides.length;
            
            slides[slideIndex].classList.add('active');
            dots[slideIndex].classList.add('active');
        }

        function moveSlide(step) {
            showSlide(slideIndex + step);
            resetInterval();
        }

        function currentSlide(n) {
            showSlide(n);
            resetInterval();
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(() => moveSlide(1), 5000);
        }

        // Initialize slider
        resetInterval();
    </script>
</body>
</html>