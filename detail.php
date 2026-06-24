<?php
    include 'config/db.php';
    include 'config/helper.php';
    
    $product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $produk = mysqli_query($conn, "SELECT p.*, c.category_name FROM tb_product p LEFT JOIN tb_category c ON p.category_id = c.category_id WHERE p.product_id = '$product_id' LIMIT 1");
    
    if (mysqli_num_rows($produk) == 0) {
        header('Location: produk.php');
        exit;
    }
    
    $p = mysqli_fetch_object($produk);
    $meta = get_product_meta($p->product_id, $p->category_id, $p->product_name);
    
    $page_title = $p->product_name . " | Azure Perfume";
    include 'includes/header.php';
?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ quantity: 1 }">
        <!-- Breadcrumb -->
        <nav class="flex text-xs tracking-widest uppercase text-slate-500 mb-8 gap-2">
            <a href="index.php" class="hover:text-white transition">Home</a>
            <span>/</span>
            <a href="produk.php" class="hover:text-white transition">Shop</a>
            <span>/</span>
            <span class="text-luxury-gold"><?php echo $p->product_name; ?></span>
        </nav>
        
        <!-- Product Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            
            <!-- Left Panel: Perfume Image (5 columns) -->
            <div class="lg:col-span-5 space-y-6">
                <div class="glass-card rounded-lg overflow-hidden aspect-[4/5] bg-luxury-black flex items-center justify-center p-8 relative group border border-luxury-gold/15">
                    <img src="produk/<?php echo $p->product_image; ?>" alt="<?php echo $p->product_name; ?>" class="max-h-full max-w-full object-contain filter drop-shadow-[0_15px_30px_rgba(0,0,0,0.5)] group-hover:scale-105 transition-transform duration-700">
                    
                    <!-- Ambient Glow Background -->
                    <div class="absolute inset-0 bg-gradient-to-t from-luxury-navyDark/35 to-transparent pointer-events-none"></div>
                </div>
                
                <!-- Trust Badges Under Image -->
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="glass-card rounded p-3 space-y-1">
                        <i class="bx bx-check-shield text-xl text-luxury-gold"></i>
                        <p class="text-[9px] font-bold tracking-widest uppercase text-white">100% Genuine</p>
                    </div>
                    <div class="glass-card rounded p-3 space-y-1">
                        <i class="bx bx-time-five text-xl text-luxury-gold"></i>
                        <p class="text-[9px] font-bold tracking-widest uppercase text-white">8+ Hours Wear</p>
                    </div>
                    <div class="glass-card rounded p-3 space-y-1">
                        <i class="bx bx-package text-xl text-luxury-gold"></i>
                        <p class="text-[9px] font-bold tracking-widest uppercase text-white">Safe Delivery</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Panel: Scent Details & Actions (7 columns) -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Title & Header Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 flex-wrap">
                        <span class="bg-luxury-gold/10 border border-luxury-gold/30 text-[10px] font-bold tracking-[0.2em] uppercase px-3 py-1 rounded text-luxury-gold">
                            <?php echo $meta['family']; ?>
                        </span>
                        <span class="text-xs text-slate-400 font-light"><?php echo $meta['gender']; ?> Persona</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl font-serif text-white tracking-wide leading-tight"><?php echo $p->product_name; ?></h1>
                    
                    <!-- Ratings & Reviews -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center text-luxury-gold">
                            <i class="bx bxs-star text-base"></i>
                            <i class="bx bxs-star text-base"></i>
                            <i class="bx bxs-star text-base"></i>
                            <i class="bx bxs-star text-base"></i>
                            <i class="bx bxs-star-half text-base"></i>
                            <span class="ml-1.5 font-bold text-white text-sm"><?php echo $meta['rating']; ?></span>
                        </div>
                        <span class="h-3 w-[1px] bg-slate-700"></span>
                        <span class="text-xs text-slate-400 font-light"><?php echo $meta['reviews']; ?> Olfactory Reviews</span>
                    </div>
                    
                    <!-- Luxury Price display -->
                    <div class="text-2xl sm:text-3xl font-serif text-luxury-goldBright font-semibold pt-2">
                        <?php echo format_idr($p->product_price); ?>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="space-y-3">
                    <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Maison Narrative</h3>
                    <p class="text-sm text-slate-300 font-light leading-relaxed">
                        <?php echo $p->product_description; ?>
                    </p>
                </div>
                
                <!-- Visual Scent Pyramid Accord -->
                <div class="space-y-4">
                    <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Olfactory Notes Pyramid</h3>
                    
                    <div class="space-y-2 max-w-md">
                        <!-- Top Notes -->
                        <div class="pyramid-level pyramid-top p-3 flex items-center justify-between text-xs transition duration-300 hover:bg-luxury-navyLight/60 hover:border-luxury-gold/40">
                            <div class="pl-8">
                                <span class="font-serif tracking-wider font-bold text-luxury-gold block uppercase text-[10px]">Top Notes</span>
                                <span class="text-slate-300 font-light text-[11px]"><?php echo $meta['notes']['top']; ?></span>
                            </div>
                            <span class="text-[10px] text-slate-500 uppercase tracking-widest pr-8 hidden sm:inline">First Impression</span>
                        </div>
                        
                        <!-- Heart/Middle Notes -->
                        <div class="pyramid-level pyramid-middle p-3 flex items-center justify-between text-xs transition duration-300 hover:bg-luxury-navyLight/60 hover:border-luxury-gold/40">
                            <div class="pl-6">
                                <span class="font-serif tracking-wider font-bold text-luxury-gold block uppercase text-[10px]">Heart Notes</span>
                                <span class="text-slate-300 font-light text-[11px]"><?php echo $meta['notes']['middle']; ?></span>
                            </div>
                            <span class="text-[10px] text-slate-500 uppercase tracking-widest pr-6 hidden sm:inline">Scent Character</span>
                        </div>
                        
                        <!-- Base Notes -->
                        <div class="pyramid-level pyramid-base p-3 flex items-center justify-between text-xs transition duration-300 hover:bg-luxury-navyLight/60 hover:border-luxury-gold/40">
                            <div class="pl-4">
                                <span class="font-serif tracking-wider font-bold text-luxury-gold block uppercase text-[10px]">Base Notes</span>
                                <span class="text-slate-300 font-light text-[11px]"><?php echo $meta['notes']['base']; ?></span>
                            </div>
                            <span class="text-[10px] text-slate-500 uppercase tracking-widest pr-4 hidden sm:inline">Dry Down Sillage</span>
                        </div>
                    </div>
                </div>
                
                <!-- Purchase Actions -->
                <div class="pt-6 border-t border-luxury-gold/15 space-y-4 max-w-md">
                    <div class="flex items-center gap-4">
                        <!-- Quantity Selector -->
                        <div class="flex items-center border border-luxury-gold/20 rounded bg-luxury-navyLight h-12">
                            <button @click="if (quantity > 1) quantity--" class="px-4 text-slate-400 hover:text-luxury-gold text-lg transition">-</button>
                            <span class="px-4 text-white font-bold text-sm w-12 text-center" x-text="quantity"></span>
                            <button @click="quantity++" class="px-4 text-slate-400 hover:text-luxury-gold text-lg transition">+</button>
                        </div>
                        
                        <!-- Add to Bag Button -->
                        <button @click="for(let i=0; i < quantity; i++) { addToCart(<?php echo $p->product_id; ?>, '<?php echo addslashes($p->product_name); ?>', <?php echo $p->product_price; ?>, '<?php echo $p->product_image; ?>', '<?php echo $meta['family']; ?>') }" class="flex-1 inline-flex items-center justify-center h-12 bg-gradient-to-r from-luxury-goldDark to-luxury-goldBright rounded font-bold text-xs tracking-widest uppercase text-luxury-navyDark shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                            Add To Scent Bag
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
