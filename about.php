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
    <title>Document</title>
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
            <li><a href="admin.php">Home</a></li>
            <li class="active"><a href="about.php">About</a></li>            
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
            <h3><b>TokoNext</b></h3>
            <hr>
            <p>Toko online yang menampilkan barang namun tidak bisa dibeli</p>
        </div>
    </div>

        <!-- Javascript  -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>