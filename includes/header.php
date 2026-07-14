<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'config/db.php';
include_once 'config/helper.php';

// Fetch admin contact details for global use
$header_kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address, admin_name FROM tb_admin WHERE admin_id = '1'");
$a = mysqli_fetch_object($header_kontak);

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($page_title) ? $page_title : 'Azure Perfume | Premium Fragrance'; ?></title>
    <link rel="icon" type="image/png" href="img/logoweb.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Inter:wght@300;400;500;600;700;800&family=Cinzel:wght@400;500;600;700;800;900&family=Montserrat:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Boxicons & FontAwesome -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        luxury: {
                            navy: '#1A56DB',
                            navyDark: '#0F2942',
                            navyLight: '#F1F5F9',
                            gold: '#B38F4F',
                            goldBright: '#D4AF37',
                            goldDark: '#8C6D34',
                            black: '#F8FAFC',
                            cream: '#FFFFFF',
                        }
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Cinzel', 'serif'],
                        sans: ['Inter', 'Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Custom Style Sheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css?v=2.0">
    
    <!-- Alpine.js for interactive elements -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-luxury-black text-slate-800 font-sans selection:bg-luxury-gold selection:text-white" x-data="cartSystem">

    <!-- Header Navigation -->
    <header class="fixed top-0 left-0 w-full z-50 transition-all duration-300 glass-nav" id="mainHeader">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="index.php" class="flex items-center gap-2 group">
                        <img src="img/logo.png" alt="Azure Logo" class="h-10 w-auto filter brightness-90 group-hover:scale-105 transition-transform duration-300">
                    </a>
                </div>
                
                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex space-x-8 lg:space-x-10">
                    <a href="index.php" class="relative py-2 text-sm font-medium tracking-widest uppercase transition-colors duration-300 <?php echo $current_page == 'index.php' ? 'text-luxury-navy font-semibold' : 'text-slate-600 hover:text-luxury-navy'; ?>">
                        Home
                        <?php if($current_page == 'index.php'): ?>
                            <span class="absolute bottom-0 left-0 w-full h-[2px] bg-luxury-navy"></span>
                        <?php endif; ?>
                    </a>
                    <a href="produk.php" class="relative py-2 text-sm font-medium tracking-widest uppercase transition-colors duration-300 <?php echo $current_page == 'produk.php' ? 'text-luxury-navy font-semibold' : 'text-slate-600 hover:text-luxury-navy'; ?>">
                        Shop
                        <?php if($current_page == 'produk.php'): ?>
                            <span class="absolute bottom-0 left-0 w-full h-[2px] bg-luxury-navy"></span>
                        <?php endif; ?>
                    </a>
                    <a href="about.php" class="relative py-2 text-sm font-medium tracking-widest uppercase transition-colors duration-300 <?php echo $current_page == 'about.php' ? 'text-luxury-navy font-semibold' : 'text-slate-600 hover:text-luxury-navy'; ?>">
                        About
                        <?php if($current_page == 'about.php'): ?>
                            <span class="absolute bottom-0 left-0 w-full h-[2px] bg-luxury-navy"></span>
                        <?php endif; ?>
                    </a>
                    <a href="contact.php" class="relative py-2 text-sm font-medium tracking-widest uppercase transition-colors duration-300 <?php echo $current_page == 'contact.php' ? 'text-luxury-navy font-semibold' : 'text-slate-600 hover:text-luxury-navy'; ?>">
                        Contact
                        <?php if($current_page == 'contact.php'): ?>
                            <span class="absolute bottom-0 left-0 w-full h-[2px] bg-luxury-navy"></span>
                        <?php endif; ?>
                    </a>
                </nav>
                
                <!-- Utilities Menu -->
                <div class="flex items-center gap-4 sm:gap-6">
                    
                    <!-- Cart Toggle Button -->
                    <button @click="openCartDrawer = true" class="relative p-2 text-slate-600 hover:text-luxury-gold transition-colors duration-300" aria-label="Open Cart">
                        <i class="bx bx-shopping-bag text-2xl"></i>
                        <span x-show="cartItemsCount() > 0" x-text="cartItemsCount()" class="absolute -top-1 -right-1 bg-luxury-gold text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border border-white shadow-lg" x-cloak></span>
                    </button>
                    
                    <!-- Account Icon -->
                    <?php if(isset($_SESSION['status_login']) && $_SESSION['status_login'] == true): ?>
                        <div class="relative" x-data="{ openProfile: false }">
                            <button @click="openProfile = !openProfile" class="flex items-center gap-2 py-2 px-3 rounded-full bg-luxury-navyLight border border-luxury-gold/20 hover:border-luxury-gold/50 transition-colors duration-300">
                                <i class="bx bx-user-circle text-xl text-luxury-navy"></i>
                                <span class="text-xs font-semibold tracking-wider text-slate-700 hidden sm:inline">DASHBOARD</span>
                                <i class="bx bx-chevron-down text-xs text-slate-500"></i>
                            </button>
                            <!-- Dropdown Menu -->
                            <div x-show="openProfile" @click.away="openProfile = false" class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-md shadow-xl z-50 py-1" x-cloak>
                                <?php if($_SESSION['level'] == 'admin'): ?>
                                    <a href="admin/dashbord.php" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-luxury-navy"><i class="bx bx-grid-alt mr-2"></i> Admin Panel</a>
                                <?php endif; ?>
                                <a href="logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-slate-100 hover:text-red-500"><i class="bx bx-log-out mr-2"></i> Logout</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-xs font-bold tracking-widest uppercase bg-gradient-to-r from-luxury-goldDark to-luxury-goldBright text-white shadow-md hover:shadow-luxury-gold/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                            LOGIN
                        </a>
                    <?php endif; ?>

                    <!-- Mobile Menu Button -->
                    <button @click="openMobileMenu = !openMobileMenu" class="md:hidden p-2 text-slate-600 hover:text-luxury-navy focus:outline-none" aria-label="Toggle Mobile Menu">
                        <i class="bx text-2xl" :class="openMobileMenu ? 'bx-x' : 'bx-menu'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="md:hidden border-t border-slate-200 bg-white/95 backdrop-blur-xl px-4 pt-4 pb-6 space-y-3" x-cloak>
            <a href="index.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo $current_page == 'index.php' ? 'text-luxury-navy bg-luxury-navyLight' : 'text-slate-600 hover:text-luxury-navy hover:bg-luxury-navyLight'; ?>">Home</a>
            <a href="produk.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo $current_page == 'produk.php' ? 'text-luxury-navy bg-luxury-navyLight' : 'text-slate-600 hover:text-luxury-navy hover:bg-luxury-navyLight'; ?>">Shop</a>
            <a href="about.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo $current_page == 'about.php' ? 'text-luxury-navy bg-luxury-navyLight' : 'text-slate-600 hover:text-luxury-navy hover:bg-luxury-navyLight'; ?>">About</a>
            <a href="contact.php" class="block px-3 py-2 rounded-md text-base font-medium <?php echo $current_page == 'contact.php' ? 'text-luxury-navy bg-luxury-navyLight' : 'text-slate-600 hover:text-luxury-navy hover:bg-luxury-navyLight'; ?>">Contact</a>
            <?php if(!isset($_SESSION['status_login'])): ?>
                <a href="login.php" class="block px-3 py-2 rounded-md text-base font-medium text-luxury-navy hover:bg-luxury-navyLight">Login</a>
            <?php else: ?>
                <?php if($_SESSION['level'] == 'admin'): ?>
                    <a href="admin/dashbord.php" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-luxury-navyLight">Admin Dashboard</a>
                <?php endif; ?>
                <a href="logout.php" class="block px-3 py-2 rounded-md text-base font-medium text-red-500 hover:bg-luxury-navyLight">Logout</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="h-20"></div> <!-- Spacer to offset fixed header -->
