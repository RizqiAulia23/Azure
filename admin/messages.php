<?php include ('session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Messages - Azure Admin</title>
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
            <h5 class="card-title">Data Pesan Pelanggan</h5> 
            <table class="table1" width="80%">
                <tr>
                    <th width="60px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th width="150px">Aksi</th>
                </tr>

                <?php
                    $no = 1;
                    $table_name = "tb_masseges";
                    $messages = mysqli_query($conn, "SELECT * FROM $table_name ORDER BY massege_id DESC");
                    if(mysqli_num_rows($messages) > 0){
                        while($row = mysqli_fetch_array($messages)){
                            $id = $row['massege_id'];
                            $name = $row['massege_name'];
                            $email = $row['massege_email'];
                            $text = $row['massege_teks'];
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $text ?></td>
                    <td>
                        <a href="hapus_proses.php?idm=<?php echo $id ?>" onclick="return confirm('Yakin ingin menghapus pesan ini?')">Hapus</a>
                    </td>
                </tr>
                <?php }}else{ ?>
                <tr>
                    <td colspan="5">Tidak ada data</td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
