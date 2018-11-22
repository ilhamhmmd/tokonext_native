<?php
    require_once('koneksi.php');
    
    session_start();
    if (!isset($_SESSION['username'])) {?>
        <script>window.location = 'login.php?pesan=belum-login';</script>
        <?php
    }

    $id = $_GET['id'];

    
    if( isset($_POST['update']) ) {
        $item_name  = $_POST['item_name'];
        $price      = $_POST['price'];
        $quantity   = $_POST['quantity'];

        $query      = "UPDATE inventory_table SET item_name = '$item_name', price = '$price', quantity = '$quantity' WHERE id=$id";
        
        $insert     = mysqli_query($mysqli, $query);
    

        //jika insert berhasil
        if( $insert ) { ?>
            <!-- Refresh halaman dengan js -->
            <script>window.location = 'admin.php';</script>
            <?php
        }
    }
 
    // Fetech user data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM inventory_table WHERE id=$id");
     
    while($user_data = mysqli_fetch_array($result))
    {
        $item_name  = $user_data['item_name'];
        $price      = $user_data['price'];
        $quantity   = $user_data['quantity'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Item</title>
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
          <a class="navbar-brand" href="#">TokoNext</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li><a class="" href="logout.php"><b>Logout</b></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <br><br><br><br>

        <div class="container">
            <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">    
                    <div class="row">
                        <div class="col-lg-7">
                            <h4>Edit Item / Barang</h4>
                            <hr>
                        <div class="form-group">
                            <label for="item_name">Nama Barang</label>
                            <input type="text" name="item_name" value="<?php echo $item_name; ?>" placeholder="Nama Item / Barang" class="form-control" required>
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" name="price" value="<?php echo $price; ?>" placeholder="Harga" class="form-control" required>
                            <small class="danger">* tanpa Rp</small>
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            <label for="price">Quantity</label>
                            <input type="text" name="quantity" value="<?php echo $quantity; ?>" placeholder="Quantity" class="form-control" required>                            
                        </div> 
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">                            
                            <input type="submit" value="SUBMIT" class="btn btn-primary" name="update">
                        </div> 
                        </div> 
                    </div>

                </form>
            </div>
        </div>

    <!-- Javascript  -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>