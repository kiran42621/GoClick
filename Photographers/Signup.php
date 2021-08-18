<?php require '../dbConfig/config.php'; ?>
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
    <form class="" action="signup.php" method="post" enctype="multipart/form-data">
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
