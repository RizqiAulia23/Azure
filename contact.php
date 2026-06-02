<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = '1'");
    $a = mysqli_fetch_object($kontak);

    $success_msg = "";
    if(isset($_POST['submit'])){
        $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

        // Menyesuaikan dengan nama tabel dan kolom di database Anda
        $insert = mysqli_query($conn, "INSERT INTO tb_masseges (massege_name, massege_email, massege_teks) VALUES (
            '$nama', 
            '$email', 
            '$pesan')");

        if($insert){
            $success_msg = "pesan berhasil di kirim";
        } else {
            echo 'gagal '.mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Azure Perfume</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.3">
    <link rel="stylesheet" type="text/css" href="css/contact.css?v=1.3">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="produk.php">Product</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="profile-icon">
                <img src="img/login_logo.png" alt="Profile">
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <span class="label">CONTACT US</span>
            <h1>We'd Love to <br><em>Hear From You</em></h1>
            <p>Have questions about our fragrance, orders, or collaborations? We’re here to assist you and make your experience with AZURE even more special.</p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="contact-main">
        <div class="contact-container">
            <!-- Left Column: Contact Info -->
            <div class="contact-info-side">
                <div class="contact-info-card">
                    <span class="label">LET'S STAY CONNECTED</span>
                    <h2>Here's How You <br>Can Reach Us</h2>
                    
                    <div class="contact-methods">
                        <div class="contact-item">
                            <i class='bx bx-map-pin'></i>
                            <div class="contact-item-text">
                                <h4>Location</h4>
                                <p><?php echo $a->admin_address ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class='bx bx-phone'></i>
                            <div class="contact-item-text">
                                <h4>Phone</h4>
                                <p><?php echo $a->admin_telp ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class='bx bx-envelope'></i>
                            <div class="contact-item-text">
                                <h4>Email</h4>
                                <p><?php echo $a->admin_email ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class='bx bxl-whatsapp'></i>
                            <div class="contact-item-text">
                                <h4>WhatsApp</h4>
                                <p><?php echo $a->admin_telp ?></p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p>Follow Us</p>
                        <div class="contact-socials">
                    <a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a>
                    <a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.youtube.com/"><i class='bx bxl-youtube'></i></a>   
                        </div>
                    </div>
                </div>

                <div class="mini-map-card">
                    <i class='bx bxs-map'></i>
                    <h4>AZURE PERFUME</h4>
                    <p><?php echo $a->admin_address ?></p>
                    <a href="https://share.google" class="btn-google-maps">View on Google Maps <i class='bx bx-export'></i></a>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="contact-form-side">
                <div class="contact-form-card">
                    <span class="label">FRAGRANCE INQUIRY</span>
                    <h2>Tell Us What You Need</h2>
                    <span class="subtitle">We'll Make it Personal</span>
                    <p class="desc">Whether you need help choosing the perfect scent, have a special request, or want to collaborate with us, we're excited to hear from you.</p>

                    <?php if($success_msg): ?>
                        <div class="alert-success">
                            <i class='bx bx-check-circle'></i>
                            <span><?php echo $success_msg; ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <i class='bx bx-user'></i>
                            <input type="text" name="nama" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <i class='bx bx-envelope'></i>
                            <input type="email" name="email" placeholder="Email address" required>
                        </div>
                        <div class="form-group">
                            <i class='bx bx-pencil'></i>
                            <textarea name="pesan" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn-send">Send Your Message</button>
                    </form>

                    <div class="privacy-note">
                        <i class='bx bx-shield-check'></i>
                        <p>We respect your privacy. Your information will not be shared with anyone.</p>
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
                    <li><i class='bx bx-phone'></i> <?php echo $a->admin_telp ?><a href="https://wa.me/628934826191" target="_blank"></a></li>
                    <li><i class='bx bx-envelope'></i> <?php echo $a->admin_email ?><a href="mailto:aulnpc@gmail.com" target="_blank"><?php echo $a->admin_email ?></a></li>
                    <li><i class='bx bx-map'></i> <?php echo $a->admin_address ?><a href="https://share.google" target="_blank"></a></li>
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
        // AJAX Form Submission to maintain scroll position
        document.addEventListener('submit', function(e) {
            if (e.target.tagName === 'FORM') {
                e.preventDefault();
                const form = e.target;
                
                const btn = form.querySelector('.btn-send');
                if (!btn) return;

                const originalBtnText = btn.innerText;
                btn.innerText = 'Sending...';
                btn.disabled = true;

                const formData = new FormData(form);
                formData.append('submit', '1');

                fetch('contact.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newFormCard = doc.querySelector('.contact-form-card');
                    
                    if (newFormCard) {
                        document.querySelector('.contact-form-side').innerHTML = newFormCard.outerHTML;
                    }
                })
                .catch(err => {
                    console.error('Error submitting form:', err);
                    form.submit(); // Fallback to normal submission
                });
            }
        });
    </script>
</body>
</html>