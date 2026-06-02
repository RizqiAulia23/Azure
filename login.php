<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login - Azure</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css?v=1.1">
</head>
<body>
    <div class="login-container">
        <!-- Left Side: Image and Welcome Text -->
        <div class="login-left">
            <div class="overlay-text">
                <h1>Welcome Back</h1>
                <div class="line-separator"></div>
                <p>Login to continue your journey<br>with <strong>AZURE.</strong></p>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="login-right">
            <div class="form-wrapper">
                <img src="img/logo.png" alt="welcome-img" class="welcome-img">

                <form action="" method="POST">
                    <div class="input-group">
                        <label for="username">Username</label>
                        <div class="input-container">
                            <i class="fas fa-user icon"></i>
                            <input type="text" name="user" id="username" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" name="pass" id="password" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <div class="button-container">
                        <button type="submit" name="submit" class="btn-login">LOGIN</button>
                    </div>
                </form>

                <?php
                include ('db.php');
                if(isset($_POST['submit'])){
                    $username = $_POST['user'];
                    $password = $_POST['pass'];

                    $sql = mysqli_query($conn, "SELECT * FROM tb_admin 
                    WHERE username = '$username' AND password = '$password'") 
                    or die(mysqli_error());

                    if(mysqli_num_rows($sql) == 0){
                        echo "<script>alert('Username / Password Salah')</script>";
                        echo '<script type="text/javascript">window.location="login.php";</script>';
                    }else{
                        session_start();

                        $row = mysqli_fetch_assoc($sql);
                        $_SESSION['id_login'] = $row['admin_id'];
                        $_SESSION['level'] = $row['level'];
                        $_SESSION['status_login'] = true;

                        if($row['level'] == 'admin'){
                            echo "<script>alert('Login Berhasil')</script>";
                            echo '<script type="text/javascript">window.location="admin/dashbord.php";</script>';

                        }elseif($row['level'] == 'pelanggan'){
                            echo "<script>alert('Login Berhasil')</script>";
                            echo '<script type="text/javascript">window.location="user/home.php";</script>';
                        }
                        else{
                            header('location:home.php');
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>