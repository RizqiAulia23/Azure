<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<li class="<?php echo ($current_page == 'dashbord.php') ? 'active' : ''; ?>">
    <a href="dashbord.php">
        <i class="fa-solid fa-house"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="<?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>">
    <a href="profile.php">
        <i class="fa-solid fa-user"></i>
        <span>Profile</span>
    </a>
</li>
<li class="<?php echo ($current_page == 'kategori_data.php' || $current_page == 'kategori_edit.php' || $current_page == 'kategori_tambah.php') ? 'active' : ''; ?>">
    <a href="kategori_data.php">
        <i class="fa-solid fa-folder"></i>
        <span>Category</span>
    </a>
</li>
<li class="<?php echo ($current_page == 'produk_data.php' || $current_page == 'produk_edit.php' || $current_page == 'produk_tambah.php') ? 'active' : ''; ?>">
    <a href="produk_data.php">
        <i class="fa-solid fa-box"></i>
        <span>Product</span>
    </a>
</li>
<li>
    <a href="../logout.php" onclick="return confirm('yakinih mau logout kamu?')">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
    </a>
</li>