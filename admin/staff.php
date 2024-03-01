<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>
<div class="wrapper">
    <?php include('include/aside.php') ?>
    <div class="main">
    <?php include('include/nav.php') ?>
      <main class="content px-3 py-2">
        <div class="container-fluid">
          <div class="mb-3">
            <h4>Admin Dashboard</h4>
          </div>
        </div>

        <!-- Main Wrapper -->
        <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="col-2 col-md-1">Sr NO</th>
          <th class="col-2 col-md-1">name</th>
          <th class="col-3 col-md-1">staff</th>
          <th class="col-3 col-md-2">Contact Number</th>
          <th class="col-3 col-md-1">Shift</th>
          <th class="col-3 col-md-2">Joining Date</th>
          <th class="col-3 col-md-2">Change Shift</th>
          <th class="col-3 col-md-2">action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>abcd</td>
          <td>
            manager
          </td>
          <td>
            87800-57480
          </td>
          <td>
            Day-Shift
          </td>
          <td>
            6,march-2023
          </td>
          <td>
            <input type="button" value="Change-shift" class="btn-warning">
          </td>
          <td>
            <div>
              <button type="button" class="btn btn-info">edit</button>
              <button type="button" class="btn btn-warning">view</button>
              <button type="button" class="btn btn-danger">delete</button>
            </div>
          </td>
        </tr>
      <tr>
        <td>1</td>
          <td>x-y-z</td>
          <td>
            cook
          </td>
          <td>
            87800-23124
          </td>
          <td>
            full-time
          </td>
          <td>
            10,march-2023
          </td>
          <td>
            <input type="button" value="Change-shift" class="btn-warning">
          </td>
          <td>
            <div>
              <button type="button" class="btn btn-info">edit</button>
              <button type="button" class="btn btn-warning">view</button>
              <button type="button" class="btn btn-danger">delete</button>
            </div>
          </td>
      </tr>
      <tr>
        <td>1</td>
          <td>x-y-z</td>
          <td>
            cook
          </td>
          <td>
            87800-23124
          </td>
          <td>
            full-time
          </td>
          <td>
            10,march-2023
          </td>
          <td>
            <input type="button" value="Change-shift" class="btn-warning">
          </td>
          <td>
            <div>
              <button type="button" class="btn btn-info">edit</button>
              <button type="button" class="btn btn-warning">view</button>
              <button type="button" class="btn btn-danger">delete</button>
            </div>
          </td>
      </tr><tr>
        <td>1</td>
          <td>x-y-z</td>
          <td>
            cook
          </td>
          <td>
            87800-23124
          </td>
          <td>
            full-time
          </td>
          <td>
            10,march-2023
          </td>
          <td>
            <input type="button" value="Change-shift" class="btn-warning">
          </td>
          <td>
            <div>
              <button type="button" class="btn btn-info">edit</button>
              <button type="button" class="btn btn-warning">view</button>
              <button type="button" class="btn btn-danger">delete</button>
            </div>
          </td>
      </tr><tr>
        <td>1</td>
          <td>x-y-z</td>
          <td>
            cook
          </td>
          <td>
            87800-23124
          </td>
          <td>
            full-time
          </td>
          <td>
            10,march-2023
          </td>
          <td>
            <input type="button" value="Change-shift" class="btn-warning">
          </td>
          <td>
            <div>
              <button type="button" class="btn btn-info">edit</button>
              <button type="button" class="btn btn-warning">view</button>
              <button type="button" class="btn btn-danger">delete</button>
            </div>
          </td>
      </tr>
    </tbody>
    </table>
  </div>
      </main>
      <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
      </a>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
 

</body>

</html>