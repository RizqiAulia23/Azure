<?php
    $page_title = "Our Heritage - Azure Perfume";
    include 'config/db.php';
    include 'config/helper.php';
    include 'includes/header.php';
?>

    <!-- About Hero Section -->
    <section class="relative py-28 bg-black overflow-hidden flex items-center justify-center border-b border-luxury-gold/15">
        <div class="absolute inset-0 bg-gradient-to-b from-luxury-navyDark/90 to-luxury-black z-0"></div>
        <div class="absolute inset-0 opacity-30 mix-blend-overlay" style="background: url('img/banner_about.png') center/cover no-repeat;"></div>
        
        <div class="relative text-center space-y-4 z-10 max-w-3xl px-4 animate-fade-in-up">
            <span class="text-xs font-bold tracking-[0.35em] text-luxury-gold uppercase block">The Azure Philosophy</span>
            <h1 class="text-4xl sm:text-6xl font-serif text-white font-light leading-tight">The Essence of Elegance<br>in Every <span class="italic text-luxury-goldBright font-normal">Scent Accord</span></h1>
            <div class="w-16 h-[1px] bg-luxury-gold mx-auto my-6"></div>
            <p class="text-sm sm:text-base text-slate-300 font-light leading-relaxed max-w-xl mx-auto">
                AZURE PERFUME is more than an olfactory blend. It is a story compiled in liquid form, a distinct statement of identity, and an enduring memory.
            </p>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-luxury-black bg-noise">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Value item 1 -->
            <div class="glass-card rounded-lg p-8 text-center space-y-4 group hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-luxury-navy rounded-full flex items-center justify-center mx-auto border border-luxury-gold/20 text-luxury-gold text-xl">
                    <i class='bx bx-leaf'></i>
                </div>
                <h4 class="text-base font-serif font-bold text-white uppercase tracking-wider">Precious Materials</h4>
                <p class="text-xs text-slate-400 leading-relaxed font-light">We source organic botanicals and raw oils directly from the fields of Grasse and Tuscany.</p>
            </div>
            
            <!-- Value item 2 -->
            <div class="glass-card rounded-lg p-8 text-center space-y-4 group hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-luxury-navy rounded-full flex items-center justify-center mx-auto border border-luxury-gold/20 text-luxury-gold text-xl">
                    <i class='bx bx-time-five'></i>
                </div>
                <h4 class="text-base font-serif font-bold text-white uppercase tracking-wider">Enduring Presence</h4>
                <p class="text-xs text-slate-400 leading-relaxed font-light">Crafted in Extrait concentrations, our formulas ensure lingering sillage and 8+ hours of wear.</p>
            </div>
            
            <!-- Value item 3 -->
            <div class="glass-card rounded-lg p-8 text-center space-y-4 group hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-luxury-navy rounded-full flex items-center justify-center mx-auto border border-luxury-gold/20 text-luxury-gold text-xl">
                    <i class='bx bx-spray-can'></i>
                </div>
                <h4 class="text-base font-serif font-bold text-white uppercase tracking-wider">Artisanal Design</h4>
                <p class="text-xs text-slate-400 leading-relaxed font-light">Each signature heavy-glass flacon represents absolute geometric harmony and minimalist luxury.</p>
            </div>
            
            <!-- Value item 4 -->
            <div class="glass-card rounded-lg p-8 text-center space-y-4 group hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-luxury-navy rounded-full flex items-center justify-center mx-auto border border-luxury-gold/20 text-luxury-gold text-xl">
                    <i class='bx bx-check-shield'></i>
                </div>
                <h4 class="text-base font-serif font-bold text-white uppercase tracking-wider">Unrivaled Quality</h4>
                <p class="text-xs text-slate-400 leading-relaxed font-light">Every composition undergoes rigorous olfactory testing, certified to ensure chemical purity.</p>
            </div>
            
        </div>
    </section>

    <!-- Narrative & History Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-luxury-navyDark/35 border-t border-b border-luxury-gold/10">
        <div class="max-w-7xl mx-auto lg:grid lg:grid-cols-2 lg:gap-16 items-center">
            
            <!-- Text Narrative -->
            <div class="space-y-6">
                <span class="text-xs font-bold tracking-[0.25em] text-luxury-gold uppercase block">The Journey</span>
                <h2 class="text-3xl sm:text-5xl font-serif text-white leading-tight font-light">Composed with Passion, <br><span class="italic text-luxury-goldBright font-normal">Inspired by Heritage.</span></h2>
                <div class="w-12 h-[1px] bg-luxury-gold my-4"></div>
                <p class="text-sm text-slate-300 leading-relaxed font-light">
                    Founded in the summer of 2024, AZURE PERFUME was born out of a desire to break the boundaries of commercial scent profile structures. We believe fragrance is a highly personal signature - a silent introduction that tells a story before you even speak.
                </p>
                <p class="text-sm text-slate-400 leading-relaxed font-light">
                    We select our elements with patience. Saffron from Cashmere, patchouli from Sumatra, and fresh bergamot from Calabria. These materials undergo slow aging processes to align and mature their top, heart, and base registers into a flawless olfactory symphony.
                </p>
            </div>
            
            <!-- Milestones Grid -->
            <div class="mt-12 lg:mt-0 grid grid-cols-2 gap-6">
                
                <div class="glass-card rounded-lg p-6 space-y-2 border-l-4 border-l-luxury-gold">
                    <h3 class="text-2xl font-serif text-white font-bold">2024</h3>
                    <p class="text-[10px] font-bold tracking-widest text-luxury-gold uppercase">Maison Founded</p>
                    <p class="text-xs text-slate-400 font-light">Launched our initial collection in Jakarta.</p>
                </div>
                
                <div class="glass-card rounded-lg p-6 space-y-2 border-l-4 border-l-luxury-gold">
                    <h3 class="text-2xl font-serif text-white font-bold">25+</h3>
                    <p class="text-[10px] font-bold tracking-widest text-luxury-gold uppercase">Unique Accords</p>
                    <p class="text-xs text-slate-400 font-light">Formulas spanning woody, floral, and fresh profiles.</p>
                </div>
                
                <div class="glass-card rounded-lg p-6 space-y-2 border-l-4 border-l-luxury-gold">
                    <h3 class="text-2xl font-serif text-white font-bold">10K+</h3>
                    <p class="text-[10px] font-bold tracking-widest text-luxury-gold uppercase">Loyal Patrons</p>
                    <p class="text-xs text-slate-400 font-light">Patrons who choose Azure as their signature identity.</p>
                </div>
                
                <div class="glass-card rounded-lg p-6 space-y-2 border-l-4 border-l-luxury-gold">
                    <h3 class="text-2xl font-serif text-white font-bold">5+</h3>
                    <p class="text-[10px] font-bold tracking-widest text-luxury-gold uppercase">Global Capitals</p>
                    <p class="text-xs text-slate-400 font-light">Mailing collections worldwide with premium safety wrapping.</p>
                </div>
                
            </div>
            
        </div>
    </section>

<?php include 'includes/footer.php'; ?>