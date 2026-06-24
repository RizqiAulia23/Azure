<?php
    $page_title = "Azure Perfume | Luxury Fragrance Catalog";
    include 'config/db.php';
    include 'config/helper.php';
    include 'includes/header.php';

    // Fetch all products from MySQL database and construct a clean JSON for Alpine.js
    $products_query = mysqli_query($conn, "SELECT p.*, c.category_name FROM tb_product p LEFT JOIN tb_category c ON p.category_id = c.category_id WHERE p.product_status = 1 ORDER BY p.product_id DESC");
    $products_array = [];
    while($p = mysqli_fetch_array($products_query)) {
        $meta = get_product_meta($p['product_id'], $p['category_id'], $p['product_name']);
        $products_array[] = [
            'id' => (int)$p['product_id'],
            'category_id' => (int)$p['category_id'],
            'category_name' => $p['category_name'],
            'name' => $p['product_name'],
            'price' => (int)$p['product_price'],
            'description' => $p['product_description'],
            'image' => $p['product_image'],
            'family' => $meta['family'],
            'notes' => $meta['notes'],
            'rating' => $meta['rating'],
            'reviews' => $meta['reviews'],
            'gender' => $meta['gender']
        ];
    }
    $products_json = json_encode($products_array);
    
    // Initial category if loaded from Homepage link (e.g., produk.php?kat=4)
    $init_cat = isset($_GET['kat']) ? (int)$_GET['kat'] : 'all';
