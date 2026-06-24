<?php
// Footers can share the same database connections and contact objects ($a)
?>
    <!-- Footer Section -->
    <footer class="bg-luxury-navyDark border-t border-luxury-gold/10 text-slate-400 py-16 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            
            <!-- Brand Column -->
            <div class="space-y-4">
                <img src="img/logo.png" alt="Azure Logo" class="h-10 w-auto filter brightness-110">
                <p class="text-sm leading-relaxed text-slate-400">
                    Artisanal fragrances crafted with precious botanicals and rare oils. Designed to leave a timeless impression of luxury, strength, and sophistication.
                </p>
                <div class="flex items-center space-x-4 pt-2">
                    <a href="https://www.instagram.com/" class="text-slate-400 hover:text-luxury-gold transition-colors duration-300"><i class='bx bxl-instagram text-xl'></i></a>
                    <a href="https://twitter.com/" class="text-slate-400 hover:text-luxury-gold transition-colors duration-300"><i class='bx bxl-twitter text-xl'></i></a>
                    <a href="https://www.facebook.com/" class="text-slate-400 hover:text-luxury-gold transition-colors duration-300"><i class='bx bxl-facebook text-xl'></i></a>
                    <a href="https://www.youtube.com/" class="text-slate-400 hover:text-luxury-gold transition-colors duration-300"><i class='bx bxl-youtube text-xl'></i></a>
                </div>
            </div>
            
            <!-- Menu Column -->
            <div>
                <h4 class="text-sm font-semibold tracking-widest text-white uppercase mb-6 font-serif">Store Menu</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="index.php" class="hover:text-luxury-gold transition-colors duration-300">Home Base</a></li>
                    <li><a href="produk.php" class="hover:text-luxury-gold transition-colors duration-300">Fragrance Catalog</a></li>
                    <li><a href="about.php" class="hover:text-luxury-gold transition-colors duration-300">Our Heritage</a></li>
                    <li><a href="contact.php" class="hover:text-luxury-gold transition-colors duration-300">Get In Touch</a></li>
                </ul>
            </div>
            
            <!-- Customer Care Column -->
            <div>
                <h4 class="text-sm font-semibold tracking-widest text-white uppercase mb-6 font-serif">Customer Care</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="contact.php" class="hover:text-luxury-gold transition-colors duration-300">Shipping & Returns</a></li>
                    <li><a href="contact.php" class="hover:text-luxury-gold transition-colors duration-300">Scent Consultation</a></li>
                    <li><a href="contact.php" class="hover:text-luxury-gold transition-colors duration-300">Product Authenticity</a></li>
                    <li><a href="contact.php" class="hover:text-luxury-gold transition-colors duration-300">Privacy Policy</a></li>
                </ul>
            </div>
            
            <!-- Contact Column -->
            <div>
                <h4 class="text-sm font-semibold tracking-widest text-white uppercase mb-6 font-serif">Maison Contacts</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <i class='bx bx-map text-lg text-luxury-gold mt-0.5'></i>
                        <span><?php echo $a ? $a->admin_address : 'Bumi'; ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class='bx bx-phone text-lg text-luxury-gold'></i>
                        <a href="https://wa.me/<?php echo $a ? preg_replace('/[^0-9]/', '', $a->admin_telp) : ''; ?>" class="hover:text-luxury-gold transition-colors duration-300"><?php echo $a ? $a->admin_telp : ''; ?></a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class='bx bx-envelope text-lg text-luxury-gold'></i>
                        <a href="mailto:<?php echo $a ? $a->admin_email : ''; ?>" class="hover:text-luxury-gold transition-colors duration-300"><?php echo $a ? $a->admin_email : ''; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom Section -->
        <div class="max-w-7xl mx-auto border-t border-luxury-gold/10 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <p class="text-xs text-slate-500">
                &copy; <?php echo date('Y'); ?> AZURE PERFUME. All rights reserved. Crafted for luxury.
            </p>
            <!-- Payment Badges -->
            <div class="flex items-center gap-3 text-slate-500 text-2xl">
                <i class="fa-brands fa-cc-visa hover:text-white transition-colors"></i>
                <i class="fa-brands fa-cc-mastercard hover:text-white transition-colors"></i>
                <i class="fa-brands fa-cc-amex hover:text-white transition-colors"></i>
                <i class="fa-brands fa-cc-paypal hover:text-white transition-colors"></i>
                <i class="fa-solid fa-money-bill-transfer text-lg hover:text-white transition-colors" title="Bank Transfer"></i>
            </div>
        </div>
    </footer>

    <!-- ================= SHOPPING CART DRAWER ================= -->
    <div x-show="openCartDrawer" 
         class="fixed inset-0 overflow-hidden z-[100]" 
         aria-labelledby="slide-over-title" 
         role="dialog" 
         aria-modal="true" 
         x-cloak>
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background Overlay -->
            <div x-show="openCartDrawer"
                 x-transition:enter="ease-in-out duration-500"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in-out duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="openCartDrawer = false"
                 class="absolute inset-0 bg-luxury-black/80 backdrop-blur-sm transition-opacity" 
                 aria-hidden="true"></div>

            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <!-- Slide-over Panel -->
                <div x-show="openCartDrawer"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="pointer-events-auto w-screen max-w-md">
                    
                    <div class="flex h-full flex-col overflow-y-scroll bg-luxury-navyLight shadow-2xl border-l border-luxury-gold/15">
                        
                        <!-- Drawer Header -->
                        <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                            <div class="flex items-start justify-between border-b border-luxury-gold/10 pb-4">
                                <h2 class="text-lg font-serif font-semibold tracking-wider text-white uppercase" id="slide-over-title">Your Scent Bag</h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button @click="openCartDrawer = false" type="button" class="relative -m-2 p-2 text-slate-400 hover:text-luxury-gold transition-colors">
                                        <span class="sr-only">Close panel</span>
                                        <i class="bx bx-x text-2xl"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Items List -->
                            <div class="mt-8">
                                <div class="flow-root">
                                    <template x-if="cart.length === 0">
                                        <div class="flex flex-col items-center justify-center py-16 text-center">
                                            <i class="bx bx-shopping-bag text-5xl text-slate-600 mb-4"></i>
                                            <p class="text-sm text-slate-400 font-medium">Your shopping bag is empty.</p>
                                            <a href="produk.php" @click="openCartDrawer = false" class="mt-4 inline-flex items-center text-xs font-bold tracking-widest uppercase text-luxury-gold hover:text-luxury-goldBright">Explore Scents <i class="bx bx-right-arrow-alt ml-1"></i></a>
                                        </div>
                                    </template>
                                    
                                    <ul role="list" class="-my-6 divide-y divide-luxury-gold/5">
                                        <template x-for="item in cart" :key="item.id">
                                            <li class="flex py-6">
                                                <!-- Image -->
                                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-luxury-gold/10 bg-luxury-navy/40">
                                                    <img :src="'produk/' + item.image" :alt="item.name" class="h-full w-full object-cover object-center">
                                                </div>

                                                <!-- Info -->
                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div class="flex justify-between text-sm font-medium text-white">
                                                            <h3 class="font-serif tracking-wide" x-text="item.name"></h3>
                                                            <p class="ml-4 text-luxury-gold font-semibold text-xs" x-text="formatIDR(item.price * item.quantity)"></p>
                                                        </div>
                                                        <p class="mt-1 text-xs text-slate-400" x-text="item.family || 'Fragrance'"></p>
                                                    </div>
                                                    
                                                    <!-- Quantity Selector & Actions -->
                                                    <div class="flex flex-1 items-end justify-between text-xs">
                                                        <div class="flex items-center border border-luxury-gold/20 rounded bg-luxury-navy">
                                                            <button @click="updateQuantity(item.id, -1)" class="px-2 py-1 text-slate-400 hover:text-luxury-gold transition-colors">-</button>
                                                            <span class="px-2 font-semibold text-white" x-text="item.quantity"></span>
                                                            <button @click="updateQuantity(item.id, 1)" class="px-2 py-1 text-slate-400 hover:text-luxury-gold transition-colors">+</button>
                                                        </div>

                                                        <div class="flex">
                                                            <button @click="removeFromCart(item.id)" type="button" class="font-medium text-red-400 hover:text-red-300 transition-colors">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Drawer Footer & Checkout Controls -->
                        <div class="border-t border-luxury-gold/10 py-6 px-4 sm:px-6 bg-luxury-navyDark/40" x-show="cart.length > 0" x-cloak>
                            <div class="flex justify-between text-base font-medium text-white pb-4">
                                <p class="font-serif">Subtotal</p>
                                <p class="text-luxury-gold font-bold" x-text="formatIDR(cartSubtotal())"></p>
                            </div>
                            <p class="text-[11px] text-slate-500 mb-4">Tax and shipping will be calculated during order finalization.</p>
                            
                            <!-- Checkout Toggle / Form -->
                            <div x-data="{ showCheckoutForm: false }" class="space-y-4">
                                <button x-show="!showCheckoutForm" 
                                        @click="showCheckoutForm = true" 
                                        type="button" 
                                        class="flex w-full items-center justify-center rounded-md border border-transparent bg-gradient-to-r from-luxury-goldDark to-luxury-goldBright px-6 py-3 text-sm font-bold tracking-widest uppercase text-luxury-navyDark shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                                    Proceed To Checkout
                                </button>
                                
                                <div x-show="showCheckoutForm" x-transition class="space-y-3 border-t border-luxury-gold/5 pt-4">
                                    <h4 class="text-xs font-bold tracking-widest text-luxury-gold uppercase font-serif">Delivery Credentials</h4>
                                    <div>
                                        <input type="text" x-model="checkoutName" placeholder="Recipient Full Name" class="w-full bg-luxury-navy border border-luxury-gold/20 rounded px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-luxury-gold transition">
                                    </div>
                                    <div>
                                        <textarea x-model="checkoutAddress" placeholder="Complete Delivery Address" rows="3" class="w-full bg-luxury-navy border border-luxury-gold/20 rounded px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-luxury-gold transition"></textarea>
                                    </div>
                                    <div class="flex gap-2">
                                        <button @click="showCheckoutForm = false" type="button" class="w-1/3 border border-luxury-gold/20 rounded px-3 py-2 text-xs font-semibold text-slate-400 hover:text-white transition">Back</button>
                                        <button @click="checkoutWhatsApp('<?php echo $a ? $a->admin_telp : ''; ?>')" type="button" class="w-2/3 bg-emerald-600 hover:bg-emerald-500 rounded px-3 py-2 text-xs font-bold uppercase tracking-wider text-white shadow transition-all duration-300 flex items-center justify-center gap-1.5">
                                            <i class="fa-brands fa-whatsapp text-sm"></i> Order via WA
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-center text-center text-xs text-slate-500">
                                <p>
                                    or
                                    <button @click="openCartDrawer = false" type="button" class="font-medium text-luxury-gold hover:text-luxury-goldBright transition-colors ml-1">
                                        Continue Shopping
                                        <span aria-hidden="true"> &rarr;</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= SCENT BAG TOAST NOTIFICATION ================= -->
    <div class="fixed bottom-5 right-5 z-[200] max-w-sm w-full bg-luxury-navyLight border border-luxury-gold/30 rounded-lg shadow-2xl overflow-hidden pointer-events-auto transform transition duration-500"
         x-show="toast.visible"
         x-transition:enter="translate-y-10 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="translate-y-2 opacity-100"
         x-transition:leave-end="translate-y-10 opacity-0"
         x-cloak>
        <div class="p-4 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <i class="bx bx-check-circle text-2xl text-luxury-gold"></i>
                <div class="text-xs">
                    <p class="font-serif font-bold text-white tracking-wide uppercase">Signature Added</p>
                    <p class="text-slate-400 mt-0.5" x-text="toast.message"></p>
                </div>
            </div>
            <button @click="toast.visible = false" class="text-slate-400 hover:text-white">
                <i class="bx bx-x text-lg"></i>
            </button>
        </div>
        <div class="h-[2px] bg-luxury-gold animate-[shimmer_2s_infinite]"></div>
    </div>

    <!-- ================= GLOBAL CART CONTROLLER SCRIPT (LocalStorage) ================= -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cartSystem', () => ({
                openCartDrawer: false,
                openMobileMenu: false,
                cart: [],
                checkoutName: '',
                checkoutAddress: '',
                toast: {
                    visible: false,
                    message: ''
                },
                init() {
                    const savedCart = localStorage.getItem('azure_perfume_cart');
                    if (savedCart) {
                        try {
                            this.cart = JSON.parse(savedCart);
                        } catch (e) {
                            this.cart = [];
                        }
                    }
                },
                saveCart() {
                    localStorage.setItem('azure_perfume_cart', JSON.stringify(this.cart));
                },
                addToCart(id, name, price, image, family = 'Luxury Fragrance') {
                    const existingItem = this.cart.find(item => item.id === id);
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        this.cart.push({
                            id: id,
                            name: name,
                            price: price,
                            image: image,
                            family: family,
                            quantity: 1
                        });
                    }
                    this.saveCart();
                    this.showToast(`${name} has been added to your scent bag.`);
                },
                removeFromCart(id) {
                    this.cart = this.cart.filter(item => item.id !== id);
                    this.saveCart();
                },
                updateQuantity(id, delta) {
                    const item = this.cart.find(item => item.id === id);
                    if (item) {
                        item.quantity += delta;
                        if (item.quantity <= 0) {
                            this.removeFromCart(id);
                        } else {
                            this.saveCart();
                        }
                    }
                },
                cartItemsCount() {
                    return this.cart.reduce((sum, item) => sum + item.quantity, 0);
                },
                cartSubtotal() {
                    return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                },
                formatIDR(price) {
                    return 'IDR ' + new Intl.NumberFormat('id-ID').format(price);
                },
                showToast(msg) {
                    this.toast.message = msg;
                    this.toast.visible = true;
                    setTimeout(() => {
                        this.toast.visible = false;
                    }, 4000);
                },
                checkoutWhatsApp(adminTelp) {
                    if (!this.checkoutName.trim() || !this.checkoutAddress.trim()) {
                        alert('Please fill out the recipient credentials for delivery.');
                        return;
                    }
                    
                    // Format the phone number
                    let cleanPhone = adminTelp.replace(/[^0-9]/g, '');
                    if (cleanPhone.startsWith('0')) {
                        cleanPhone = '62' + cleanPhone.slice(1);
                    }
                    
                    // Construct order text
                    let orderText = `*NEW AZURE PERFUME ORDER*\n`;
                    orderText += `-----------------------------\n`;
                    orderText += `*Name:* ${this.checkoutName}\n`;
                    orderText += `*Address:* ${this.checkoutAddress}\n\n`;
                    orderText += `*Order Items:*\n`;
                    
                    this.cart.forEach((item, idx) => {
                        orderText += `${idx + 1}. ${item.name} (${item.quantity}x) - ${this.formatIDR(item.price * item.quantity)}\n`;
                    });
                    
                    orderText += `-----------------------------\n`;
                    orderText += `*Subtotal:* ${this.formatIDR(this.cartSubtotal())}\n\n`;
                    orderText += `Thank you! Please confirm my order.`;
                    
                    const waUrl = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(orderText)}`;
                    
                    // Clear cart upon checkout
                    this.cart = [];
                    this.saveCart();
                    this.openCartDrawer = false;
                    this.checkoutName = '';
                    this.checkoutAddress = '';
                    
                    window.open(waUrl, '_blank');
                }
            }));
        });

        // Sticky Navbar background adjustment on scroll
        window.addEventListener('scroll', () => {
            const header = document.getElementById('mainHeader');
            if (window.scrollY > 50) {
                header.classList.add('bg-luxury-navyDark/95');
                header.classList.remove('bg-luxury-navyDark/85');
            } else {
                header.classList.add('bg-luxury-navyDark/85');
                header.classList.remove('bg-luxury-navyDark/95');
            }
        });
    </script>
</body>
</html>
