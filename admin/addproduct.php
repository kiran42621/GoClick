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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFF03;">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><strong>GoClick</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="addproduct.php">Add Product</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <input type="button" class="btn btn-sm btn-danger" name="" value="Logout">
          </li>
        </ul>
      </form>
    </div>
    </div>
    </nav>

    <div class="container">
      <h3><center>Add Product</center></h3>
      <form class="" action="addproduct.php" method="post" enctype="multipart/form-data">
        <div class="row mt-3">
          <label class="form-label" for="">Name</label>
          <input type="text" class="form-control" name="name" value=""><br>
        </div>
        <div class="row mt-3">
          <label class="form-label" for="">Image</label>
          <input type="file" name="picture" class="form-control" value=""><br>
        </div>
        <div class="row mt-3">
          <label class="form-label" for="">type</label>
          <select name="type" class="form-select">
            <option value="camera">Camera</option>
            <option value="accessories">Accessories</option>
            <option value="lens">Lens</option>
          </select><br>
        </div>
        <div class="row mt-3">
          <label class="form-label" for="">Description</label>
          <input type="text" name="description" class="form-control" value=""><br>
        </div>
        <div class="row mt-3">
          <label class="form-label" for="">Price</label>
          <input type="number" name="price" class="form-control" value=""><br>
        </div>
        <div class="row mt-3">
          <label class="form-label" for="">Contact</label>
          <input type="number" name="contact" class="form-control" value=""><br>
        </div>
        <input type="submit" class="btn btn-primary" name="add" value="Add Product">
      </form>
    </div>
  </body>
</html>
<?php
if(isset($_POST['add'])){
  $name = $_POST['name'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $contact = $_POST['contact'];

  $image_name = $_FILES['picture']['name'];
  $tmp_name = $_FILES['picture']['tmp_name'];
  $folder= "../Images/Product_Images/$image_name";
  move_uploaded_file($tmp_name, "../Images/Product_Images/$image_name");

  $query = "INSERT INTO products VALUES ('','$name','$image_name','$type','$description','$price','$contact','Available')";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>alert('Success')</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }

}
?>
