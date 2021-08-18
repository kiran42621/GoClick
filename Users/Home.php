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
    <!--  -->
    <?php require '../Common/UsersHeader.php'; ?>
<?php
$query = "SELECT * FROM products";
$query_solution = mysqli_query($con, $query);
if ($query_solution) {
  while($row = mysqli_fetch_array($query_solution)){
?>
<form class="" action="viewproduct.php?ID=<?php echo $row['id'] ?>" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="../Images/Product_Images/<?php echo $row['image'] ?>" alt="Product Image" style="width:16rem;height:14rem;">
        </div>
        <div class="col-md-5">
          <div class="row">
            <h4>Model : <?php echo $row['Name'] ?></h4>
          </div>
          <div class="row">
            <h4>Product Type : <?php echo $row['type'] ?></h4>
          </div>
          <div class="row">
            <h4>Description : <?php echo $row['description'] ?></h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <h4>Price : <?php echo $row['price'] ?>/-</h4>
          </div>
          <div class="row">
            <button type="submit" class="btn btn-sm btn-outline-primary" name="button">Get</button>
          </div>
        </div>
      </div>
    </div>
  </form>
    <?php
      }
    }
     ?>
  </body>
</html>
