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
            <a href="home.php" class="logo">
                <img src="img/logo.png" alt="Azure Logo">
            </a>   
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="produk.php" class="active">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="profile-icon">
                <img src="img/login_logo.png" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
            </a>
        </div>
    </header>
    
    <!-- Hero Banner -->
    <div class="hero-banner">
        <img src="img/slider1.png" alt="Azure store banner">
    </div>

    <!-- Product Filter Section -->
    <section class="product-filter-section">
        <span class="section-label">OUR COLLECTION</span>
        <h2 class="section-title-main">Our Most Loved Scents</h2>
        <div class="filter-bar">
            <button class="filter-button active">All</button>
            <button class="filter-button">Floral</button>
            <button class="filter-button">Woody</button>
            <button class="filter-button">Fresh</button>
            <button class="filter-button">Leather</button>
        </div>
    </section>

    <!-- Product Grid Section -->
    <section class="best-seller-section">
        <span class="section-label">OUR PRODUCTS</span>
        <h2 class="section-title-main">Find your signature scent</h2>
        
        <div class="best-seller-grid">
            <?php
                $products = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_name ASC");
                if(mysqli_num_rows($products) > 0){
                    while($p = mysqli_fetch_array($products)){
            ?>
                <a href="data_produk.php?id=<?php echo $p['product_id'] ?>" class="product-card-v2">
                    <img src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>" class="product-img-v2">
                    <h4><?php echo $p['product_name'] ?></h4>
                    <p><?php echo $p['product_description'] ?></p>
                    <span class="product-price">IDR <?php echo number_format($p['product_price']) ?></span>
                </a>
            <?php }} else { ?>
                <p class="empty-message">Produk tidak tersedia saat ini.</p>
            <?php } ?>
        </div>
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

</body>
</html>