<?php
require "../dbconfig/config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $user = $_SESSION['user'];
    $query = "SELECT * FROM Photographers WHERE Email = '$user'";
    $query_solution = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($query_solution)){
      ?>

    <table>
      <tbody>
        <tr>
          <td>ID :</td>
          <td><?php echo $row['ID'] ?></td>
        </tr>
        <tr>
          <td>Name :</td>
          <td><?php echo $row['Name'] ?></td>
        </tr>
        <tr>
          <td>Phone :</td>
          <td><?php echo $row['Phone'] ?></td>
        </tr>
        <tr>
          <td>Email :</td>
          <td><?php echo $row['Email'] ?></td>
        </tr>
        <tr>
          <td>Company :</td>
          <td><?php echo $row['Company'] ?></td>
        </tr>
        <tr>
          <td>Skills :</td>
          <td><?php echo $row['Skills'] ?></td>
        </tr>
      </tbody>
    </table>
    <img src="../Images/Photographer_image/<?php echo $row['Picture'] ?>" alt="Image" style="width=300px;height:300px"><img/>
    <?php
  }

  ?>
  <a href="Home.php"><button>Home</button></a>
  </body>
</html>
