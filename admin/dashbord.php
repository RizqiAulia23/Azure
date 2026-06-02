<?php
session_start();
include '../db.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."'");
$d = mysqli_fetch_object($query);
if($_SESSION['status_login'] != true){
    echo '<script type="text/javascript">window.location="../login.php";</script>';
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="warper">
        <div class="header"></div>

        <div class="sidebar">
            <div class="sidebar-title"><img src="../img/logo.png" class="welcome-img"></div>
            <ul>
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>
        <div class="section">
       <div class="sect-one">
                    <div class="desc-two">
                    <h3>Selamat datang, <span> <?php echo $d->admin_name ?> </span>!</h3>
                    <p>kelola data dengan aman dan efisien dari AZURE</p>
                    <button onclick="window.location='../index.php'">Lihat Website <i class="fa-solid fa-angle-right"></i> </button>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>
