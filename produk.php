<?php
    include 'config/db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = '1'");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product - Azure Perfume</title>
    <link rel="icon" type="image/png" href="img/logoweb.png">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.3">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

    <!-- header -->
    <header>
        <div class="header-inner">
            <a href="index.php" class="logo">
                <img src="img/logo.png" alt="Azure Logo">
            </a>
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
            <label for="menu-toggle" class="mobile-menu-btn" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="produk.php" class="active">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="profile-icon">
                <i class='bx bx-user'></i>
                <span>LOGIN</span>
            </a>
        </div>
    </header>
    
    <!-- Hero Section -->
    <?php
        $hero_label = "OUR COLLECTION";
        $hero_title = "Discover Your<br><em style=\"color: #ffffff;\">Signature Scent</em>";
        $hero_desc = "Premium fragrance crafted with the finest ingredients to elevate your every moment";
        $hero_bg = "img/bg_new.jpeg";

        if(isset($_GET['kat'])){
            $id_kat = $_GET['kat'];
            $query_kat = mysqli_query($conn, "SELECT category_name FROM tb_category WHERE category_id = '$id_kat'");
            if(mysqli_num_rows($query_kat) > 0){
                $data_kat = mysqli_fetch_object($query_kat);
                $cat_name = strtolower($data_kat->category_name);

                if(strpos($cat_name, 'floral') !== false){
                    $hero_label = "FLORAL COLLECTION";
                    $hero_title = "Bloom Into Your<br><em style=\"color: #ffffff;\">Signature</em>";
                    $hero_desc = "Delicate floral notes crafted for timeless elegance."; 
                    $hero_bg = "img/bg_new.jpeg"; // unified background
                } elseif(strpos($cat_name, 'woody') !== false){                                     
                    $hero_label = "WOODY COLLECTION";
                    $hero_title = "Crafted for<br><em style=\"color: #ffffff;\">Timeless Strength</em>";
                    $hero_desc = "Warm, rich and sophisticated scents inspired by nature's deepest woods.";
                    $hero_bg = "img/bg_new.jpeg"; // unified background
                } elseif(strpos($cat_name, 'fresh') !== false){
                    $hero_label = "FRESH COLLECTION";
                    $hero_title = "Breath in<br><em style=\"color: #ffffff;\">Pure freshness</em>";
                    $hero_desc = "Clean, crisp, and uplifting scents inspired by nature to refresh your every moment.";
                    $hero_bg = "img/bg_new.jpeg"; // unified background
                } elseif(strpos($cat_name, 'leather') !== false){
                    $hero_label = "LEATHER COLLECTION";
                    $hero_title = "Crafted From<br><em style=\"color: #ffffff;\">Strength and Elegance</em>";
                    $hero_desc = "Luxurious leather notes, artfully blended for a bold, confident, and unforgettable signature.";
                    $hero_bg = "img/bg_new.jpeg"; // unified background
                }
            }
        }
    ?>
    <section class="product-hero" style="background-image: url('<?php echo $hero_bg; ?>');">
        <div class="product-hero-content">
            <span class="label"><?php echo $hero_label; ?></span>
            <h1><?php echo $hero_title; ?></h1>
            <p><?php echo $hero_desc; ?></p>
        </div>
    </section>

   

    <!-- Product Section -->
    <section class="best-seller-section">
        <div class="container">
            <!-- Product Filter -->
            <div class="filter-bar">
                <a href="produk.php" class="filter-button <?php echo !isset($_GET['kat']) ? 'active' : '' ?>">All</a>
                <?php
                    $categories = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($k = mysqli_fetch_array($categories)){
                ?>
                    <a href="produk.php?kat=<?php echo $k['category_id'] ?>" 
                       class="filter-button <?php echo (isset($_GET['kat']) && $_GET['kat'] == $k['category_id']) ? 'active' : '' ?>">
                        <?php echo $k['category_name'] ?>
                    </a>
                <?php } ?>
            </div>

            <!-- Section Header -->
            <div class="section-header" style="margin-bottom: 50px;">
                <?php
                    $section_label = "BEST SELLER";
                    $section_title = "Our Most <span>Loved</span> Scents";

                    if(isset($_GET['kat'])){
                        $id_kat = $_GET['kat'];
                        $query_kat = mysqli_query($conn, "SELECT category_name FROM tb_category WHERE category_id = '$id_kat'");
                        if(mysqli_num_rows($query_kat) > 0){
                            $data_kat = mysqli_fetch_object($query_kat);
                            $cat_name = strtoupper($data_kat->category_name);
                            $section_label = $cat_name . " FAVORITES";

                            $cat_lower = strtolower($data_kat->category_name);
                            if(strpos($cat_lower, 'floral') !== false){
                                $section_title = "Floral Scents <span>We Adore</span>";
                            } elseif(strpos($cat_lower, 'woody') !== false){
                                $section_title = "Rich Scents. <span>Deep Impression.</span>";
                            } elseif(strpos($cat_lower, 'fresh') !== false){
                                $section_title = "Refreshing Scents <span>You'll Love</span>";
                            } elseif(strpos($cat_lower, 'leather') !== false){
                                $section_title = "Bold Scents. <span>Lasting Impression.</span>";
                            } else {
                                $section_title = "Category: <span>" . $data_kat->category_name . "</span>";
                            }
                        }
                    }
                ?>
                <span class="section-label"><?php echo $section_label; ?></span>
                <h2 class="section-title-main"><?php echo $section_title; ?></h2>
            </div>
            
            <div class="best-seller-grid">
                <?php
                    $where = "WHERE product_status = 1";
                    if(isset($_GET['kat'])){
                        $where .= " AND category_id = '".$_GET['kat']."'";
                    }
                    $products = mysqli_query($conn, "SELECT * FROM tb_product $where ORDER BY product_name DESC");
                    if(mysqli_num_rows($products) > 0){
                        while($p = mysqli_fetch_array($products)){
                ?>
                    <a href="detail.php?id=<?php echo $p['product_id'] ?>" class="product-card-v2">
                        <img src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>" class="product-img-v2">
                        <h4><?php echo $p['product_name'] ?></h4>
                        <p><?php echo $p['product_description'] ?></p>
                        <span class="product-price">IDR <?php echo number_format($p['product_price']) ?></span>
                    </a>
                <?php }} else { ?>
                    <p class="empty-message">Produk tidak tersedia di kategori ini.</p>
                <?php } ?>
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
        // AJAX Filtering to maintain scroll position
        document.addEventListener('click', function(e) {
            const button = e.target.closest('.filter-button');
            if (button) {
                e.preventDefault();
                const url = button.getAttribute('href');
                
                // Add loading state (optional)
                const grid = document.querySelector('.best-seller-grid');
                grid.style.opacity = '0.5';
                
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        
                        // Update Filter Buttons Active State
                        document.querySelector('.filter-bar').innerHTML = doc.querySelector('.filter-bar').innerHTML;
                        
                        // Update Hero Banner
                        const oldHero = document.querySelector('.product-hero');
                        const newHero = doc.querySelector('.product-hero');
                        oldHero.style.backgroundImage = newHero.style.backgroundImage;
                        document.querySelector('.product-hero-content').innerHTML = doc.querySelector('.product-hero-content').innerHTML;

                        // Update Section Title
                        document.querySelector('.section-title-main').innerHTML = doc.querySelector('.section-title-main').innerHTML;
                        
                        // Update Product Grid
                        grid.innerHTML = doc.querySelector('.best-seller-grid').innerHTML;
                        grid.style.opacity = '1';
                        
                        // Update URL without jumping
                        history.pushState(null, '', url);
                    })
                    .catch(err => {
                        console.error('Error loading products:', err);
                        window.location.href = url; // Fallback to normal navigation
                    });
            }
        });

        // Handle Back/Forward buttons
        window.addEventListener('popstate', function() {
            window.location.reload();
        });

        // Mencegah halaman melompat ke atas saat klik link dengan href javascript:void(0)
        document.querySelectorAll('a[href^="javascript:void(0)"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>
</html>
