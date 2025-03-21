<!DOCTYPE html>
<?php
include('func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['dname'];
if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set doctorStatus='0' where ID = '" . $_GET['ID'] . "'");
  if ($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
}

// if(isset($_GET['prescribe'])){

//   $pid = $_GET['pid'];
//   $ID = $_GET['ID'];
//   $appdate = $_GET['appdate'];
//   $apptime = $_GET['apptime'];
//   $disease = $_GET['disease'];
//   $allergy = $_GET['allergy'];
//   $prescription = $_GET['prescription'];
//   $query=mysqli_query($con,"insert into prestb(doctor,pid,ID,appdate,apptime,disease,allergy,prescription) values ('$doctor',$pid,$ID,'$appdate','$apptime','$disease','$allergy','$prescription');");
//   if($query)
//   {
//     echo "<script>alert('Prescribed successfully!');</script>";
//   }
//   else{
//     echo "<script>alert('Unable to process your request. Try again!');</script>";
//   }
// }


?>
<html lang="en">

<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <!-- Latest Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <style>
      .btn-outline-light:hover {
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

    <style>
      .bg-primary {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
      }

      .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #342ac1;
        border-color: #007bff;
      }

      .text-primary {
        color: #342ac1 !important;
      }


      .table-container {
        max-height: 400px;
        /* Set scroll height */
        overflow-y: auto;
        border: 1px solid #ddd;
        width: 130%;
      }

      .table thead tr {
        position: sticky;
        top: 0;
        background: #fff;
        /* Keep header background */
        z-index: 10;
      }

      .table thead th {
        background: #f8f9fa;
        text-align: center;
        padding: 12px;
        border-bottom: 2px solid #ddd;
      }

      .table tbody tr td {
        text-align: center;
        vertical-align: middle;
      }

      .table {
        width: 100%;
      }
    </style>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
        <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
      </form>
    </div>
  </nav>
</head>
<style type="text/css">
  button:hover {
    cursor: pointer;
  }

  #inputbtn:hover {
    cursor: pointer;
  }
</style>

