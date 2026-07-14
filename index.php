<?php
    $page_title = "Azure Perfume | Discover Your Signature Scent";
    include 'config/db.php';
    include 'config/helper.php';
    include 'includes/header.php';
?>

    <!-- Hero Slider Section -->
    <div class="relative h-[85vh] sm:h-[90vh] overflow-hidden bg-black">
        <div class="absolute inset-0">
            <!-- Slide 1 -->
            <div class="slide-item absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" style="background: linear-gradient(to right, rgba(3,5,11,0.9) 20%, rgba(3,5,11,0.4) 60%, rgba(3,5,11,0.2) 100%), url('img/slider1.png') center/cover no-repeat;">
                <div class="max-w-7xl mx-auto h-full px-4 sm:px-6 lg:px-8 flex items-center">
                    <div class="max-w-xl space-y-6">
                        <span class="text-xs font-bold tracking-[0.3em] text-luxury-gold uppercase block animate-fade-in-up">Maison D'Azure</span>
                        <h1 class="text-4xl sm:text-6xl font-serif font-light text-white leading-tight animate-fade-in-up" style="animation-delay: 200ms;">Elevate Your<br><span class="italic text-luxury-goldBright font-normal">Signature Scent</span></h1>
                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-light animate-fade-in-up" style="animation-delay: 400ms;">Crafted with rare natural materials and hand-pressed botanical oils, curated to project confidence and absolute refinement.</p>
                        <div class="pt-4 animate-fade-in-up" style="animation-delay: 600ms;">
                            <a href="produk.php" class="inline-flex items-center justify-center px-8 py-3.5 border border-luxury-gold/50 bg-luxury-navyDark/60 backdrop-blur text-xs font-bold tracking-widest text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition-all duration-300 uppercase">
                                Explore The Collection
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="slide-item absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" style="background: linear-gradient(to right, rgba(3,5,11,0.9) 20%, rgba(3,5,11,0.4) 60%, rgba(3,5,11,0.2) 100%), url('img/slider2.png') center/cover no-repeat;">
                <div class="max-w-7xl mx-auto h-full px-4 sm:px-6 lg:px-8 flex items-center">
                    <div class="max-w-xl space-y-6">
                        <span class="text-xs font-bold tracking-[0.3em] text-luxury-gold uppercase block">Olfactory Artistry</span>
                        <h1 class="text-4xl sm:text-6xl font-serif font-light text-white leading-tight">Memories That<br><span class="italic text-luxury-goldBright font-normal">Stay Forever</span></h1>
                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-light">More than a fragrance, it is a sensory journey that weaves into the story of your life, capturing moments in timeless elegance.</p>
                        <div class="pt-4">
                            <a href="produk.php" class="inline-flex items-center justify-center px-8 py-3.5 border border-luxury-gold/50 bg-luxury-navyDark/60 backdrop-blur text-xs font-bold tracking-widest text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition-all duration-300 uppercase">
                                Discover Bestsellers
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="slide-item absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" style="background: linear-gradient(to right, rgba(3,5,11,0.9) 20%, rgba(3,5,11,0.4) 60%, rgba(3,5,11,0.2) 100%), url('img/slider3.png') center/cover no-repeat;">
                <div class="max-w-7xl mx-auto h-full px-4 sm:px-6 lg:px-8 flex items-center">
                    <div class="max-w-xl space-y-6">
                        <span class="text-xs font-bold tracking-[0.3em] text-luxury-gold uppercase block">Exclusive Blends</span>
                        <h1 class="text-4xl sm:text-6xl font-serif font-light text-white leading-tight">Find What<br><span class="italic text-luxury-goldBright font-normal">Defines You</span></h1>
                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-light">From deep, resinous woods to fresh, sparkling citrus - explore fragrances designed for every mood and statement.</p>
                        <div class="pt-4">
                            <a href="produk.php" class="inline-flex items-center justify-center px-8 py-3.5 border border-luxury-gold/50 bg-luxury-navyDark/60 backdrop-blur text-xs font-bold tracking-widest text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition-all duration-300 uppercase">
                                Find Your Scent
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Arrows -->
        <button class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-white/20 hover:border-luxury-gold/50 hover:bg-luxury-black/60 flex items-center justify-center text-white hover:text-luxury-gold transition-all duration-300 z-10" onclick="moveSlide(-1)">
            <i class="bx bx-chevron-left text-2xl"></i>
        </button>
        <button class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-white/20 hover:border-luxury-gold/50 hover:bg-luxury-black/60 flex items-center justify-center text-white hover:text-luxury-gold transition-all duration-300 z-10" onclick="moveSlide(1)">
            <i class="bx bx-chevron-right text-2xl"></i>
        </button>

        <!-- Slider Dots -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-10">
            <span class="dot-indicator w-2.5 h-2.5 rounded-full border border-white cursor-pointer bg-white" onclick="currentSlide(0)"></span>
            <span class="dot-indicator w-2.5 h-2.5 rounded-full border border-white cursor-pointer" onclick="currentSlide(1)"></span>
            <span class="dot-indicator w-2.5 h-2.5 rounded-full border border-white cursor-pointer" onclick="currentSlide(2)"></span>
        </div>
    </div>

    <!-- Category Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-luxury-black relative z-10 bg-noise">
        <div class="max-w-7xl mx-auto text-center space-y-4 mb-16">
            <span class="text-xs font-bold tracking-[0.25em] text-luxury-gold uppercase">Scent Families</span>
            <h2 class="text-3xl sm:text-5xl font-serif text-luxury-navyDark">Explore Our Notes</h2>
            <div class="w-12 h-[1px] bg-luxury-gold mx-auto mt-4"></div>
        </div>
        
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Category: FLORAL -->
            <a href="produk.php?kat=4" class="glass-card rounded-lg p-8 text-center space-y-4 group transition-luxury hover:-translate-y-2 block">
                <div class="w-14 h-14 bg-luxury-navyLight rounded-full flex items-center justify-center mx-auto border border-luxury-gold/10 group-hover:border-luxury-gold/50 transition-all duration-300">
                    <img src="img/floral.png" alt="Floral Category" class="w-8 h-8 object-contain">
                </div>
                <h3 class="text-lg font-serif font-semibold tracking-wide text-luxury-navyDark uppercase group-hover:text-luxury-gold transition-colors">Floral</h3>
                <p class="text-xs text-slate-600 leading-relaxed font-light">Soft, romantic, and fresh blooms harvested at dawn for timeless grace.</p>
            </a>
            
            <!-- Category: WOODY -->
            <a href="produk.php?kat=3" class="glass-card rounded-lg p-8 text-center space-y-4 group transition-luxury hover:-translate-y-2 block">
                <div class="w-14 h-14 bg-luxury-navyLight rounded-full flex items-center justify-center mx-auto border border-luxury-gold/10 group-hover:border-luxury-gold/50 transition-all duration-300">
                    <img src="img/woody.png" alt="Woody Category" class="w-8 h-8 object-contain">
                </div>
                <h3 class="text-lg font-serif font-semibold tracking-wide text-luxury-navyDark uppercase group-hover:text-luxury-gold transition-colors">Woody</h3>
                <p class="text-xs text-slate-600 leading-relaxed font-light">Warm cedar, smoky sandalwood, and deep vetiver for sophisticated strength.</p>
            </a>
            
            <!-- Category: FRESH -->
            <a href="produk.php?kat=11" class="glass-card rounded-lg p-8 text-center space-y-4 group transition-luxury hover:-translate-y-2 block">
                <div class="w-14 h-14 bg-luxury-navyLight rounded-full flex items-center justify-center mx-auto border border-luxury-gold/10 group-hover:border-luxury-gold/50 transition-all duration-300">
                    <img src="img/fresh.png" alt="Fresh Category" class="w-8 h-8 object-contain">
                </div>
                <h3 class="text-lg font-serif font-semibold tracking-wide text-luxury-navyDark uppercase group-hover:text-luxury-gold transition-colors">Fresh</h3>
                <p class="text-xs text-slate-600 leading-relaxed font-light">Vibrant citrus zests, marine minerals, and green leaves for crisp vitality.</p>
            </a>
            
            <!-- Category: LEATHER -->
            <a href="produk.php?kat=12" class="glass-card rounded-lg p-8 text-center space-y-4 group transition-luxury hover:-translate-y-2 block">
                <div class="w-14 h-14 bg-luxury-navyLight rounded-full flex items-center justify-center mx-auto border border-luxury-gold/10 group-hover:border-luxury-gold/50 transition-all duration-300">
                    <img src="img/leather.png" alt="Leather Category" class="w-8 h-8 object-contain">
                </div>
                <h3 class="text-lg font-serif font-semibold tracking-wide text-luxury-navyDark uppercase group-hover:text-luxury-gold transition-colors">Leather</h3>
                <p class="text-xs text-slate-600 leading-relaxed font-light">Rich Tuscan suede, bold saffron, and smoky oud for mysterious magnetism.</p>
            </a>
        </div>
    </section>

    <!-- Best Seller Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-luxury-navyLight/40 relative z-10 border-t border-b border-luxury-navyLight">
        <div class="max-w-7xl mx-auto text-center space-y-4 mb-16">
            <span class="text-xs font-bold tracking-[0.25em] text-luxury-gold uppercase">Our Masterpieces</span>
            <h2 class="text-3xl sm:text-5xl font-serif text-luxury-navyDark">Bestselling Fragrances</h2>
            <div class="w-12 h-[1px] bg-luxury-gold mx-auto mt-4"></div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
                // Fetching top 4 products for best seller
                $best_seller = mysqli_query($conn, "SELECT p.*, c.category_name FROM tb_product p LEFT JOIN tb_category c ON p.category_id = c.category_id WHERE p.product_status = 1 ORDER BY p.product_id DESC LIMIT 4");
                if(mysqli_num_rows($best_seller) > 0){
                    while($p = mysqli_fetch_array($best_seller)){
                        $meta = get_product_meta($p['product_id'], $p['category_id'], $p['product_name']);
            ?>
                <div class="glass-card rounded-lg overflow-hidden group flex flex-col justify-between transition-luxury hover:-translate-y-2">
                    <div class="relative overflow-hidden aspect-[4/5] bg-luxury-black/50">
                        <!-- Scent Family Badge -->
                        <span class="absolute top-4 left-4 z-10 bg-luxury-navyDark/90 backdrop-blur border border-luxury-gold/20 text-[10px] font-bold tracking-widest uppercase px-2.5 py-1 rounded text-luxury-gold" x-text="'<?php echo $meta['family']; ?>'"></span>
                        
                        <!-- Image -->
                        <a href="detail.php?id=<?php echo $p['product_id']; ?>" class="block h-full w-full">
                            <img src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>" class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                        </a>
                        
                        <!-- Hover Quick Actions -->
                        <div class="absolute inset-0 bg-luxury-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                            <a href="detail.php?id=<?php echo $p['product_id']; ?>" class="w-11 h-11 rounded-full bg-white text-luxury-black flex items-center justify-center hover:bg-luxury-gold hover:text-luxury-black hover:scale-115 transition-all duration-300" title="Quick View">
                                <i class="bx bx-show text-lg"></i>
                            </a>
                            <button @click="addToCart(<?php echo $p['product_id']; ?>, '<?php echo addslashes($p['product_name']); ?>', <?php echo $p['product_price']; ?>, '<?php echo $p['product_image']; ?>', '<?php echo $meta['family']; ?>')" class="w-11 h-11 rounded-full bg-white text-luxury-black flex items-center justify-center hover:bg-luxury-gold hover:text-luxury-black hover:scale-115 transition-all duration-300" title="Add to Cart">
                                <i class="bx bx-shopping-bag text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs text-slate-500">
                                <span><?php echo $meta['gender']; ?></span>
                                <div class="flex items-center text-luxury-gold">
                                    <i class="bx bxs-star mr-0.5"></i>
                                    <span class="font-bold text-slate-700"><?php echo $meta['rating']; ?></span>
                                </div>
                            </div>
                            
                            <a href="detail.php?id=<?php echo $p['product_id']; ?>" class="block">
                                <h4 class="text-xl font-serif text-slate-800 tracking-wide hover:text-luxury-navy transition-colors truncate"><?php echo $p['product_name'] ?></h4>
                            </a>
                            
                            <!-- Notes snippet -->
                            <p class="text-[11px] text-slate-500 line-clamp-1 italic font-light">
                                Top: <?php echo $meta['notes']['top']; ?>
                            </p>
                        </div>

                        <div class="pt-4 border-t border-luxury-gold/5 flex items-center justify-between">
                            <span class="text-sm font-semibold text-luxury-gold font-serif"><?php echo format_idr($p['product_price']); ?></span>
                            <button @click="addToCart(<?php echo $p['product_id']; ?>, '<?php echo addslashes($p['product_name']); ?>', <?php echo $p['product_price']; ?>, '<?php echo $p['product_image']; ?>', '<?php echo $meta['family']; ?>')" class="text-xs font-bold tracking-widest uppercase text-luxury-navyDark hover:text-luxury-navy transition-colors flex items-center gap-1">
                                Add To Cart <i class="bx bx-plus text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php }} ?>
        </div>
        
        <div class="text-center mt-16">
            <a href="produk.php" class="inline-flex items-center justify-center px-10 py-4 border border-luxury-gold bg-transparent text-xs font-bold tracking-widest text-luxury-gold hover:bg-luxury-gold hover:text-white transition-all duration-300 uppercase">
                View All Fragrances
            </a>
        </div>
    </section>

    <!-- Scent Experience Showcase Banner -->
    <section class="relative py-28 bg-black overflow-hidden flex items-center justify-center z-10">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(19,28,56,0.5)_0%,rgba(3,5,11,0.95)_80%)]"></div>
        <div class="absolute inset-0 opacity-30 mix-blend-overlay" style="background: url('img/bg_new.jpeg') center/cover no-repeat;"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 text-center space-y-6">
            <span class="text-xs font-bold tracking-[0.35em] text-luxury-gold uppercase">The Scent Experience</span>
            <h2 class="text-3xl sm:text-5xl font-serif text-white leading-tight font-light">Meticulously Composed. <br><span class="italic text-luxury-goldBright font-normal">Sustainably Sourced.</span></h2>
            <div class="w-12 h-[1px] bg-luxury-gold mx-auto my-6"></div>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed font-light">
                We believe perfume is a living language. Each bottle compiles dozens of precious oils and raw botanicals imported from Grasse, Tuscany, and Madagascar, aged to absolute perfection.
            </p>
            <div class="pt-4">
                <a href="about.php" class="text-xs font-bold tracking-widest text-white hover:text-luxury-gold uppercase border-b border-luxury-gold/30 hover:border-luxury-gold pb-1 transition-all duration-300">Read Our Story &rarr;</a>
            </div>
        </div>
    </section>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide-item');
        const dots = document.querySelectorAll('.dot-indicator');
        let sliderInterval;

        function showSlide(n) {
            slides.forEach(slide => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });
            dots.forEach(dot => {
                dot.classList.remove('bg-white');
            });
            
            slideIndex = (n + slides.length) % slides.length;
            
            slides[slideIndex].classList.remove('opacity-0');
            slides[slideIndex].classList.add('opacity-100');
            dots[slideIndex].classList.add('bg-white');
        }

        function moveSlide(step) {
            showSlide(slideIndex + step);
            resetTimer();
        }

        function currentSlide(n) {
            showSlide(n);
            resetTimer();
        }

        function startTimer() {
            sliderInterval = setInterval(() => {
                showSlide(slideIndex + 1);
            }, 6000);
        }

        function resetTimer() {
            clearInterval(sliderInterval);
            startTimer();
        }

        // Initialize
        showSlide(slideIndex);
        startTimer();
    </script>

<?php include 'includes/footer.php'; ?>