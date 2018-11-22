<?php
    require_once('koneksi.php');
    session_start();
    if (!isset($_SESSION['username'])) {?>
        <script>window.location = 'login.php?pesan=belum-login';</script>
        <?php
    }

    $id     = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM inventory_table WHERE id=$id");

    if( $delete ) { ?>
        <!-- Refresh halaman dengan js -->
        <script>window.location = 'admin.php';</script>
        <?php
    }
    
?>