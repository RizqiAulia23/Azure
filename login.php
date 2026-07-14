<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Azure Perfume</title>
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
<body class="bg-luxury-black text-slate-800 font-sans h-screen flex items-center justify-center p-4 sm:p-6 bg-noise">

    <!-- Auth Container Box -->
    <div class="max-w-4xl w-full h-[600px] grid grid-cols-1 md:grid-cols-2 rounded-lg overflow-hidden glass-card">
        
        <!-- Left Column: Cinematic Branding (hidden on small screens) -->
        <div class="hidden md:flex relative flex-col justify-end p-12 bg-cover bg-center" style="background-image: linear-gradient(to top, rgba(3,5,11,0.95) 30%, rgba(3,5,11,0.3) 100%), url('img/bg_login.png');">
            <div class="space-y-4">
                <span class="text-[10px] font-bold tracking-[0.3em] text-luxury-gold uppercase block">Olfactory Sanctuary</span>
                <h1 class="text-3xl font-serif text-white font-light leading-tight">Welcome Back to<br><span class="italic text-luxury-goldBright font-normal font-serif">Maison D'Azure</span></h1>
                <div class="w-8 h-[1px] bg-luxury-gold"></div>
                <p class="text-xs text-slate-300 leading-relaxed font-light">Access your profile and resume your curated journey of luxury scent discovery.</p>
            </div>
            <!-- Absolute light overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-navyDark/20 to-transparent pointer-events-none"></div>
        </div>
        
        <!-- Right Column: Login Form -->
        <div class="flex flex-col justify-center p-8 sm:p-12 bg-white">
            <div class="space-y-6 w-full">
                <!-- Header -->
                <div class="text-center md:text-left space-y-2">
                    <img src="img/logo.png" alt="Azure Logo" class="h-8 w-auto mx-auto md:mx-0 filter brightness-90">
                    <h2 class="text-lg font-serif tracking-wider uppercase text-luxury-navyDark font-semibold pt-3">Sign In</h2>
                    <p class="text-xs text-slate-500 font-light">Please log in to continue your journey.</p>
                </div>
                
                <form action="login.php" method="POST" class="space-y-4">
                    <!-- Username -->
                    <div class="space-y-1">
                        <label for="username" class="text-[10px] font-bold tracking-widest uppercase text-slate-500">Username</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-3.5 text-slate-400"><i class="bx bx-user"></i></span>
                            <input type="text" name="user" id="username" placeholder="Username" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-3 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>
                    
                    <!-- Password -->
                    <div class="space-y-1">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-[10px] font-bold tracking-widest uppercase text-slate-500">Password</label>
                        </div>
                        <div class="relative">
                            <span class="absolute left-3.5 top-3.5 text-slate-400"><i class="bx bx-lock-alt"></i></span>
                            <input type="password" name="pass" id="password" placeholder="Password" required class="w-full bg-slate-50 border border-slate-200 rounded px-10 py-3 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-luxury-gold transition duration-300">
                        </div>
                    </div>
                    
                    <!-- Submit -->
                    <div class="pt-2">
                        <button type="submit" name="submit" class="w-full inline-flex items-center justify-center h-12 bg-gradient-to-r from-luxury-goldDark to-luxury-goldBright text-white font-bold text-xs tracking-widest uppercase shadow hover:scale-[1.01] active:scale-[0.99] transition duration-300">
                            Enter Salon
                        </button>
                    </div>
                </form>
                
                <!-- Footer / Register Link -->
                <div class="text-center md:text-left pt-2">
                    <p class="text-xs text-slate-400 font-light">New to Azure? <a href="register.php" class="text-luxury-gold font-semibold hover:text-luxury-goldBright transition">Create an Account</a></p>
                </div>
                
                <!-- PHP Validation handler -->
                <?php
                include ('config/db.php');
                if(isset($_POST['submit'])){
                    $username = mysqli_real_escape_string($conn, $_POST['user']);
                    $password = mysqli_real_escape_string($conn, $_POST['pass']);

                    $sql = mysqli_query($conn, "SELECT * FROM tb_admin 
                    WHERE username = '$username' AND password = '$password'") 
                    or die(mysqli_error($conn));

                    if(mysqli_num_rows($sql) == 0){
                        echo "<script>alert('Error: Invalid Username / Password.')</script>";
                        echo '<script type="text/javascript">window.location="login.php";</script>';
                    }else{
                        $row = mysqli_fetch_assoc($sql);
                        $_SESSION['id_login'] = $row['admin_id'];
                        $_SESSION['level'] = $row['level'];
                        $_SESSION['status_login'] = true;

                        if($row['level'] == 'admin'){
                            echo "<script>alert('Welcome Admin.')</script>";
                            echo '<script type="text/javascript">window.location="admin/dashbord.php";</script>';
                        }elseif($row['level'] == 'pelanggan'){
                            echo "<script>alert('Welcome Back, " . addslashes($row['admin_name']) . ".')</script>";
                            echo '<script type="text/javascript">window.location="index.php";</script>'; // Redirecting to main shop home instead of dummy home
                        }else{
                            header('location:index.php');
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>