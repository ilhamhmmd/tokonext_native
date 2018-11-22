<?php

    require_once('koneksi.php');

    session_start();
    if (isset($_SESSION['username'])) {?>
        <script>window.location = 'admin.php';</script>
        <?php
    }


    if(isset($_POST['login'])) {    

        $username   = $_POST['username'];
        $password   = $_POST['password'];

        $data       = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username' AND password='$password'");
        $cek        = mysqli_num_rows($data);

        if($cek > 0) {
            
            $_SESSION['username']   = $username; ?>
            <!-- Refresh halaman dengan js -->
            <script>window.location = 'admin.php';</script>
        <?php
        } else {
            ?>
            <!-- Refresh halaman dengan js -->
            <script>window.location = 'login.php?pesan=gagal';</script>            
        <?php        
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/signin.css">
</head>
<body class="text-center" style="background-color : #acd8e0;">      

    <form class="form-signin" action="" method="post">
      <img class="mb-4" src="assets/img/pict.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Login / Masuk</h1>
      <b><a href="index.php">Home</a></b>

      <!-- alert ketika gagal login -->
      <?php 
        if(isset($_GET['pesan'])){ 
            if($_GET['pesan'] == "gagal") { ?>
                <div class="alert alert-danger fade in alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                    <strong>Username atau Password salah !</strong>
                </div> <?php
            } else if($_GET['pesan'] == "belum-login") {?>
                <script>alert("Silahkan login terlebih dahulu untuk masuk !");</script>
            <?php
            }
        } ?> 

      <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
      <br>
      <p class="mt-5 mb-3 text-muted">&copy; Ilham Muhammad</p>
    </form>

    <!-- Javascript  -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>