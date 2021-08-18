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
  </head>
  <body>
    <form class="" action="login.php" method="post">
    <div class="container bg-light my-5 py-5">
      <center>
      <h1>Login</h1>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Username</label>
        <input type="text" name="username" class="form-control" value="">
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
  if(($_POST['username'] == 'Admin') && ($_POST['password'] == 'Admin@123#')){
    echo "<script>window.location = 'home.php'</script>";
  }
  else{
    echo "<script>alert('Error')</script>";
  }
}
?>
