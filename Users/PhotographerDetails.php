<?php
require "../dbConfig/config.php";
session_start();
$pid = $_GET['ID'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Rohith's website</title>
  </head>
  <body>
    <!--  -->
    <?php require '../Common/UsersHeader.php'; ?>

    <div class="container mt-2">
      <?php
        $query = "SELECT * FROM photographers WHERE ID = $pid";
        $query_solution = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($query_solution)){
      ?>
      <div class="row">
        <div class="col-md-8">
          <h4>Name : <?php echo $row['Name'] ?></h4>
          <h4>Skills : <?php echo $row['Skills'] ?></h4>
          <h4>Business Name : <?php echo $row['Company'] ?></h4>
        </div>
        <div class="col-md-4">
          <img src="../Images/Photographer_image/<?php echo $row['Picture'] ?>" alt="Photographer_Image" style="height:18rem;width:100%;border-radius:70px;">
        </div>
      </div>
      <?php
    }
   ?>
    </div>
    <div class="container-fluid my-2">
      <center>
        <h2>Sample Photos</h2>
      </center>
      <div class="row">
        <?php
          $query = "SELECT * FROM samplephotos WHERE Photographer_Id = '$pid'";
          $query_solution = mysqli_query($con, $query);
          while($row = mysqli_fetch_array($query_solution)){
        ?>
        <div class="col-md-4 my-1">
          <img src="../Images/Sample_image/<?php echo $row['Picture'] ?>" alt="image" style="height:18rem;width:100%;">
        </div>
        <?php
      }
     ?>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row">
        <div class="col-auto">
          <input type="button" class="btn btn-sm btn-primary" name="" value="Book" data-bs-toggle="modal" data-bs-target="#exampleModal">
        </div>
        <div class="col-auto">
          <input type="button" class="btn btn-sm btn-secondary" name="" value="Back">
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
          <div class="row">
            <label class="form-label" for="">Select Date : </label>
            <input type="date" class="form-control" name="date" value="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="hire" class="btn btn-primary">Hire</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
if (isset($_POST['hire'])) {
  $cid = $_SESSION['userid'];
  $cname = $_SESSION['name'];
  $date = $_POST['date'];

  $query = "INSERT INTO photographer_hiring VALUES('','$pid','$cid','$cname','$date','','','Requested')";
  $query_solution = mysqli_query($con, $query);
  if ($query_solution) {
    echo "<script>window.location = PhotographerDetails.php?ID=$pid</script>";
  }
}
 ?>
