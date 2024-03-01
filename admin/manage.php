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
      <!-- Main Content -->
      <div class="mt-3">
        <h2>Manage Rooms</h2>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="col-2 col-md-1">Room No</th>
                <th class="col-2 col-md-2">Room Type</th>
                <th class="col-3 col-md-2">Booking Status</th>
                <th class="col-3 col-md-2">Check in</th>
                <th class="col-3 col-md-2">Check out</th>
                <th class="col-3 col-md-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>A-101</td>
                <td>Double</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger">
                    Checked in
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-info" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Check-out">Check out</button>
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
                <td>A-101</td>
                <td>Triple</td>
                <td>
                  <button type="button" class="btn btn-success">
                    Book room
                  </button>
                </td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-101</td>
                <td>Familly</td>
                <td>
                  <button type="button" class="btn btn-success">
                    Book room
                  </button>
                </td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-101</td>
                <td>Single</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#checkin">
                    Check in
                  </button>
                </td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <!-- Bootstrap Modal for Check in -->
              <div class="modal fade" id="checkin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">


                    <div class="modal-header bg-dark">
                      <h5 class="modal-title text-white col-12" id="checkinlable">
                        Room Check-in
                      </h5>
                      <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- main content -->
                      <form>
                        <div class="row">
                          <div class="col-6">
                            <b>Customer Name</b><br><br><br>
                            <b>Room type</b><br><br><br>
                            <b>Room Number</b><br><br>
                            <b>Check in</b><br><br>
                            <b>Ckeck Out</b><br><br>
                            <b>Total Price</b><br><br>

                          </div>
                          <div class="col-6">
                            <h5>row wise name</h5><br>
                            <h5>Single</h5><br>
                            <h5>A-101</h5><br>
                            <h5>Aug 22,2024</h5><br>
                            <h5>Aug 30,2024</h5><br>
                            <h5>15,000</h5><br><br>
                          </div>
                        </div>
                        <div class="row">
                          <form role="form" id="advancePayment">
                            <div class="payment-response"></div>
                            <div class="form-group col-lg-12">
                              <label>Advance Payment</label>
                              <input type="number" class="form-control" id="advance_payment" placeholder="Please Enter Amounts Here.."><br>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Payment & Check In</button>
                          </form>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of check-in model -->

              <!-- Bootstrap Modal for Check out -->

              <tr>
                <td>A-101</td>
                <td>Single</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#checkin">
                    Check in
                  </button>
                </td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-202</td>
                <td>single</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger">
                    Checked in
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Check-out">Check out</button>
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
                <td>A-101</td>
                <td>Double</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger">
                    Checked in
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Check-out">Check out</button>
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
                <td>A-101</td>
                <td>Triple</td>
                <td>
                  <button type="button" class="btn btn-success">
                    Book room
                  </button>
                </td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-101</td>
                <td>Familly</td>
                <td>
                  <button type="button" class="btn btn-success">
                    Book room
                  </button>
                </td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-101</td>
                <td>Single</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#checkin">
                    Check in
                  </button>
                </td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-101</td>
                <td>Single</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#checkin">
                    Check in
                  </button>
                </td>
                <td class="text-center">-</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-info">edit</button>
                    <button type="button" class="btn btn-warning">view</button>
                    <button type="button" class="btn btn-danger">delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>A-202</td>
                <td>single</td>
                <td>
                  <button type="button" class="btn btn-danger">Booked</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger">
                    Checked in
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Check-out">Check out</button>
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
      </div>
    </div>

    <!-- Bootstrap Modal for Check in -->
    <div class="modal fade" id="Check-out" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">


          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white col-12" id="Check-outlable">
              Room Check-in
            </h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- main content -->
            <form>
              <div class="row">
                <div class="col-6">
                  <b>Customer Name</b><br><br><br>
                  <b>Room type</b><br><br><br>
                  <b>Room Number</b><br><br>
                  <b>Check in</b><br><br>
                  <b>Ckeck Out</b><br><br>
                  <b>Total Price</b><br><br>

                </div>
                <div class="col-6">
                  <h5>row wise name</h5><br>
                  <h5>Single</h5><br>
                  <h5>A-101</h5><br>
                  <h5>Aug 22,2024</h5><br>
                  <h5>Aug 30,2024</h5><br>
                  <h5>5,000</h5><br><br>
                </div>
              </div>
              <div class="row">
                <form role="form" id="advancePayment">
                  <div class="payment-response"></div>
                  <div class="form-group col-lg-12">
                    <label>Remaining Payment</label>
                    <input type="number" class="form-control" id="advance_payment" placeholder="Please Enter Amounts Here.."><br>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Payment & Check In</button>
                </form>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

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