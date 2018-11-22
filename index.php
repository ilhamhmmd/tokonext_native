<?php

    require_once('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>
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
          <a class="navbar-brand" href="index.php">TokoNext</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>            
          </ul> -->
          <ul class="nav navbar-nav navbar-right">            
            <li><a class="" href="login.php"><b>Login</b></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <hr><br>      

     <div class="container">

<div class="row jumbotron">
    <h3><b>TokoNext</b></h3>    
    <p>Berbagai kebutuhan fashion anda ada disini !</p>
    <hr>

     
            <center>
        <div class="row">

        <?php
                        
                $result = mysqli_query($mysqli, "SELECT * FROM inventory_table");        
                                        
                while( $user_data = mysqli_fetch_object($result)) { ?>
            
            <div class="col-lg-4 col-sm-4 hvr-bounce-in" data-toggle="modal" data-target="#tambah">
            <div class="card" style="width: 20rem; padding:20px;">
                <img class="card-img-top" src="assets/file/<?php echo $user_data->image; ?>" alt="Card image cap">
                <div>
                    <h3><b><?php echo $user_data->item_name; ?></b></h3>
                    <hr>
                    <p><b>Rp. </b><?php echo $user_data->price; ?></p>
                    <p><b>Quantity : </b><?php echo $user_data->quantity; ?></p>
                </div>
            </div>
            </div>   
            
            <?php
        }

    ?>

        </div>
        <!-- penutup row card -->
        </center> 


</div>
</div>

   

    <!-- Javascript  -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>