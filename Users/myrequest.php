<?php
require "../dbConfig/config.php";
session_start()
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
    <div class="container-fluid">
      <table class="table table-responsive table-striped table-hover border">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $cid = $_SESSION['userid'];
            $query = "SELECT a.id, a.PhotographerId, a.ClientId, a.Date, b.Phone, a.Status, b.Name FROM photographer_hiring as a , photographers as b WHERE a.ClientId = '$cid' AND a.PhotographerId = b.ID";
            $query_solution = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($query_solution)){
          ?>
          <form class="" action="" method="post">

          <tr>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['Name'] ?></td>
            <td><?php echo $row['Date'] ?></td>
            <td><?php echo $row['Phone'] ?></td>
            <td><?php echo $row['Status'] ?></td>
            <?php if ($row['Status'] == 'Request Cancel') {
              print("<td><button type='submit' name='cancel' class='btn btn-sm btn-danger'>Cancel</button></td>");
            }
            else{
              print("<td>No Action</td>");
            }?>
          </tr>
          </form>
          <?php
        }
       ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
<?php
if (isset($_POST['cancel'])) {
  $jid = $_POST['id'];
  $query = "UPDATE photographer_hiring SET Status = 'Cancelled' WHERE id = '$jid'";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>window.location = 'myrequest.php'</script>";
    echo "<script>alert('done')</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }
}
?>
