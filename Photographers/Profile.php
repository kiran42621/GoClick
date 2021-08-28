<?php
require "../dbconfig/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
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
          <a class="nav-link active" aria-current="page" href="../Photographers/profile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Photographers/jobs.php">My Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Photographers/completedjobs.php">Completed Jobs</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="../Common/logout.php"><input type="button" class="btn btn-sm btn-danger" value="logout" /></a>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
    <?php
    $user = $_SESSION['email'];
    $query = "SELECT * FROM Photographers WHERE Email = '$user'";
    $query_solution = mysqli_query($con, $query);
    if ($query_solution) {
    while($row = mysqli_fetch_array($query_solution)){
      ?>
<div class="row">
  <div class="col-md">
    <table class="table border">
      <tbody>
        <tr>
          <td>ID :</td>
          <td><?php echo $row['ID'] ?></td>
        </tr>
        <tr>
          <td>Name :</td>
          <td><?php echo $row['Name'] ?></td>
        </tr>
        <tr>
          <td>Phone :</td>
          <td><?php echo $row['Phone'] ?></td>
        </tr>
        <tr>
          <td>Email :</td>
          <td><?php echo $row['Email'] ?></td>
        </tr>
        <tr>
          <td>Company :</td>
          <td><?php echo $row['Company'] ?></td>
        </tr>
        <tr>
          <td>Skills :</td>
          <td><?php echo $row['Skills'] ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md">

        <img src="../Images/Photographer_image/<?php echo $row['Picture'] ?>" alt="Image" style="width=300px;height:300px"><img/>

  </div>
</div>
    <?php
  }
}
  ?>
  <form class="" action="" method="post" enctype="multipart/form-data">
    <label class="form-label" for="">Upload Sample Image : </label>
    <input type="file"  name="image" value="Choose Photo">
    <input type="submit" class="btn btn-sm btn-outline-success" name="upload" value="Upload">
  </form>
  <?php
  $user = $_SESSION['userid'];
  $querys = "SELECT * FROM samplephotos WHERE Photographer_Id = '$user'";
  $query_solutions = mysqli_query($con, $querys);
  if ($query_solutions) {

  while($row = mysqli_fetch_array($query_solutions)){
    echo $row['Picture']
    ?>
    <img src="../Images/Sample_image/<?php echo $row['Picture'] ?>" alt="Image" style="width=300px;height:300px"><img/>
  <?php }
} ?>
  </body>
</html>
<?php
if(isset($_POST['upload']))
{
  $id = $_SESSION['userid'];

  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $folder= "../Images/Photographer_image/$image_name";
  move_uploaded_file($tmp_name, "../Images/Sample_image/$image_name");

  $query = "INSERT INTO samplephotos VALUES('','$id','$image_name')";
  $query_Solution = mysqli_query($con,$query);
  try{
    if ($query_Solution) {
      echo "<script>alert('Uploaded')</script>";
      echo "<script>window.location = 'Profile.php'</script>";
    }
    else {
      echo "<script>alert('Error')</script>";
    }
  }
  catch(Exception $e)
  {
    echo 'Message: ' .$e->getMessage();
  }

}
?>
