<?php
require "../dbConfig/config.php"
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
      <table class="table table-responsive table-stripped table-hover">
        <thead>
          <tr>
            <th scope="col">Photographer ID</th>
            <th scope="col">Name</th>
            <th scope="col">Skills</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM photographers";
            $query_solution = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($query_solution)){
          ?>
          <tr>
            <td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['Name'] ?></td>
            <td><?php echo $row['Skills'] ?></td>
            <td><a href="PhotographerDetails.php?ID=<?php echo $row['ID'] ?>"><button type="button" class="btn btn-primary">View</button></a></td>
          </tr>
          <?php
        }
       ?>
        </tbody>
      </table>
    </div>


    <!-- Modal -->
    <div class="modal modal-dialog modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container mt-2">
              <div class="row">
                <div class="col-md-8">
                  <h4>Name : Name</h4>
                  <h4>Description : Description</h4>
                  <h4>Business Name : Name</h4>
                </div>
                <div class="col-md-4">
                  <img src="../456.jpg" alt="Photographer_Image" style="height:18rem;width:100%;">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
