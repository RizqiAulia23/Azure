<?php include ('session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Tambah Produk</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                <!-- hubungkan ke login database -->
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."' ");
                    $d = mysqli_fetch_object($query);
                ?>
                <!-- perintah post ke database -->
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tambah Data Produk</h3>

                    <!-- input -->
                    <fieldset>
                        <!-- kategori -->
                        <fieldset>
                            <label for="">Nama kategori</label>
                            <select name="kategori" class="form-control" id="" required>
                                <option value="" hidden>Pilih</option>
                                <!-- input database -->
                                <?php
                                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                    while($r = mysqli_fetch_array($kategori)){
                                ?>
                                    <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </fieldset>

                        <fieldset>
                            <label>Nama Produk</label>
                            <input type="text" name="product_name" placeholder="Nama Produk" class="form-control" required>
                        </fieldset>
                        <fieldset>
                            <label>Harga</label>
                            <input type="text" name="product_price" placeholder="Harga" class="form-control" required>
                        </fieldset>
                        <fieldset>
                            <label>Detail</label>
                            <input type="text" name="product_detail" placeholder="Deskripsi" class="form-control" required>
                        </fieldset>
                        <fieldset>
                            <label>Gambar</label>
                            <input type="file" name="product_image" class="form-control" required>
                        </fieldset>
                        <fieldset>
                            <label>Status</label>
                            <select name="product_status" class="form-control" required>
                                <option value="" hidden>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </fieldset>

                        <!-- tombol sumbit -->
                        <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Tambah</button>
                        </fieldset>

                    </fieldset>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        // print data dari form
                        $kategori = $_POST['kategori'];
                        $product_name = $_POST['product_name'];
                        $product_price = $_POST['product_price'];
                        $product_detail = $_POST['product_detail'];
                        $product_det = $_POST['product_detail'];
                        $product_status = $_POST['product_status'];

                        // upload gambar
                        $filename = $_FILES['product_image']['name'];
                        $tmp_name = $_FILES['product_image']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        // menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // validasi data dan upload 
                        if(in_array($type2, $tipe_diizinkan)){
                            move_uploaded_file($tmp_name, '../produk/'.$filename);
                            echo '<script>alert("File berhasil diupload")</script>';
                        } else {
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        }

                        $insert = mysqli_query($conn, "INSERT INTO tb_product (category_id, product_name, product_price, product_description, product_image, product_status)
                        VALUES 
                        ('$kategori', '$product_name', '$product_price', '$product_detail', '$filename', '$product_status')");

                    if($insert){
                        echo '<script>alert("Tambah data berhasil")</script>';
                        echo '<script>window.location="produk_data.php"</script>';
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