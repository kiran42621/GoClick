<?php require '../dbconfig/config.php'; ?>
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

    header('location:Users/Home.php');

  }
  else
  {
    echo'<script type="text/javascript"> alert("Yaaro Neenu")</script>';
  }
  }
  catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
      }
}
?>
