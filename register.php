<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Azure Perfume</title>
    <link rel="icon" type="image/png" href="img/logoweb.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
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
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" type="text/css" href="css/style.css?v=2.0">
</head>
<body class="bg-luxury-black text-slate-800 font-sans min-h-screen flex items-center justify-center p-4 sm:p-6 bg-noise">

    <!-- Auth Container Box -->
    <div class="max-w-4xl w-full h-[650px] grid grid-cols-1 md:grid-cols-2 rounded-lg overflow-hidden glass-card">
        
        <!-- Left Column: Cinematic Branding (hidden on small screens) -->
        <div class="hidden md:flex relative flex-col justify-end p-12 bg-cover bg-center" style="background-image: linear-gradient(to top, rgba(3,5,11,0.95) 30%, rgba(3,5,11,0.3) 100%), url('img/bg_login.png');">
            <div class="space-y-4">
                <span class="text-[10px] font-bold tracking-[0.3em] text-luxury-gold uppercase block">Olfactory Sanctuary</span>
                <h1 class="text-3xl font-serif text-white font-light leading-tight">Create Your Account<br>with <span class="italic text-luxury-goldBright font-normal font-serif">Azure Perfume</span></h1>
                <div class="w-8 h-[1px] bg-luxury-gold"></div>
                <p class="text-xs text-slate-300 leading-relaxed font-light">Join our exclusive circle of collectors and receive bespoke notifications on new olfactory collections.</p>
            </div>
            <!-- Absolute light overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-navyDark/20 to-transparent pointer-events-none"></div>
        </div>
        
        <!-- Right Column: Register Form -->
        <div class="flex flex-col justify-center p-8 sm:p-12 bg-white overflow-y-auto">
            <div class="space-y-5 w-full">
                <!-- Header -->
                <div class="text-center md:text-left space-y-1">
                    <img src="img/logo.png" alt="Azure Logo" class="h-8 w-auto mx-auto md:mx-0 filter brightness-90">
                    <h2 class="text-lg font-serif tracking-wider uppercase text-luxury-navyDark font-semibold pt-2">Register Patron</h2>
                    <p class="text-xs text-slate-500 font-light">Join the house of signature fragrances.</p>
                </div>
                
                <form action="register.php" method="POST" class="space-y-3">
                    <!-- Full Name -->
                    <div class="space-y-1">
                        <label for="nama" class="text-[9px] font-bold tracking-widest uppercase text-slate-500">Full Name</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-2.5 text-slate-400"><i class="bx bx-user"></i></span>
                            <input type="text" name="nama" id="nama" placeholder="Full Name" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-2.5 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="space-y-1">
                        <label for="username" class="text-[9px] font-bold tracking-widest uppercase text-slate-500">Username</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-2.5 text-slate-400"><i class="bx bx-user-circle"></i></span>
                            <input type="text" name="user" id="username" placeholder="Username" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-2.5 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-1">
                        <label for="email" class="text-[9px] font-bold tracking-widest uppercase text-slate-500">Email Address</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-2.5 text-slate-400"><i class="bx bx-envelope"></i></span>
                            <input type="email" name="email" id="email" placeholder="Email Address" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-2.5 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-1">
                        <label for="password" class="text-[9px] font-bold tracking-widest uppercase text-slate-500">Password</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-2.5 text-slate-400"><i class="bx bx-lock-alt"></i></span>
                            <input type="password" name="pass" id="password" placeholder="Password" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-2.5 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="space-y-1">
                        <label for="alamat" class="text-[9px] font-bold tracking-widest uppercase text-slate-500">Complete Address</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-2.5 text-slate-400"><i class="bx bx-map"></i></span>
                            <input type="text" name="alamat" id="alamat" placeholder="Address for delivery" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-2.5 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>
                    
                    <!-- Submit -->
                    <div class="pt-2">
                        <button type="submit" name="submit" class="w-full inline-flex items-center justify-center h-11 bg-gradient-to-r from-luxury-goldDark to-luxury-goldBright text-white font-bold text-xs tracking-widest uppercase shadow hover:scale-[1.01] active:scale-[0.99] transition duration-300">
                            Submit Registration
                        </button>
                    </div>
                </form>
                
                <!-- Footer / Login Link -->
                <div class="text-center md:text-left">
                    <p class="text-xs text-slate-400 font-light">Already a Patron? <a href="login.php" class="text-luxury-gold font-semibold hover:text-luxury-goldBright transition">Sign In here</a></p>
                </div>
                
                <!-- PHP Registration logic -->
                <?php
                    include('config/db.php');
                    if(isset($_POST['submit'])){
                        $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
                        $email    = mysqli_real_escape_string($conn, $_POST['email']);
                        $username = mysqli_real_escape_string($conn, $_POST['user']);
                        $password = mysqli_real_escape_string($conn, $_POST['pass']);
                        $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);
                        $telpon   = ""; // default column padding

                        $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                            null,
                            '".$nama."',
                            '".$username."',
                            '".$password."',
                            '".$telpon."',
                            '".$email."',
                            '".$alamat."',
                            'pelanggan'
                        )");

                        if($insert){
                            echo '<script>alert("Registration Successful! Please login to your new account.")</script>';
                            echo '<script type="text/javascript">window.location="login.php"</script>';
                        }else{
                            echo '<script>alert("Error: Registration failed. Please try again.")</script>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>