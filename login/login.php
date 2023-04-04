<?php
require ("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>

    <section class="vh-100">
      <?php
      
if(isset($_REQUEST['submit'])){
  $username = $_REQUEST['username'];
  $password = MD5($_REQUEST['password']);
  
  $hasil = mysqli_query($db_conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($hasil) > 0){
      $_SESSION['submit'] = 'True';
      session_start();
      $data = mysqli_fetch_array($hasil);
      $_SESSION['logged'] = $data['UID'];
      $_SESSION['username'] = $data['username'];
              
      header('Location:index2.php');

    } else {
      echo '<script>alert("Username dan Password tidak sesuai!");</script>';
    };
};

if(!isset($_SESSION['submit'])) {

} else {
  header('Location:index2.php');
}

      ?>
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img
              src="gambar/gmbr1.jpg"
              class="img-fluid"
              alt="Sample image"
              
            />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="post">
              <h3><a class="text-black fw-bold mx-3 mb-0" style="text-decoration:none" href="../index.php" >Pengumuman Kelulusan</a></h3>
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0" data-aos="zoom-out">Login</p>
              </div>

              <!-- User input -->
              <div class="form-outline mb-4">
                <input
                  type="text"
                  id="username"
                  name="username"
                  data-aos="zoom-in-right"
                  class="form-control form-control-lg"
                  placeholder="Username"
                  required autofocus
                />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input
                  type="password"
                  id="password"
                  name="password"
                  data-aos="zoom-in-left"
                  class="form-control form-control-lg"
                  placeholder="Enter password"
                  required
                />
              </div>
              <div class="text-center text-lg-start mt-4 pt-2">
<button class="btn btn-lg btn-primary btn-block" data-aos="zoom-in-up" type="submit" name="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary"
      >

      
        <footer>
        <div class="fw-bolder text-lowercase text-white font-monospace col-xs-3">
          Copyright © 2023.
        </div>
        </footer>

      </div>
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
