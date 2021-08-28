<?php
require 'dbconfig/config.php';
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Photographers/Login.php">Photographer Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/Login.php">Admin Login</a>
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
    <div class="container bg-light my-5 py-5">
      <center>
      <h1>Login</h1>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Email</label>
        <input type="text" name="email" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Password</label>
        <input type="password" name="password" class="form-control" value="">
      </div>
      <p>Dont have account?<a href="signup.html">Click Here</a></p>
      <input type="submit" name="login_btn" class="btn btn-primary" value="LOGIN">
      </center>
    </div>
    </form>
  </body>
</html>
<?php
if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "select * from users where Email='$email' and Password='$password'";
  $query_Solution = mysqli_query($con, $query);

  try{

  if(mysqli_num_rows($query_Solution) > 0)
  {
    while ($row = mysqli_fetch_array($query_Solution)) {
      $_SESSION['userid'] = $row['ID'];
      $_SESSION['name'] = $row['Name'];
      $_SESSION['email'] = $row['Email'];
    }
    header('location:Users/Home.php');
  }
  else
  {
    echo'<script type="text/javascript"> alert("Check Username and Password")</script>';
  }
  }
  catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
      }
}
?>
