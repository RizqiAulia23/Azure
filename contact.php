<?php
    include 'config/db.php';
    include 'config/helper.php';

    $success_msg = "";
    if(isset($_POST['submit'])){
        $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

        // Insert message query matching database columns
        $insert = mysqli_query($conn, "INSERT INTO tb_masseges (massege_name, massege_email, massege_teks) VALUES (
            '$nama', 
            '$email', 
            '$pesan')");

        if($insert){
            $success_msg = "Your inquiry has been delivered successfully. Our concierge will contact you shortly.";
        } else {
            $error_msg = 'Failure: '.mysqli_error($conn);
        }
    }

    $page_title = "Contact Us - Azure Perfume";
    include 'includes/header.php';
?>

    <!-- Contact Hero Section -->
    <section class="relative py-20 bg-black overflow-hidden flex items-center justify-center border-b border-luxury-gold/15">
        <div class="absolute inset-0 bg-gradient-to-b from-luxury-navyDark/90 to-luxury-black z-0"></div>
        <div class="absolute inset-0 opacity-20 mix-blend-overlay" style="background: url('img/contact_hero.png') center/cover no-repeat;"></div>
        
        <div class="relative text-center space-y-3 z-10 max-w-2xl px-4 animate-fade-in-up">
            <span class="text-[10px] font-bold tracking-[0.35em] text-luxury-gold uppercase block">Concierge Desk</span>
            <h1 class="text-4xl sm:text-5xl font-serif text-white font-light">We'd Love to <span class="italic text-luxury-goldBright font-normal">Hear From You</span></h1>
            <p class="text-xs sm:text-sm text-slate-400 font-light leading-relaxed max-w-md mx-auto">
                Have questions regarding olfactory notes, shipping logistics, or bespoke orders? Our salon is at your service.
            </p>
        </div>
    </section>

    <!-- Main Content Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Panel: Maison Contact Information (5 columns) -->
            <div class="lg:col-span-5 space-y-8">
                <div class="glass-card rounded-lg p-8 space-y-6">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-luxury-gold uppercase block">Maison Offices</span>
                    <h2 class="text-2xl font-serif text-white font-semibold">Connect With Us</h2>
                    
                    <div class="space-y-6 text-sm">
                        <!-- Location -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-luxury-navy flex items-center justify-center border border-luxury-gold/10 text-luxury-gold text-lg flex-shrink-0">
                                <i class='bx bx-map-pin'></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white uppercase text-[10px] tracking-wider">Physical Address</h4>
                                <p class="text-slate-400 text-xs mt-1 leading-relaxed"><?php echo $a ? $a->admin_address : 'Bumi'; ?></p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-luxury-navy flex items-center justify-center border border-luxury-gold/10 text-luxury-gold text-lg flex-shrink-0">
                                <i class='bx bx-phone'></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white uppercase text-[10px] tracking-wider">Phone Hotline</h4>
                                <p class="text-slate-400 text-xs mt-1"><?php echo $a ? $a->admin_telp : ''; ?></p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-luxury-navy flex items-center justify-center border border-luxury-gold/10 text-luxury-gold text-lg flex-shrink-0">
                                <i class='bx bx-envelope'></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white uppercase text-[10px] tracking-wider">Electronic Mail</h4>
                                <p class="text-slate-400 text-xs mt-1 hover:text-luxury-gold transition"><a href="mailto:<?php echo $a ? $a->admin_email : ''; ?>"><?php echo $a ? $a->admin_email : ''; ?></a></p>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-luxury-navy flex items-center justify-center border border-luxury-gold/10 text-luxury-gold text-lg flex-shrink-0">
                                <i class='bx bxl-whatsapp'></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white uppercase text-[10px] tracking-wider">WhatsApp Direct</h4>
                                <?php
                                    $wa_clean = $a ? preg_replace('/[^0-9]/', '', $a->admin_telp) : '';
                                    if(strpos($wa_clean, '0') === 0) {
                                        $wa_clean = '62' . substr($wa_clean, 1);
                                    }
                                ?>
                                <p class="text-slate-400 text-xs mt-1 hover:text-luxury-gold transition">
                                    <a href="https://wa.me/<?php echo $wa_clean; ?>" target="_blank">Chat with a Scent Advisor</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Google Maps Card -->
                <div class="glass-card rounded-lg p-6 flex flex-col sm:flex-row items-center gap-4 border-l-4 border-l-luxury-gold">
                    <div class="text-3xl text-luxury-gold">
                        <i class='bx bxs-map-alt'></i>
                    </div>
                    <div class="flex-1 text-center sm:text-left space-y-1">
                        <h4 class="text-xs font-bold text-white uppercase tracking-wider">Navigate To Us</h4>
                        <p class="text-[11px] text-slate-400"><?php echo $a ? $a->admin_address : ''; ?></p>
                    </div>
                    <a href="https://maps.google.com/?q=<?php echo urlencode($a ? $a->admin_address : ''); ?>" target="_blank" class="px-4 py-2 border border-luxury-gold/40 hover:border-luxury-gold text-[10px] font-bold tracking-widest uppercase text-luxury-gold hover:bg-luxury-gold hover:text-luxury-black transition rounded whitespace-nowrap">
                        Open Maps
                    </a>
                </div>
            </div>
            
            <!-- Right Panel: Message Submission Form (7 columns) -->
            <div class="lg:col-span-7 contact-form-side">
                <div class="glass-card rounded-lg p-8 space-y-6 contact-form-card">
                    <div class="space-y-2">
                        <span class="text-[10px] font-bold tracking-[0.2em] text-luxury-gold uppercase block">Olfactory Inquiry</span>
                        <h2 class="text-2xl font-serif text-white font-semibold">Submit An Inquiry</h2>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            Whether you need guidance selecting a signature profile or have wholesale queries, we are excited to serve you.
                        </p>
                    </div>

                    <!-- Alert message -->
                    <?php if($success_msg): ?>
                        <div class="p-4 bg-emerald-950/60 border border-emerald-500/30 rounded text-emerald-400 text-xs flex items-start gap-3">
                            <i class='bx bx-check-circle text-lg mt-0.5'></i>
                            <span><?php echo $success_msg; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($error_msg) && $error_msg): ?>
                        <div class="p-4 bg-red-950/60 border border-red-500/30 rounded text-red-400 text-xs flex items-start gap-3">
                            <i class='bx bx-error-alt text-lg mt-0.5'></i>
                            <span><?php echo $error_msg; ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="contact.php" method="POST" class="space-y-4">
                        <!-- Full Name -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold tracking-widest uppercase text-slate-400">Full Name</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-3.5 text-slate-500"><i class="bx bx-user"></i></span>
                                <input type="text" name="nama" placeholder="Enter your full name" required class="w-full bg-luxury-black/60 border border-luxury-gold/25 rounded px-10 py-3 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-luxury-gold transition duration-300">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold tracking-widest uppercase text-slate-400">Email Address</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-3.5 text-slate-500"><i class="bx bx-envelope"></i></span>
                                <input type="email" name="email" placeholder="Enter your email address" required class="w-full bg-luxury-black/60 border border-luxury-gold/25 rounded px-10 py-3 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-luxury-gold transition duration-300">
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold tracking-widest uppercase text-slate-400">Your Message</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-3.5 text-slate-500"><i class="bx bx-pencil"></i></span>
                                <textarea name="pesan" placeholder="Write your message..." required rows="5" class="w-full bg-luxury-black/60 border border-luxury-gold/25 rounded px-10 py-3 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-luxury-gold transition duration-300"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" name="submit" class="btn-send w-full inline-flex items-center justify-center h-12 bg-gradient-to-r from-luxury-goldDark to-luxury-goldBright text-luxury-navyDark font-bold text-xs tracking-widest uppercase shadow hover:scale-[1.01] transition-transform duration-300">
                                Send Your Inquiry
                            </button>
                        </div>
                    </form>
                    
                    <div class="flex items-center justify-center gap-2 text-slate-500 text-[10px] pt-2">
                        <i class='bx bx-shield-check text-base text-luxury-gold/60'></i>
                        <span>We respect your privacy. Details are fully protected.</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- AJAX form submission intercept to support the interactive refresh -->
    <script>
        document.addEventListener('submit', function(e) {
            const form = e.target.closest('form');
            if (form) {
                e.preventDefault();
                
                const btn = form.querySelector('.btn-send');
                if (!btn) return;

                const originalBtnText = btn.innerText;
                btn.innerText = 'Transmitting Message...';
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
                    console.error('Submission error:', err);
                    form.submit(); // Fallback
                });
            }
        });
    </script>

<?php include 'includes/footer.php'; ?>