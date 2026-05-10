<?php include ('session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Produk Data | Azure company</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar">
             <div class="sidebar-title"><img src="../img/logo.png" class="welcome-img"></div>
                <ul>
                    <?php include 'sidebar.php' ?>
                </ul>
            </div>
        </div>  

        <div class="section">
            <div class="container">
                <h5 class="card-title">Produk</h5>
                <p><a href="produk_tambah.php">Tambah produk</a></p>
                <table class="table1" width="80%">
                    <!-- list nama table -->
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Detail</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                    <!-- hubungkan database -->
                    <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING(category_id) ORDER BY product_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                    ?>

                    <!-- ambil data dari database -->
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td>Rp.<?php echo number_format($row['product_price']) ?></td>
                        <td><?php echo $row['product_description'] ?></td>

                        <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank">
                            <img src="../produk/<?php echo $row['product_image'] ?>" width="50px">
                        </a></td>
                        <td><?php echo ($row['product_status'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></td>
                        <!-- edit atau ha -->
                        <td>
                            <a href="produk_edit.php?id=<?php echo $row['product_id'] ?>">Edit</a> ||
                            <a href="hapus_proses.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }}else{ ?>
                    <tr>
                        <td colspan="3">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
</body>
</html>