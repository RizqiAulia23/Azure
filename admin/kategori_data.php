<?php include ('session.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman data kategori</title>
      <link rel="stylesheet" href="../css/styleadmin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
         <div class="wrapper">
        <div class="sidebar">
             <div class="sidebar-title"><img src="../img/logo.png" class="welcome-img"></div>
                <ul>
                    <?php include 'sidebar.php' ?>
                </ul>
            </div>
        </div>  


        <div class="section">
            <h5 class="card-title">Data Kategori</h5> 
            <p><a href="kategori_tambah.php">tambah data</a></p>
            <table class="table1"width="80%">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>

                <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");                
                    if(mysqli_num_rows($kategori) > 0)
                    while($row = mysqli_fetch_array($kategori)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td>
                        <a href="kategori_edit.php?id=<?php echo $row['category_id']; ?>">Edit</a> |
                        <a href="hapus_proses.php?idk=<?php echo $row['category_id']; ?>" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
                <?php }else { ?>
                    <tr>
                        <td colspan="3">Tidak ada data</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        
    </div>
</body>
</html>