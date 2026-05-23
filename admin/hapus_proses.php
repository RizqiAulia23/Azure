<?php
include '../db.php';

if(isset($_GET['idk'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."'");
    echo '<script>window.location="kategori_data.php"</script>';
}

if(isset($_GET['idp'])){
    $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."'");
    $p = mysqli_fetch_object($produk);
    
    unlink('produk/'.$p->product_image);
    
    $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."'");
    echo '<script>window.location="produk_data.php"</script>';
}

if(isset($_GET['idm'])){
    $table_name = "tb_masseges";
    $delete = mysqli_query($conn, "DELETE FROM $table_name WHERE massege_id = '".$_GET['idm']."'");
    echo '<script>window.location="messages.php"</script>';
}
?>