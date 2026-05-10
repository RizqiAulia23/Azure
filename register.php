<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Azure</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css?v=1.2">
</head>
<body>
    <div class="login-container">
        <!-- Left Side: Image and Welcome Text -->
        <div class="login-left">
            <div class="overlay-text">
                <h1>Create Your Account</h1>
                <div class="line-separator"></div>
                <p>Join <strong>AZURE</strong> and start your journey<br>with us today.</p>
            </div>
        </div>

        <!-- Right Side: Register Form -->
        <div class="login-right">
            <div class="form-wrapper">

                <img src="img/logo.png" alt="welcome-img" class="welcome-img">

                <form action="" method="POST">
                    <div class="input-group">
                        <label for="nama">Full Name</label>
                        <div class="input-container">
                            <i class="fas fa-user icon"></i>
                            <input type="text" name="nama" id="nama" placeholder="Enter your name" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="username">Username</label>
                        <div class="input-container">
                            <i class="fas fa-user-circle icon"></i>
                            <input type="text" name="user" id="username" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <div class="input-container">
                            <i class="fas fa-envelope icon"></i>
                            <input type="email" name="email" id="email" placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" name="pass" id="password" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="alamat">Address</label>
                        <div class="input-container">
                            <i class="fas fa-map-marker-alt icon"></i>
                            <input type="text" name="alamat" id="alamat" placeholder="Enter your address" required>
                        </div>
                    </div>




                    <div class="button-container">
                        <button type="submit" name="submit" class="btn-login">REGISTER</button>
                    </div>
                     <p class="register-link">Sudah Punya Akun? <a href="login.php">Klik di sini untuk Login</a></p>

                </form>

                <?php
                    include('db.php');
                    if(isset($_POST['submit'])){
                        $nama     = $_POST['nama'];
                        $email    = $_POST['email'];
                        $username = $_POST['user'];
                        $password = $_POST['pass'];
                        $alamat   = $_POST['alamat'];
                        
                        // Default values for fields not in the design but required by DB
                        $telpon   = "";

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
                                echo '<script>alert("Berhasil, silakan login")</script>';
                                echo '<script type="text/javascript">window.location="login.php"</script>';
                            }else{
                                echo '<script>alert("Gagal Mendaftar")</script>';
                            }
                        }
                ?>
            </div>
        </div>
    </div>
</body>
</html>