<?php require 'dbConfig/config.php'; ?>
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
    <form class="" action="signup.php" method="post">
    <div class="container bg-light my-5 py-5">
      <center>
      <h1>Sign Up</h1>
      <div class="col-md-5">
        <label class="form-label" for="">Enter the Name</label>
        <input type="text" name="name" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Enter the Email</label>
        <input type="text" name="email" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Phone No</label>
        <input type="text" name="Mobile" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Enter Password</label>
        <input type="password" name="password" class="form-control" value="">
      </div>
      <p></p>
      <input type="submit" name="submit_btn" class="btn btn-primary" value="SignUp">
      </center>
    </div>
    </form>
  </body>
</html>
<?php
  if(isset($_POST['submit_btn']))
  {
    $Name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['Mobile'];

    $query = "select * from users where Name='$Name'";
    $query_Solution = mysqli_query($con,$query);
    try{
    if(mysqli_num_rows($query_Solution)>0){
      echo'<script type="text/javascript"> alert("User already exist")</script>';
    }
    else
    {
      $query = "insert into users values('','$Name','$email','$mobile','$password')";
      $query_Solution = mysqli_query($con, $query);

      if($query_Solution)
      {
        echo'<script type="text/javascript"> alert("User Registered")</script>';
      }
      else{
        echo'<script type="text/javascript"> alert("Error Occured")</script>';
      }
    }
    }
    catch(Exception $e)
    {
      echo 'Message: ' .$e->getMessage();
    }

  }
?>
