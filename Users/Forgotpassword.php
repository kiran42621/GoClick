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
        background-image: url("../Images/NewImages/sharegrid-N10auyEVst8-unsplash.jpg");
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
            <a class="nav-link active" href="../login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../signup.php">Sign Up</a>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
    <form class="" action="" method="post">
    <div class="container bg-light my-5 py-5 border" style="width:60%;border-radius:25px;">
      <center>
      <h1>Forgot Password</h1>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Email</label>
        <input type="text" name="email" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Mobile Number</label>
        <input type="number" min="1000000000" max="9999999999" name="number" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Password</label>
        <input type="password" name="password" class="form-control" value="">
      </div>
      <p>Already have account? <a href="../login.php">Click Here</a></p>
      <input type="submit" name="login_btn" class="btn btn-primary mt-3" value="Change">
      </center>
    </div>
    </form>
  </body>
</html>
<?php
if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $mobile = $_POST['number'];
  $password = $_POST['password'];
  $query = "select * from users where Email='$email' and Mobile='$mobile'";
  $query_Solution = mysqli_query($con, $query);

  try{

  if(mysqli_num_rows($query_Solution) > 0)
  {
    $querys = "UPDATE users SET Password = '$password' WHERE Email = '$email'";
    $query_solutions = mysqli_query($con, $querys);
    if($query_solutions){
      echo "<script>alert('Password Changed')</script>";
      echo "<script>windows.location='../login.php'</script>";
    }
  }
  else
  {
    echo'<script type="text/javascript"> alert("User Not Found")</script>';
  }
  }
  catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
      }
}
?>
