<?php
require "../dbConfig/config.php";
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
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Client Name</th>
          <th>Date of Event</th>
          <th>Client Number</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pid = $_SESSION['userid'];
        $query = "SELECT * FROM photographer_hiring WHERE PhotographerId = '$pid' AND Status = 'Requested'";
        $query_solution = mysqli_query($con, $query);
        if ($query_solution) {
          while ($row = mysqli_fetch_array($query_solution)) {
            ?>
        <form class="" action="jobs.php" method="post">
        <tr>
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['ClientName'] ?></td>
          <td><?php echo $row['Date'] ?></td>
          <td><?php echo $row['Cphone'] ?></td>
          <td>
            <input type="submit" name="confirm" value="Confirm">
            <input type="submit" name="cancel" value="Request Cancellation">
          </td>
        </tr>
        </form>
        <?php
      }
    }
    else{
      echo "<script>alert('error')</script>";
    }
    ?>
      </tbody>
    </table>
  </body>
</html>

<?php
if (isset($_POST['cancel'])) {
  $jid = $_POST['id'];
  $query = "UPDATE photographer_hiring SET Status = 'Request Cancel' WHERE id = '$jid'";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>window.location = 'jobs.php'</script>";
    echo "<script>alert('done')</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }
}
if (isset($_POST['confirm'])) {
  $jid = $_POST['id'];
  $query = "UPDATE photographer_hiring SET Status = 'Confirmed' WHERE id = '$jid'";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>window.location = 'jobs.php'</script>";
    echo "<script>alert('done')</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }
}
 ?>
