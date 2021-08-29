<?php
require '../dbconfig/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        background-image: url("../Images/NewImages/lucas-favre-8eGNy2x2E7E-unsplash.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFF03;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GoClick</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Photographers/Login.php">Photographer Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/Login.php">Admin Login</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="signup.php">Sign Up</a>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
    <form class="" action="login.php" method="post">
    <div class="container my-5 py-5" style="width:60%;">
      <center>
      <h1 style="color:white">Login</h1>
      <div class="col-md-5">
        <label class="form-label" for="" style="color:white;text-shadow: 2px 2px black;">Enter Username</label>
        <input type="text" name="username" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="" style="color:white;text-shadow: 2px 2px black;">Enter Password</label>
        <input type="password" name="password" class="form-control" value="">
      </div>
      <input type="submit" name="login_btn" class="btn btn-primary mt-3" value="LOGIN">
      </center>
    </div>
    </form>
  </body>
</html>
<?php
if(isset($_POST['login_btn'])){
  if(($_POST['username'] == 'Admin') && ($_POST['password'] == 'Admin@123#')){
    echo "<script>window.location = 'home.php'</script>";
  }
  else{
    echo "<script>alert('Error')</script>";
  }
}
?>
