<?php

    require_once('koneksi.php');
    session_start();
    if (!isset($_SESSION['username'])) {?>
        <script>window.location = 'login.php?pesan=belum-login';</script>
        <?php
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>

    <!-- navbar & header -->

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin.php">TokoNext</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="about.php">About</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li><a class="" href="logout.php"><b>Logout</b></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <br><br><br><br>

    <div class="container">

        <div class="row jumbotron">
            <h3>Selamat datang <b><i><?php echo $_SESSION['username']; ?></b></i></h3>
        </div>
        <center>
        <div class="row">
            
            <div class="col-lg-4 hvr-bounce-in" data-toggle="modal" data-target="#tambah">
            <div class="card" style="width: 25rem; padding:20px;">
                <img class="card-img-top" src="assets/img/plus.png" alt="Card image cap">
                <div class="card-body">
                    <h4>Tambah Item</h4>
                    <p class="card-text">Menambah item barang yang akan dijual.</p>
                    <a href="#" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            </div>

            <div class="col-lg-4 hvr-bounce-in" data-toggle="modal" data-target="#lihat">
            <div class="card" style="width: 25rem; padding:20px;">
                <img class="card-img-top" src="assets/img/eye.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Lihat Item</h4>
                    <p class="card-text">Melihat item barang yang ditambahkan.</p>
                    <a href="#" class="btn btn-primary">Lihat</a>
                </div>
            </div>
            </div>

            <div class="col-lg-4 hvr-bounce-in" data-toggle="modal" data-target="#cek">
            <div class="card" style="width: 25rem; padding:20px;">
                <img class="card-img-top" src="assets/img/date.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Cek Tanggal Item</h4>
                    <p class="card-text">Mengecek tanggal item / barang ditambahkan.</p>
                    <a href="#" class="btn btn-primary">Cek Tanggal</a>
                </div>
            </div>
            </div>

        </div>
        <!-- penutup row card -->
        </center>

        <br><hr>

        
    </div> 
    <!-- Penutup container -->

    <!-- Modal Insert -->
        <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Item</h4>
            </div>
            <div class="modal-body">
                <!-- Body Modal -->
                <form action="" method="POST" enctype="multipart/form-data">    
                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            <label for="item_name">Nama Barang</label>
                            <input type="text" name="item_name" placeholder="Nama Item / Barang" class="form-control" required>
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" name="price" placeholder="Harga" class="form-control" required>
                            <small class="danger">* tanpa Rp</small>
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            <label for="price">Quantity</label>
                            <input type="text" name="quantity" placeholder="Quantity" class="form-control" required>                            
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" name="image">
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">                            
                            <input type="submit" value="SUBMIT" class="btn btn-primary" name="insert">
                        </div> 
                        </div> 
                    </div>

                </form>
    
    <!-- Logic submit -->
    <?php
        if( isset($_POST['insert']) ) {
            $item_name  = $_POST['item_name'];
            $price      = $_POST['price'];
            $quantity   = $_POST['quantity'];

            $dirupload  = "assets/file/";
            $nama       = $_FILES['image']['name'];
            $nama_temp  = $_FILES['image']['tmp_name'];
            
            move_uploaded_file($nama_temp, $dirupload.$nama);
            
           

            $query      = "INSERT INTO inventory_table(item_name, price, quantity, image) 
                            VALUES ('$item_name', '$price', '$quantity', '$nama')";
            
            $insert     = mysqli_query($mysqli, $query);

            //jika insert berhasil
            if( $insert ) { ?>
                <!-- Refresh halaman dengan js -->
                <script>window.location = 'admin.php';</script>
                <?php
            }
            

        }
    ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>

        </div>
        </div>
        <!-- penutup modal -->


        <!-- Modal lihat -->
        <div id="lihat" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lihat Item</h4>
            </div>
            <div class="modal-body">
                <!-- Body Modal -->
                
                 <!-- membuat table -->
                <table border="1" class="table">

                    <tr>
                        <th class="text-center">No.</th><th class="text-center">Nama Item</th><th class="text-center">Harga</th><th class="text-center">Quantity</th><th class="text-center">Tindakan</th>
                    </tr>
                    <!-- Kode php -->
                    <?php
                        
                        $result = mysqli_query($mysqli, "SELECT * FROM inventory_table");

                        $no = 1;
                        
                        while( $user_data = mysqli_fetch_object($result)) {
                            echo 
                                "<tr>
                                    <td class='text-center'>".$no++."</td>
                                    <td>".$user_data->item_name."</td>
                                    <td class='text-right'>".$user_data->price."</td>
                                    <td class='text-center'>".$user_data->quantity."</td>
                                    <td class='text-center'><a style='font-weight:bold;'href='edit.php?id=$user_data->id'><button class='btn btn-primary'>Edit</button></a> | <a style='color:white; font-weight:bold;'href='delete.php?id=$user_data->id'><button style='background-color:red; color:white;' class='btn'>Delete</button></a></td>
                                </tr>";                                
                        }
                    ?>

                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>

        </div>
        </div>
        <!-- penutup modal -->        


        <!-- Modal Cek -->
        <div id="cek" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cek Tanggal</h4>
            </div>
            <div class="modal-body">
                <!-- Body Modal -->
                
                 <!-- membuat table -->
                <table border="1" class="table">

                    <tr>
                        <th class="text-center">No.</th><th class="text-center">Nama Item</th><th class="text-center">Tanggal Ditambahkan</th>
                    </tr>
                    <!-- Kode php -->
                    <?php
                        
                        $result = mysqli_query($mysqli, "SELECT * FROM inventory_table");

                        $no = 1;
                        
                        while( $user_data = mysqli_fetch_object($result)) {
                            echo 
                                "<tr>
                                    <td class='text-center'>".$no++."</td>
                                    <td>".$user_data->item_name."</td>
                                    <td class='text-center'>".$user_data->tgl_masuk."</td>                                    
                                </tr>";
                        }
                    ?>

                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>

        </div>
        </div>
        <!-- penutup modal -->


    <!-- Javascript  -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>