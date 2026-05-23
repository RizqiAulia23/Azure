<?php include ('session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profil - Admin Azure</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
             <div class="sidebar-title"><img src="../img/logo.png" class="welcome-img"></div>
                <ul>
                    <?php include 'sidebar.php' ?>
                </ul>
            </div>
        </div>  

        <div class="section">
            <div class="container">
                <?php
                    // Data admin sudah diambil di session.php ke dalam variabel $user_row
                    // Kita gunakan $user_row agar lebih pasti datanya ada
                    if(!$user_row){
                        echo '<script>alert("Sesi berakhir, silakan login kembali")</script>';
                        echo '<script>window.location="../login.php"</script>';
                        exit;
                    }
                ?>
                <form id="contact" action="" method="post">
                    <h3>Profil Saya</h3>
                    <fieldset>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo $user_row['admin_name'] ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="form-control" value="<?php echo $user_row['username'] ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>No. HP</label>
                        <input type="text" name="hp" placeholder="No Hp" class="form-control" value="<?php echo $user_row['admin_telp'] ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $user_row['admin_email'] ?>" required>
                    </fieldset>
                    <fieldset>
                        <label>Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" value="<?php echo $user_row['admin_address'] ?>" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit">Ubah Profil</button>
                    </fieldset>
                </form>

                <?php 
                    if(isset($_POST['submit'])){
                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $email  = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "UPDATE tb_admin SET
                                                       admin_name = '$nama',
                                                       username = '$user',
                                                       admin_telp = '$hp',
                                                       admin_email = '$email',
                                                       admin_address = '$alamat'
                                                       WHERE admin_id = '".$_SESSION['id_login']."'");
                        if($update){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profile.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>