?>

    <!-- Page Banner -->
    <section class="relative py-20 bg-black overflow-hidden flex items-center justify-center border-b border-luxury-gold/15">
        <div class="absolute inset-0 bg-gradient-to-b from-luxury-navyDark/85 to-luxury-black z-0"></div>
        <div class="absolute inset-0 opacity-20 mix-blend-overlay" style="background: url('img/bg_new.jpeg') center/cover no-repeat;"></div>
        
        <div class="relative text-center space-y-3 z-10 max-w-2xl px-4">
            <span class="text-[10px] font-bold tracking-[0.35em] text-luxury-gold uppercase">L'Azure Catalog</span>
            <h1 class="text-4xl sm:text-5xl font-serif text-white font-light">The Fragrance <span class="italic text-luxury-goldBright font-normal">Vault</span></h1>
            <p class="text-xs sm:text-sm text-slate-400 font-light leading-relaxed">
                Explore our meticulously composed collection of extrait de parfum, designed for timeless presence and enduring character.
            </p>
        </div>
    </section>

    <!-- Catalog Core with Alpine.js -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{
        products: <?php echo htmlspecialchars($products_json, ENT_QUOTES, 'UTF-8'); ?>,
        searchQuery: '',
        selectedCategory: <?php echo $init_cat === 'all' ? "'all'" : $init_cat; ?>,
        selectedGender: 'all',
        selectedPriceRange: 'all',
        sortBy: 'default',
        openMobileFilters: false,
        
        filteredProducts() {
            let list = [...this.products];
            
            // Search filter
            if (this.searchQuery.trim() !== '') {
                const q = this.searchQuery.toLowerCase();
                list = list.filter(p => p.name.toLowerCase().includes(q) || p.description.toLowerCase().includes(q) || p.family.toLowerCase().includes(q));
            }
            
            // Category filter
            if (this.selectedCategory !== 'all') {
                list = list.filter(p => p.category_id === parseInt(this.selectedCategory));
            }
            
            // Gender filter
            if (this.selectedGender !== 'all') {
                list = list.filter(p => p.gender === this.selectedGender);
            }
            
            // Price range filter
            if (this.selectedPriceRange !== 'all') {
                if (this.selectedPriceRange === 'under-150k') {
                    list = list.filter(p => p.price < 150000);
                } else if (this.selectedPriceRange === '150k-300k') {
                    list = list.filter(p => p.price >= 150000 && p.price <= 300000);
                } else if (this.selectedPriceRange === 'over-300k') {
                    list = list.filter(p => p.price > 300000);
                }
            }
            
            // Sorting
            if (this.sortBy === 'price-low') {
                list.sort((a, b) => a.price - b.price);
            } else if (this.sortBy === 'price-high') {
                list.sort((a, b) => b.price - a.price);
            } else if (this.sortBy === 'rating') {
                list.sort((a, b) => b.rating - a.rating);
            }
            
            return list;
        },
        
        resetFilters() {
            this.searchQuery = '';
            this.selectedCategory = 'all';
            this.selectedGender = 'all';
            this.selectedPriceRange = 'all';
            this.sortBy = 'default';
        }
    }">
        <div class="lg:flex lg:gap-10">
            
            <!-- Sidebar: Desktop Filters (hidden on mobile) -->
            <aside class="hidden lg:block lg:w-1/4 space-y-8 flex-shrink-0">
                
                <!-- Search bar -->
                <div class="glass-card rounded-lg p-5 space-y-3">
                    <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Search Fragrance</h3>
                    <div class="relative">
                        <input type="text" x-model="searchQuery" placeholder="Search notes, names..." class="w-full bg-luxury-black/60 border border-luxury-gold/20 rounded px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-luxury-gold transition duration-300">
                        <i class="bx bx-search absolute right-3 top-3 text-slate-500 text-sm"></i>
                    </div>
                </div>
                
                <!-- Category/Scent Family Filter -->
                <div class="glass-card rounded-lg p-5 space-y-4">
                    <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Scent Family</h3>
                    <div class="space-y-2 text-xs">
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="category" value="all" x-model="selectedCategory" class="accent-luxury-gold">
                            <span>All Families</span>
                        </label>
                        <?php
                            $categories = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_name ASC");
                            while($k = mysqli_fetch_array($categories)){
                        ?>
                            <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                                <input type="radio" name="category" value="<?php echo $k['category_id']; ?>" x-model="selectedCategory" class="accent-luxury-gold">
                                <span><?php echo ucfirst(strtolower($k['category_name'])); ?></span>
                            </label>
                        <?php } ?>
                    </div>
                </div>

                <!-- Gender Filter -->
                <div class="glass-card rounded-lg p-5 space-y-4">
                    <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Persona</h3>
                    <div class="space-y-2 text-xs">
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="gender" value="all" x-model="selectedGender" class="accent-luxury-gold">
                            <span>All Personas</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="gender" value="Men" x-model="selectedGender" class="accent-luxury-gold">
                            <span>Pour Homme (Men)</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="gender" value="Women" x-model="selectedGender" class="accent-luxury-gold">
                            <span>Pour Femme (Women)</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="gender" value="Unisex" x-model="selectedGender" class="accent-luxury-gold">
                            <span>Unisex Accord</span>
                        </label>
                    </div>
                </div>

                <!-- Price Filter -->
                <div class="glass-card rounded-lg p-5 space-y-4">
                    <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Price Tier</h3>
                    <div class="space-y-2 text-xs">
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="price" value="all" x-model="selectedPriceRange" class="accent-luxury-gold">
                            <span>All Prices</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="price" value="under-150k" x-model="selectedPriceRange" class="accent-luxury-gold">
                            <span>Under IDR 150.000</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="price" value="150k-300k" x-model="selectedPriceRange" class="accent-luxury-gold">
                            <span>IDR 150.000 - IDR 300.000</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-slate-300 hover:text-white cursor-pointer transition">
                            <input type="radio" name="price" value="over-300k" x-model="selectedPriceRange" class="accent-luxury-gold">
                            <span>Above IDR 300.000</span>
                        </label>
                    </div>
                </div>

                <!-- Reset button -->
                <button @click="resetFilters()" class="w-full py-2.5 border border-luxury-gold/30 hover:border-luxury-gold text-[10px] font-bold tracking-widest uppercase text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition duration-300 rounded">
                    Reset Catalog Filters
                </button>
            </aside>

            <!-- Main Content: Catalog Grid -->
            <div class="lg:w-3/4 space-y-6">
                
                <!-- Toolbar: Search Bar (Mobile), Filters Button, Sorting -->
                <div class="glass-card rounded-lg p-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    
                    <!-- Search for mobile (hidden on desktop) -->
                    <div class="relative w-full sm:hidden">
                        <input type="text" x-model="searchQuery" placeholder="Search fragrances..." class="w-full bg-luxury-black/60 border border-luxury-gold/20 rounded px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-luxury-gold transition">
                        <i class="bx bx-search absolute right-3 top-3.5 text-slate-500 text-sm"></i>
                    </div>

                    <!-- Mobile Filter Toggle Button & Count -->
                    <div class="flex items-center justify-between w-full sm:w-auto gap-4">
                        <button @click="openMobileFilters = true" class="lg:hidden py-2 px-4 rounded border border-luxury-gold/30 text-xs font-semibold text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black flex items-center gap-1.5 transition">
                            <i class="bx bx-slider-alt text-sm"></i> Filters
                        </button>
                        <p class="text-xs text-slate-400 font-light">Showing <span class="font-bold text-white" x-text="filteredProducts().length"></span> results</p>
                    </div>
                    
                    <!-- Sorting Dropdown -->
                    <div class="flex items-center gap-2.5 w-full sm:w-auto justify-end">
                        <span class="text-xs text-slate-400 font-light hidden sm:inline">Sort By:</span>
                        <select x-model="sortBy" class="bg-luxury-black/85 border border-luxury-gold/20 rounded px-3 py-2 text-xs text-slate-200 focus:outline-none focus:border-luxury-gold transition cursor-pointer">
                            <option value="default">Release Order</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="rating">Highest Star Rating</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <template x-for="p in filteredProducts()" :key="p.id">
                        <div class="glass-card rounded-lg overflow-hidden group flex flex-col justify-between transition-luxury hover:-translate-y-2">
                            <div class="relative overflow-hidden aspect-[4/5] bg-luxury-black/50">
                                
                                <!-- Category Badge -->
                                <span class="absolute top-4 left-4 z-10 bg-luxury-navyDark/90 backdrop-blur border border-luxury-gold/20 text-[10px] font-bold tracking-widest uppercase px-2.5 py-1 rounded text-luxury-gold" x-text="p.family"></span>
                                
                                <!-- Image -->
                                <a :href="'detail.php?id=' + p.id" class="block h-full w-full">
                                    <img :src="'produk/' + p.image" :alt="p.name" class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                                </a>
                                
                                <!-- Hover Actions -->
                                <div class="absolute inset-0 bg-luxury-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                                    <a :href="'detail.php?id=' + p.id" class="w-11 h-11 rounded-full bg-white text-luxury-black flex items-center justify-center hover:bg-luxury-gold hover:text-luxury-black hover:scale-115 transition-all duration-300" title="Quick View">
                                        <i class="bx bx-show text-lg"></i>
                                    </a>
                                    <button @click="addToCart(p.id, p.name, p.price, p.image, p.family)" class="w-11 h-11 rounded-full bg-white text-luxury-black flex items-center justify-center hover:bg-luxury-gold hover:text-luxury-black hover:scale-115 transition-all duration-300" title="Add to Cart">
                                        <i class="bx bx-shopping-bag text-lg"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Card Info -->
                            <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                                <div class="space-y-1">
                                    <div class="flex items-center justify-between text-xs text-slate-400">
                                        <span x-text="p.gender"></span>
                                        <div class="flex items-center text-luxury-gold">
                                            <i class="bx bxs-star mr-0.5"></i>
                                            <span class="font-bold text-white" x-text="p.rating"></span>
                                        </div>
                                    </div>
                                    
                                    <a :href="'detail.php?id=' + p.id" class="block">
                                        <h4 class="text-xl font-serif text-white tracking-wide hover:text-luxury-gold transition-colors truncate" x-text="p.name"></h4>
                                    </a>
                                    
                                    <!-- Scent Notes Info -->
                                    <p class="text-[11px] text-slate-400 line-clamp-1 italic font-light">
                                        Top: <span x-text="p.notes.top"></span>
                                    </p>
                                </div>

                                <div class="pt-4 border-t border-luxury-gold/5 flex items-center justify-between">
                                    <span class="text-sm font-semibold text-luxury-goldBright font-serif" x-text="formatIDR(p.price)"></span>
                                    <button @click="addToCart(p.id, p.name, p.price, p.image, p.family)" class="text-xs font-bold tracking-widest uppercase text-white hover:text-luxury-gold transition-colors flex items-center gap-1">
                                        Add To Cart <i class="bx bx-plus text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Empty State -->
                <div class="py-20 text-center" x-show="filteredProducts().length === 0" x-cloak>
                    <i class="bx bx-search-alt text-5xl text-slate-600 mb-4"></i>
                    <h3 class="text-lg font-serif text-white font-bold">No Fragrances Found</h3>
                    <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">We couldn't find any fragrances matching your current search criteria. Try clearing some filters.</p>
                    <button @click="resetFilters()" class="mt-4 inline-flex items-center justify-center px-6 py-2 border border-luxury-gold text-[10px] font-bold tracking-widest uppercase text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition duration-300">Clear All Filters</button>
                </div>
            </div>
        </div>

        <!-- ================= MOBILE FILTERS DRAWER ================= -->
        <div x-show="openMobileFilters" 
             class="fixed inset-0 overflow-hidden z-[100]" 
             x-cloak>
            <div class="absolute inset-0 overflow-hidden">
                <!-- Overlay -->
                <div x-show="openMobileFilters"
                     x-transition:enter="ease-in-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in-out duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="openMobileFilters = false"
                     class="absolute inset-0 bg-luxury-black/85 backdrop-blur-sm transition-opacity"></div>

                <div class="pointer-events-none fixed inset-y-0 left-0 flex max-w-full pr-10">
                    <!-- Slide-in Panel -->
                    <div x-show="openMobileFilters"
                         x-transition:enter="transform transition ease-in-out duration-300"
                         x-transition:enter-start="-translate-x-full"
                         x-transition:enter-end="translate-x-0"
                         x-transition:leave="transform transition ease-in-out duration-300"
                         x-transition:leave-start="translate-x-0"
                         x-transition:leave-end="-translate-x-full"
                         class="pointer-events-auto w-screen max-w-xs">
                        
                        <div class="flex h-full flex-col overflow-y-scroll bg-luxury-navyLight shadow-2xl border-r border-luxury-gold/15 p-6 space-y-8">
                            <div class="flex items-center justify-between border-b border-luxury-gold/10 pb-4">
                                <h2 class="text-sm font-serif font-semibold tracking-wider text-white uppercase">Filters</h2>
                                <button @click="openMobileFilters = false" class="text-slate-400 hover:text-white">
                                    <i class="bx bx-x text-2xl"></i>
                                </button>
                            </div>

                            <!-- Scent Family -->
                            <div class="space-y-3">
                                <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Scent Family</h3>
                                <div class="space-y-2 text-xs">
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_cat" value="all" x-model="selectedCategory" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>All Families</span>
                                    </label>
                                    <?php
                                        // Re-run category query for mobile sidebar
                                        $categories_mob = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_name ASC");
                                        while($k = mysqli_fetch_array($categories_mob)){
                                    ?>
                                        <label class="flex items-center gap-2.5 text-slate-300">
                                            <input type="radio" name="mob_cat" value="<?php echo $k['category_id']; ?>" x-model="selectedCategory" @change="openMobileFilters = false" class="accent-luxury-gold">
                                            <span><?php echo ucfirst(strtolower($k['category_name'])); ?></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- Persona -->
                            <div class="space-y-3">
                                <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Persona</h3>
                                <div class="space-y-2 text-xs">
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_gender" value="all" x-model="selectedGender" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>All Personas</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_gender" value="Men" x-model="selectedGender" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>Pour Homme (Men)</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_gender" value="Women" x-model="selectedGender" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>Pour Femme (Women)</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_gender" value="Unisex" x-model="selectedGender" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>Unisex Accord</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Price Tier -->
                            <div class="space-y-3">
                                <h3 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Price Tier</h3>
                                <div class="space-y-2 text-xs">
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_price" value="all" x-model="selectedPriceRange" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>All Prices</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_price" value="under-150k" x-model="selectedPriceRange" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>Under IDR 150.000</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_price" value="150k-300k" x-model="selectedPriceRange" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>IDR 150.000 - IDR 300.000</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 text-slate-300">
                                        <input type="radio" name="mob_price" value="over-300k" x-model="selectedPriceRange" @change="openMobileFilters = false" class="accent-luxury-gold">
                                        <span>Above IDR 300.000</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Reset Filters -->
                            <button @click="resetFilters(); openMobileFilters = false;" class="w-full py-2.5 border border-luxury-gold/30 text-xs font-bold tracking-widest uppercase text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition duration-300 rounded">
                                Reset All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
