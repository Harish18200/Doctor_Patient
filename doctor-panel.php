<!DOCTYPE html>
<?php
include('func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['dname'];
if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set doctorStatus='0' where ID = '" . $_GET['ID'] . "'");
}

if (isset($_GET['ID'])) {
  $appointmentID = $_GET['ID'];
  $query = "UPDATE appointmenttb SET appointment_status = 2 WHERE ID = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("i", $appointmentID);

  if ($stmt->execute()) {
    echo "<script>
          alert('Appointment Rejected Successfully');
          window.location.href = 'doctor-panel.php';
      </script>";
  } else {
    echo "<script>alert('Failed to Reject Appointment');</script>";
  }

  $stmt->close();
}
if (isset($_GET['approvalId'])) {
  $appointmentID = $_GET['approvalId'];
  $query = "UPDATE appointmenttb SET appointment_status = 1 WHERE ID = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("i", $appointmentID);

  if ($stmt->execute()) {
    echo "<script>
          alert('Appointment  Approve  Successfully');
          window.location.href = 'doctor-panel.php';
      </script>";
  } else {
    echo "<script>alert('Failed to Reject Appointment');</script>";
  }

  $stmt->close();
}
if (isset($_GET['patientDeleteId'])) {
  $patientID = $_GET['patientDeleteId'];
  $query = "DELETE FROM patreg WHERE pid = ?";

  $stmt = $con->prepare($query);
  $stmt->bind_param("i", $patientID);

  if ($stmt->execute()) {
    echo "<script>
          alert('Patient record deleted successfully.');
          window.location.href = 'doctor-panel.php';
      </script>";
  } else {
    echo "<script>alert('Failed to delete patient record.');</script>";
  }

  $stmt->close();
}


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
          <a class="list-group-item list-group-item-action " href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointment List</a>
          <a class="list-group-item list-group-item-action " href="#list-rejected" id="list-rejected-list" role="tab" data-toggle="list" aria-controls="home"> Rejected Appointment </a>
          <a class="list-group-item list-group-item-action " href="#list-approval" id="list-approval-list" role="tab" data-toggle="list" aria-controls="home"> Approval Appointment </a>
          <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
          <a class="list-group-item list-group-item-action" href="#list-patient" id="list-patient-list" role="tab" data-toggle="list" aria-controls="home"> Patient List</a>
          <a class="list-group-item list-group-item-action" href="#list-add-patient" id="list-add-patient-list" role="tab" data-toggle="list" aria-controls="home">Add Patient </a>
          <a class="list-group-item list-group-item-action" href="#list-add-expenses" id="list-add-expenses-list" role="tab" data-toggle="list" aria-controls="home"> Add Expenses</a>
          <a class="list-group-item list-group-item-action" href="#list-expenses" id="list-expenses-list" role="tab" data-toggle="list" aria-controls="home">Expenses List</a>
        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 950px;">

          <!-- Dashboard -->
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

            <!-- Added fixed height and vertical scroll -->
            <div>
              <table class="table table-hover w-100">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Approval</th>
                    <th scope="col">Rejected</th>
                  </tr>
                </thead>
                <tbody id="patientTable">
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                  global $con;
                  $dname = $_SESSION['dname'];
                  $query = "SELECT pid, ID, fname, lname, gender, email, contact, appdate, apptime, userStatus, doctorStatus 
                FROM appointmenttb 
                WHERE doctor='$dname' AND appointment_status=0;";
                  $result = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['pid']; ?></td>
                      <td><?php echo $row['ID']; ?></td>
                      <td class="patient-name"><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['appdate']; ?></td>
                      <td><?php echo $row['apptime']; ?></td>

                      </td>
                      <td>
                        <a href="doctor-panel.php?approvalId=<?php echo $row['ID']; ?>"
                          onClick="return confirm('Are you sure you want to approve this appointment?')"
                          title="Approve Appointment">
                          <button class="btn btn-success">Approval</button>
                        </a>
                      </td>
                      <td>
                        <a href="doctor-panel.php?ID=<?php echo $row['ID']; ?>"
                          onClick="return confirm('Are you sure you want to reject this appointment?')"
                          title="Reject Appointment">
                          <button class="btn btn-danger">Rejected</button>
                        </a>
                      </td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div> <!-- Closing div for table-responsive -->
          </div>
          <!-- Rejected Appoinment div -->
          <div class="tab-pane fade" id="list-rejected" role="tabpanel" aria-labelledby="list-rejected-list">
            <div class="container-fluid px-0"> <!-- Full-width container -->

              <table class="table table-hover w-100"> <!-- w-100 makes table full width -->
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Appointment Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                  global $con;

                  $query = "SELECT pid, fname, lname, ID, appdate, apptime, appointment_status 
                              FROM appointmenttb 
                              WHERE doctor='$doctor' AND appointment_status = 2;";

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
                      <td><?php echo ($row['appointment_status'] == 2) ? "REJECTED" : ""; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>
          </div>
          <!-- Approval  Appoinment div -->
          <div class="tab-pane fade" id="list-approval" role="tabpanel" aria-labelledby="list-approval-list">
            <div class="container-fluid px-0">

              <table class="table table-hover w-100">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Appointment Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                  global $con;

                  $query = "SELECT pid, fname, lname, ID, appdate, apptime, appointment_status 
                              FROM appointmenttb 
                              WHERE doctor='$doctor' AND appointment_status = 1;";

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
                      <td><?php echo ($row['appointment_status'] == 1) ? "APPROVAL" : ""; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>
          </div>
          <!-- Patient List div -->
          <div class="tab-pane fade" id="list-patient" role="tabpanel" aria-labelledby="list-home-list">

            <!-- Search Input Field and Add Patient Button -->
            <div class="d-flex justify-content-between mb-3">
              <input type="text" id="patientSearchInput" class="form-control" style="width: 100%;" placeholder="Search by Patient Name...">

            </div>

            <!-- Table Container -->
            <div class="table-container">
              <table class="table table-hover">
                <thead class="thead-dark">
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
                <tbody id="patientDataSearch">
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                  global $con;
                  $query = "SELECT pid, fname, lname, gender, email, contact, address, dob FROM patreg";
                  $result = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['pid']; ?></td>
                      <td class="patient-firstName"><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['dob']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td>

                        <button type="button" class="btn btn-primary view-btn" data-patient-id=<?php echo $row['pid']; ?>>View</button>
                        <a href="doctor-panel.php?patientDeleteId=<?php echo $row['pid']; ?>"
                          onClick="return confirm('Are you sure you want to Delete this Patient ?')"
                          title="Reject Appointment" class="btn btn-danger">Delete

                        </a>
                      </td>

                      <td>

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
              <thead class="thead-dark">
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
                    <input type="text" class="form-control" id="first_name" placeholder="First Name *" name="fname" required />
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Your Email *" name="email" required />
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
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password *" id="password" name="password" required />
                  </div>

                  <div class="form-group">
                    <label class="radio inline">
                      <input type="radio" id="male" name="gender" value="Male" checked> Male
                    </label>
                    <label class="radio inline">
                      <input type="radio" id="female" name="gender" value="Female"> Female
                    </label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name *" name="lname" required />
                  </div>

                  <div class="form-group">
                    <input type="tel" minlength="10" maxlength="10" id="phone" name="contact" class="form-control" placeholder="Your Phone *" required />
                  </div>
                  <div class="form-group">
                    <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth *" />
                  </div>
                  <div class="form-group">
                    <input type="text" name="referred_by" class="form-control" placeholder="Referred By *" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password *" name="cpassword" required />
                    <span id='message'></span>
                  </div>
                  <input hidden type="text" name="patientId" id="patientId" class="form-control" />

                  <input hidden type="text" name="addPatient" value="addPatient" class="form-control" placeholder="Referred By *" />
                  <input hidden type="text" name="patsub1" value="patsub1" class="form-control" placeholder="Referred By *" />
                  <input type="submit" class="btnRegister btn btn-success" name="patsub1" onclick="return checklen();" value="Register" />
                </div>

              </div>
            </form>



          </div>
          <!-- Add Expenses  div -->
          <div class="tab-pane fade" id="list-add-expenses" role="tabpanel" aria-labelledby="list-add-expenses-list">
            <div id="expensesMessage"></div>
            <form id="ExpensesForm">
              <div class="row register-form">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="date" class="form-control" placeholder="Date *" name="date" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="EB Bill *" name="eb_bill" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Physio Expenses *" name="physio_expenses" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Salary *" name="salary" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="TV *" name="tv" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Tea *" name="tea" />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Phone Bill *" name="phone_bill" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Food *" name="food" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Biscuit *" name="biscuit" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Cool Drinks *" name="cool_drinks" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Service *" name="service" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Work *" name="work" />
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Milk *" name="milk" />
                  </div>
                  <input hidden type="text" name="expenses" value="expenses" class="form-control" />

                  <input type="submit" name="expenses" class="btnRegister btn btn-success" value="Submit" />
                </div>
              </div>

            </form>



          </div>
          <!-- Expenses  List div -->
          <div class="tab-pane fade" id="list-expenses" role="tabpanel" aria-labelledby="list-expenses-list">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <label for="start-date">Start Date:</label>
                <input type="date" id="start-date" class="form-control d-inline-block" style="width: 150px;">
              </div>
              <div>
                <label for="end-date">End Date:</label>
                <input type="date" id="end-date" class="form-control d-inline-block" style="width: 150px;">
              </div>
              <div>
                <button id="search-btn" class="btn btn-primary">Search</button>
                <button id="reset-btn" class="btn btn-secondary">Reset</button> <!-- New Reset Button -->
              </div>
            </div>

            <!-- Table with Scroll -->
            <div style="width: 80vw; max-height: 400px; overflow-y: auto; overflow-x: auto; border: 1px solid #ddd;">
              <table class="table table-hover" style="width: 100%; border-collapse: collapse;">
                <thead class="thead-dark" style="position: sticky; top: 0; background: #343a40; color: white; z-index: 1000;">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">EB Bill</th>
                    <th scope="col">Physio Expenses</th>
                    <th scope="col">Salary</th>
                    <th scope="col">TV</th>
                    <th scope="col">Tea</th>
                    <th scope="col">Phone Bill</th>
                    <th scope="col">Food</th>
                    <th scope="col">Biscuit</th>
                    <th scope="col">Cool Drinks</th>
                    <th scope="col">Service</th>
                    <th scope="col">Work</th>
                    <th scope="col">Milk</th>
                  </tr>
                </thead>
                <tbody id="expenses-table">
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                  if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                  }

                  $query = "SELECT * FROM expenses ORDER BY date DESC";
                  $result = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row['date']; ?></td>
                      <td><?php echo $row['eb_bill']; ?></td>
                      <td><?php echo $row['physio_expenses']; ?></td>
                      <td><?php echo $row['salary']; ?></td>
                      <td><?php echo $row['tv']; ?></td>
                      <td><?php echo $row['tea']; ?></td>
                      <td><?php echo $row['phone_bill']; ?></td>
                      <td><?php echo $row['food']; ?></td>
                      <td><?php echo $row['biscuit']; ?></td>
                      <td><?php echo $row['cool_drinks']; ?></td>
                      <td><?php echo $row['service']; ?></td>
                      <td><?php echo $row['work']; ?></td>
                      <td><?php echo $row['milk']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
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
      // <!-- Add Patient Ajax Form -->
      $("#patientForm").on("submit", function(e) {
        e.preventDefault();

        let formData = $(this).serializeArray();
        let dataString = "";
        formData.forEach(item => {
          dataString += `${item.name}: ${item.value}\n`;
        });
        alert("Submitted Data:\n" + dataString);

        $.ajax({
          url: "func2.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(response) {
            console.log(response);
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
            alert('out');
            $("#responseMessage").html("<p style='color:red;'>Error submitting form.</p>");
          }
        });
      });
    });

    // Action View Button Navigator
    $(".view-btn").click(function() {
      var patientId = $(this).data("patient-id");

      console.log("Selected Patient ID: " + patientId);
      $(".list-group-item").removeClass("active");
      $("#patient-list-container").hide();
      $(".tab-pane").removeClass("show active");
      $("#list-add-patient-list").addClass("active");
      $("#list-add-patient").addClass("show active");
      $.ajax({
        url: "fetch_patient.php",
        type: "POST",
        data: {
          patient_id: patientId
        },
        dataType: "json",
        success: function(response) {
          if (response.success) {
            $("#first_name").val(response.data.fname);
            $("#last_name").val(response.data.lname);
            $("#email").val(response.data.email);
            $("#phone").val(response.data.contact);
            $("#dob").val(response.data.dob);
            $("#address").val(response.data.address);
            $("#password").val(response.data.password);
            $("#cpassword").val(response.data.password);
            $("#patientId").val(response.data.pid);
            if (response.data.gender === "Male") {
              $("#male").prop("checked", true);
            } else {
              $("#female").prop("checked", true);
            }
          } else {
            alert("Error fetching patient data.");
          }
        },
        error: function(xhr, status, error) {
          console.log("AJAX Error: " + error);
          console.log("Response Text: " + xhr.responseText);
        }
      });
    });
    $("#list-patient-list").click(function() {
      $("#patient-list-container").show();
      $(".tab-pane").removeClass("show active");
      $("#list-patient").addClass("show active");
    });

    // closed
    // removing the active class from all menu items
    $('.list-group-item').click(function(e) {
      e.preventDefault();

      // Remove 'active' class from all menu items and tab panes
      $('.list-group-item').removeClass('active');
      $('.tab-pane').removeClass('show active');

      // Add 'active' class to the clicked menu item
      $(this).addClass('active');

      // Get the target tab ID from the href attribute
      var targetTab = $(this).attr('href');

      // Show the corresponding tab content
      $(targetTab).addClass('show active');
    });
    // <!-- Add Expenses Ajax Form -->
    $("#ExpensesForm").on("submit", function(e) {
      e.preventDefault();
      // let formData = $(this).serializeArray();
      // let dataString = "";
      // formData.forEach(item => {
      //   dataString += `${item.name}: ${item.value}\n`;
      // });
      // alert("Submitted Data:\n" + dataString);

      $.ajax({
        url: "expenses.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
          var messageDiv = $("#expensesMessage");

          // Parse the JSON response if needed
          if (typeof response === "string") {
            response = JSON.parse(response);
          }

          // alert(response.message); // Show the message in an alert

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

          $("#ExpensesForm")[0].reset(); // Reset the form
        },
        error: function() {
          $("#expensesMessage").html("<p style='color:red;'>Error submitting form.</p>");
        }
      });
    });
    // <!-- search Expenses start & end date -->
    $("#search-btn").click(function() {
      var startDate = $("#start-date").val();
      var endDate = $("#end-date").val();
      var start = startDate ? new Date(startDate) : null;
      var end = endDate ? new Date(endDate) : null;
      $("#expenses-table tr").each(function() {
        var rowDate = new Date($(this).find("td:first").text().trim());
        if ((!start || rowDate >= start) && (!end || rowDate <= end)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
    $("#reset-btn").click(function() {
      $("#start-date").val("");
      $("#end-date").val("");
      $("#expenses-table tr").show();
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
    //  Appointment Tables Search
    document.getElementById("searchInput").addEventListener("keyup", function() {
      let filter = this.value.toLowerCase();
      // alert(filter);
      let rows = document.querySelectorAll("#patientTable tr");

      rows.forEach(row => {
        let name = row.querySelector(".patient-name").textContent.toLowerCase();
        row.style.display = name.includes(filter) ? "" : "none";
      });
    });

    //  patient Tables Search
    document.getElementById("patientSearchInput").addEventListener("keyup", function() {
      let filter = this.value.toLowerCase();
      // alert(filter);
      let rows = document.querySelectorAll("#patientDataSearch tr");

      rows.forEach(row => {
        let name = row.querySelector(".patient-firstName").textContent.toLowerCase();
        row.style.display = name.includes(filter) ? "" : "none";
      });
    });
  </script>
</body>

</html>