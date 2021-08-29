<?php
require '../dbConfig/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Rohith's website</title>
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
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="viewproduct.php">View Product</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="../Common/logout.php"><input type="button" class="btn btn-sm btn-danger" name="" value="Logout"></a>
          </li>
        </ul>
      </form>
    </div>
    </div>
    </nav>
<div class="container-fluid">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>image</th>
          <th>type</th>
          <th>description</th>
          <th>Price</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM products";
        $query_solution = mysqli_query($con, $query);
        if ($query_solution){
          while ($row = mysqli_fetch_array($query_solution)){
            ?>
        <form class="" action="" method="post">
        <input type="hidden" name="rid" value="<?php echo $row[0] ?>"/>
        <tr>
          <td><?php echo $row[0] ?></td>
          <td><?php echo $row[1] ?></td>
          <td><?php echo $row[2] ?></td>
          <td><?php echo $row[3] ?></td>
          <td><?php echo $row[4] ?></td>
          <td><?php echo $row[5] ?></td>
          <td><?php echo $row[6] ?></td>
          <td><input type="submit" class="btn btn-sm btn-danger" name="remove" value="Remove"></td>
        </tr>
        </form>

        <?php
      }
    }
     ?>
      </tbody>
    </table>
    </div>
  </body>
</html>
<?php
if(isset($_POST['remove'])){
  $rrid = $_POST['rid'];
  $query = "DELETE FROM products WHERE id = '$rrid'";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>alert('Success')</script>";
    echo "<script>window.location = 'viewproduct.php'</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }

}
?>
