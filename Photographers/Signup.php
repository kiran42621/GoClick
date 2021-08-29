<?php require '../dbConfig/config.php'; ?>
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
        background-image: url("../Images/NewImages/photographycoverimg.jpg");
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
<div class="row">
  <div class="col-6">
    <form class="" action="signup.php" method="post" enctype="multipart/form-data">
    <div class="container my-3 py-3">
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
      <div class="col-md-5">
        <label class="form-label" for="">Company Name</label>
        <input type="text" name="Company" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Skills</label>
        <input type="text" name="Skills" class="form-control" value="">
      </div>
      <div class="col-md-5">
        <label class="form-label" for="">Picture</label>
        <input type="file" name="Image" class="form-control" value="">
      </div>
      <input type="submit" name="submit_btn" class="btn btn-primary mt-3" value="SignUp">
      </center>
    </div>
    </form>
  </div>
</div>

  </body>
</html>
<?php
  if(isset($_POST['submit_btn']))
  {
    $Name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['Mobile'];
    $company = $_POST['Company'];
    $skills = $_POST['Skills'];


    $image_name = $_FILES['Image']['name'];
  	$tmp_name = $_FILES['Image']['tmp_name'];
  	$folder= "../Images/Photographer_image/$image_name";
  	move_uploaded_file($tmp_name, "../Images/Photographer_image/$image_name");

    $query = "select * from photographers where Email='$email'";
    $query_Solution = mysqli_query($con,$query);
    try{
    if(mysqli_num_rows($query_Solution)>0){
      echo'<script type="text/javascript"> alert("User already exist")</script>';
    }
    else
    {
      $query = "insert into photographers values('','$Name','$mobile','$email','$password','$company','$skills','$image_name')";
      $query_Solution = mysqli_query($con, $query);

      if($query_Solution)
      {
        echo'<script type="text/javascript"> alert("User Registered")</script>';
        echo "<script>window.location = 'Login.php'</script>";
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
