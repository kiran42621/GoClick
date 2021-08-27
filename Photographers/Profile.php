<?php
require "../dbconfig/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
  </head>
  <body>
    <?php
    $user = $_SESSION['email'];
    $query = "SELECT * FROM Photographers WHERE Email = '$user'";
    $query_solution = mysqli_query($con, $query);
    if ($query_solution) {
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
}
  ?>
  <a href="Home.php"><button>Home</button></a>
  <form class="" action="" method="post" enctype="multipart/form-data">
    <p>Upload Sample Image : </p>
    <input type="file" name="image" value="Choose Photo">
    <input type="submit" name="upload" value="Upload">
  </form>
  <?php
  $user = $_SESSION['userid'];
  $querys = "SELECT * FROM samplephotos WHERE Photographer_Id = '$user'";
  $query_solutions = mysqli_query($con, $querys);
  if ($query_solutions) {

  while($row = mysqli_fetch_array($query_solutions)){
    echo $row['Picture']
    ?>
    <img src="../Images/Sample_image/<?php echo $row['Picture'] ?>" alt="Image" style="width=300px;height:300px"><img/>
  <?php }
} ?>
  </body>
</html>
<?php
if(isset($_POST['upload']))
{
  $id = $_SESSION['userid'];

  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $folder= "../Images/Photographer_image/$image_name";
  move_uploaded_file($tmp_name, "../Images/Sample_image/$image_name");

  $query = "INSERT INTO samplephotos VALUES('','$id','$image_name')";
  $query_Solution = mysqli_query($con,$query);
  try{
    if ($query_Solution) {
      echo "<script>alert('Uploaded')</script>";
      echo "<script>window.location = 'Profile.php'</script>";
    }
    else {
      echo "<script>alert('Error')</script>";
    }
  }
  catch(Exception $e)
  {
    echo 'Message: ' .$e->getMessage();
  }

}
?>
