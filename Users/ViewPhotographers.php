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
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td >1</td>
            <td>Sujan</td>
            <td>Vade alla Dodd Vade</td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
          </tr>
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
