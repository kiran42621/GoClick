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
    <div class="container">
      <h3><center>Add Product</center></h3>
      <form class="" action="addproduct.php" method="post" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" name="name" value=""><br>
        <label for="">Image</label>
        <input type="file" name="picture" value=""><br>
        <label for="">type</label>
        <select class="" name="type">
          <option value="camera">Camera</option>
          <option value="accessories">Accessories</option>
          <option value="lens">Lens</option>
        </select><br>
        <label for="">Description</label>
        <input type="text" name="description" value=""><br>
        <label for="">Price</label>
        <input type="number" name="price" value=""><br>
        <label for="">Contact</label>
        <input type="number" name="contact" value=""><br>
        <input type="submit" name="add" value="Add Product">
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
