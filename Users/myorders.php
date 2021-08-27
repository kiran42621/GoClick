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
    <?php
    require '../Common/UsersHeader.php';
    ?>
<div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>date</th>
          <th>status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['email'];
        $query = "SELECT a.id, b.name, a.date, a.status FROM rent as a, products as b WHERE a.productid = b.id AND a.userid = '$id'";
        $query_solution = mysqli_query($con, $query);
        if ($query_solution){
          while ($row = mysqli_fetch_array($query_solution)){
            ?>
        <form class="" action="myorders.php" method="post">
        <input type="hidden" name="rid" value="<?php echo $row[0] ?>"/>
        <tr>
          <td><?php echo $row[0] ?></td>
          <td><?php echo $row[1] ?></td>
          <td><?php echo $row[2] ?></td>
          <td><?php echo $row[3] ?></td>
          <?php
        if($row[3] == "Accepted"){
          ?>
          <td><input type="submit" value="Pick up" name="pickup" class="btn btn-sm btn-primary"/></td>
          <?php
        }
          else{ ?>
          <td>No Action</td>
          <?php } ?>
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

if(isset($_POST['pickup'])){
  $rrid = $_POST['rid'];
  $userid = $_SESSION['userid'];
  $date = date("Y-m-d");
  $query = "UPDATE rent SET date='$date', status='Onrent' WHERE id = '$rrid'";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>alert('Success')</script>";
    echo "<script>window.location = 'myorders.php'</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }

}
?>
