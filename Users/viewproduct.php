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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Rohith's website</title>
  </head>
  <body>
    <?php
    require '../Common/UsersHeader.php';
    $id = $_GET['ID'];
    $query = "SELECT * FROM products WHERE id = '$id'";
    $query_solution = mysqli_query($con, $query);
    if ($query_solution) {
      while ($row = mysqli_fetch_array($query_solution)) {
        ?>
        <form class="" action="viewproduct.php?ID=<?php echo $row['id'] ?>" method="post">
        <div class="container">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <div class="row">
            <div class="col-md">
              <table>
                <tbody>
                  <tr>
                    <td>ID : </td>
                    <td><?php echo $row['id'] ?></td>
                  </tr>
                  <tr>
                    <td>Name : </td>
                    <td><?php echo $row['Name'] ?></td>
                  </tr>
                  <tr>
                    <td>Type : </td>
                    <td><?php echo $row['type'] ?></td>
                  </tr>
                  <tr>
                    <td>Description : </td>
                    <td><?php echo $row['description'] ?></td>
                  </tr>
                  <tr>
                    <td>Contact : </td>
                    <td><?php echo $row['contact'] ?></td>
                  </tr>
                  <tr>
                    <td>Price : </td>
                    <td><?php echo $row['price'] ?></td>
                  </tr>
                  <tr>
                    <td>Date : </td>
                    <td><input type="date" name="date" value="" min="<script>new Date()</script>" max="2018-12-31"></td>
                  </tr>
                </tbody>
              </table>
              <input type="submit" name="get" value="Get">
            </div>
            <div class="col-md">
              <img src="../Images/Product_Images/<?php echo $row['image'] ?>" alt="image" style="height:18rem;width:50%;">
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
<?php
if(isset($_POST['get'])){
  $userid = $_SESSION['email'];
  $date = $_POST['date'];
  $query = "INSERT INTO rent VALUES ('','$userid','$id','$date','','','Booked')";
  $query_solution = mysqli_query($con, $query);
  if($query_solution){
    echo "<script>alert('Success')</script>";
  }
  else {
    echo "<script>alert('Error')</script>";
  }

}
?>
<script>
  function checkDate(){
    var start = new Date();
    $('#fromDate').datepicker({
    startDate : start,
    endDate   : end
// update "toDate" defaults whenever "fromDate" changes
}).on('changeDate', function(){
    // set the "toDate" start to not be later than "fromDate" ends:
    $('#toDate').datepicker('setStartDate', new Date($(this).val()));
});
  }
</script>
