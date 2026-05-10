<?php include 'session.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
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

       <div class="sect-one">
                    <div class="desc-two">
                    <h3>Selamat datang, <span> <?php echo $d->nama ?> </span>!</h3>
                    <p>kelola data dengan aman dan efisien dari TriNova Tech</p>
                    <button onclick="window.location='../index.php'">Lihat Website <i class="fa-solid fa-angle-right"></i> </button>
                    </div>
                </div>

    </div>
</body>
</html>
