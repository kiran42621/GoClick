<?php
require "../dbConfig/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