<body style="padding-top:50px;">
  <div class="container-fluid" style="margin-top:50px;">
    <div class="text-center my-4">
      <h3 class="fw-bold text-primary" style="font-family: 'IBM Plex Sans', sans-serif;">
        Welcome, <?php echo $_SESSION['dname']; ?> 👋
      </h3>
      <p class="text-white bg-success p-2 rounded">
        The best way to find yourself is to lose yourself in the service of others
      </p>
    </div>
    <div class="row">
      <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
          <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
          <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
          <a class="list-group-item list-group-item-action" href="#list-patient" id="list-patient-list" role="tab" data-toggle="list" aria-controls="home"> Patient List</a>
          <a class="list-group-item list-group-item-action" href="#list-add-patient" id="list-add-patient-list" role="tab" data-toggle="list" aria-controls="home">Add Patient </a>

        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 950px;">
          <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">

            <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <?php
                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                $patientQuery = "SELECT COUNT(*) AS total_patients FROM patreg";
                $patientResult = mysqli_query($con, $patientQuery);
                $patientRow = mysqli_fetch_assoc($patientResult);
                $totalPatients = $patientRow['total_patients'];
                $appointmentQuery = "SELECT COUNT(*) AS total_appointments FROM appointmenttb WHERE doctor='$doctor'";
                $appointmentResult = mysqli_query($con, $appointmentQuery);
                $appointmentRow = mysqli_fetch_assoc($appointmentResult);
                $totalAppointments = $appointmentRow['total_appointments'];
                ?>
                <div class="col-sm-4" style="left: 10%;">
                  <div class="card text-center shadow-lg border-0">
                    <div class="card-body">
                      <div class="d-flex justify-content-center align-items-center">
                        <span class="fa-stack fa-2x">
                          <i class="fas fa-circle fa-stack-2x text-primary"></i>
                          <i class="fas fa-calendar-check fa-stack-1x text-white"></i>
                        </span>
                      </div>
                      <h5 class="card-title mt-3">Total Appointments</h5>
                      <h2 class="display-5 fw-bold text-primary" id="appointmentCount"><?php echo ($totalAppointments);  ?></h2>
                      <a href="#list-app" onclick="clickDiv('#list-app-list')" class="btn btn-primary mt-3"> Appointment List</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4" style="left: 10%;">
                  <div class="card text-center shadow-lg border-0">
                    <div class="card-body">
                      <div class="d-flex justify-content-center align-items-center">
                        <span class="fa-stack fa-2x">
                          <i class="fas fa-circle fa-stack-2x text-primary"></i>
                          <i class="fas fa-file-medical fa-stack-1x text-white"></i>
                        </span>
                      </div>
                      <h5 class="card-title mt-3">Total Patients</h5>
                      <h2 class="display-5 fw-bold text-primary" id="appointmentCount"><?php echo ($totalPatients);  ?></h2>
                      <a href="#list-patient" onclick="clickDiv('#list-patient-list')" class="btn btn-primary mt-3"> Patients List</a>
                    </div>
                  </div>
                </div>






              </div>
            </div>
          </div>

          <!-- appoinment div -->
          <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
            <div class="d-flex justify-content-between mb-3">
              <input type="text" id="searchInput" class="form-control" style="width: 100%;" placeholder="Search by Appointments...">

            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Patient ID</th>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Current Status</th>
                  <th scope="col">Action</th>
                  <th scope="col">Prescribe</th>

                </tr>
              </thead>
              <tbody id="patientTable">
                <?php
                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;
                $dname = $_SESSION['dname'];
                $query = "select pid,ID,fname,lname,gender,email,contact,appdate,apptime,userStatus,doctorStatus from appointmenttb where doctor='$dname';";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['ID']; ?></td>
                    <td class="patient-name"><?php echo $row['fname'] . $row['lname']; ?></td>

                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['appdate']; ?></td>
                    <td><?php echo $row['apptime']; ?></td>
                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        echo "Active";
                      }
                      if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                        echo "Cancelled by Patient";
                      }

                      if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                        echo "Cancelled by You";
                      }
                      ?></td>

                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


                        <a href="doctor-panel.php?ID=<?php echo $row['ID'] ?>&cancel=update"
                          onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                          title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                      <?php } else {

                        echo "Cancelled";
                      } ?>

                    </td>

                    <td>

                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>

                        <a href="prescribe.php?pid=<?php echo $row['pid'] ?>&ID=<?php echo $row['ID'] ?>&fname=<?php echo $row['fname'] ?>&lname=<?php echo $row['lname'] ?>&appdate=<?php echo $row['appdate'] ?>&apptime=<?php echo $row['apptime'] ?>"
                          tooltip-placement="top" tooltip="Remove" title="prescribe">
                          <button class="btn btn-success">Prescibe</button></a>
                      <?php } else {

                        echo "-";
                      } ?>

                    </td>


                  </tr></a>
                <?php } ?>
              </tbody>
            </table>
            <br>
          </div>
          <!-- Patient div -->
          <div class="tab-pane fade" id="list-patient" role="tabpanel" aria-labelledby="list-home-list">

            <!-- Search Input Field and Add Patient Button -->
            <div class="d-flex justify-content-between mb-3">
              <input type="text" id="searchInput" class="form-control" style="width: 100%;" placeholder="Search by Patient Name...">

            </div>

            <!-- Table Container -->
            <div class="table-container">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">PatientID</th>
                    <th scope="col"> Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="patientTable">
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                  global $con;
                  $query = "SELECT pid, fname, lname, gender, email, contact, address, dob FROM patreg";
                  $result = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['pid']; ?></td>
                      <td class="patient-name"><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['dob']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td>
                        <a href="doctor-panel.php?ID=<?php echo $row['pid'] ?>&cancel=update" title="Cancel Appointment">
                          <button class="btn btn-primary">View</button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>




          <!-- Pres div -->
          <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
            <table class="table table-hover">
              <thead>
                <tr>

                  <th scope="col">Patient ID</th>

                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Disease</th>
                  <th scope="col">Allergy</th>
                  <th scope="col">Prescribe</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select pid,fname,lname,ID,appdate,apptime,disease,allergy,prescription from prestb where doctor='$doctor';";

                $result = mysqli_query($con, $query);
                if (!$result) {
                  echo mysqli_error($con);
                }


                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['ID']; ?></td>

                    <td><?php echo $row['appdate']; ?></td>
                    <td><?php echo $row['apptime']; ?></td>
                    <td><?php echo $row['disease']; ?></td>
                    <td><?php echo $row['allergy']; ?></td>
                    <td><?php echo $row['prescription']; ?></td>

                  </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>

          <!-- Add patient  div -->
          <div class="tab-pane fade" id="list-add-patient" role="tabpanel" aria-labelledby="list-home-list">
            <div id="responseMessage"></div>
            <form id="patientForm">
              <div class="row register-form">

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name *" name="fname" required />
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Your Email *" name="email" required />
                  </div>

                  <!-- Marital Status -->
                  <div class="form-group">
                    <select name="marital_status" class="form-control">
                      <option value="" disabled selected>Select Marital Status</option>
                      <?php
                      $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                      $sql = "SELECT id, name FROM marital_status";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                      } else {
                        echo '<option value="">No options available</option>';
                      }
                      $con->close();
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" id="password" name="password" required />
                  </div>

                  <div class="form-group">
                    <label class="radio inline">
                      <input type="radio" name="gender" value="Male" checked> Male
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="gender" value="Female"> Female
                    </label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name *" name="lname" required />
                  </div>

                  <div class="form-group">
                    <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone *" required />
                  </div>
                  <div class="form-group">
                    <input type="date" name="dob" class="form-control" placeholder="Date of Birth *" />
                  </div>
                  <div class="form-group">
                    <input type="text" name="referred_by" class="form-control" placeholder="Referred By *" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password *" name="cpassword" required />
                    <span id='message'></span>
                  </div>
                  <input hidden type="text" name="addPatient" value="addPatient" class="form-control" placeholder="Referred By *" />
                  <input hidden type="text" name="patsub1" value="patsub1" class="form-control" placeholder="Referred By *" />
                  <input type="submit" class="btnRegister btn btn-success" name="patsub1" onclick="return checklen();" value="Register" />
                </div>

              </div>
            </form>



          </div>





          <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Consultancy Fees</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select * from appointmenttb;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                  #$fname = $row['fname'];
                  #$lname = $row['lname'];
                  #$email = $row['email'];
                  #$contact = $row['contact'];
                ?>
                  <tr>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['doctor']; ?></td>
                    <td><?php echo $row['docFees']; ?></td>
                    <td><?php echo $row['appdate']; ?></td>
                    <td><?php echo $row['apptime']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
          </div>





          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
            <form class="form-group" method="post" action="admin-panel1.php">
              <div class="row">
                <div class="col-md-4"><label>Doctor Name:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="doctor" required></div><br><br>
                <div class="col-md-4"><label>Password:</label></div>
                <div class="col-md-8"><input type="password" class="form-control" name="dpassword" required></div><br><br>
                <div class="col-md-4"><label>Email ID:</label></div>
                <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div><br><br>
                <div class="col-md-4"><label>Consultancy Fees:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="docFees" required></div><br><br>
              </div>
              <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
            </form>
          </div>
          <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- JavaScript for Search Functionality -->
  <script>
    $(document).ready(function() {

      $("#patientForm").on("submit", function(e) {
        e.preventDefault();
        // let formData = $(this).serializeArray();
        // let dataString = "";
        // formData.forEach(item => {
        //   dataString += `${item.name}: ${item.value}\n`;
        // });
        // alert("Submitted Data:\n" + dataString);

        $.ajax({
          url: "func2.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(response) {
            var messageDiv = $("#responseMessage");

            // Parse the JSON response if needed
            if (typeof response === "string") {
              response = JSON.parse(response);
            }

            alert(response.message); // Show the message in an alert

            messageDiv.html(response.message).css({
              "position": "fixed",
              "left": "50%",
              "transform": "translate(-50%, -50%)",
              "background": "green",
              "color": "white",
              "padding": "15px",
              "border-radius": "5px",
              "font-size": "16px",
              "text-align": "center",
              "z-index": "9999",
              "display": "block"
            });

            setTimeout(function() {
              messageDiv.fadeOut();
            }, 3000); // Hide after 3 seconds

            $("#patientForm")[0].reset(); // Reset the form
          },
          error: function() {
            $("#responseMessage").html("<p style='color:red;'>Error submitting form.</p>");
          }
        });
      });
    });



    document.getElementById("searchInput").addEventListener("keyup", function() {
      let filter = this.value.toLowerCase();
      let rows = document.querySelectorAll("#patientTable tr");

      rows.forEach(row => {
        let name = row.querySelector(".patient-name").textContent.toLowerCase();
        row.style.display = name.includes(filter) ? "" : "none";
      });
    });

    function checklen() {
      var pass1 = document.getElementById("password");
      if (pass1.value.length < 6) {
        alert("Password must be at least 6 characters long. Try again!");
        return false;
      }
    }

    function clickDiv(id) {
      console.log(id);
      document.querySelector(id).click();
    }
  </script>
</body>

</html>