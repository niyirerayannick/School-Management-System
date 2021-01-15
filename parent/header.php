<?php
include("config.php");

   ob_start();
   session_start();
 if (!isset($_SESSION['username'])) {
  header('location:../login1.html');
 }
 if ($_SESSION['user_type'] != 'parent') {
   ?>
<script>
alert("You not Authorized to view this content");
</script>
   <?php
  header('location:../login1.html');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMS | Dashboard</title>
  <link rel="shortcut icon" type="image/jpg" href="../dist/img/favicon.ico"/>
  <!-- full calendar  -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <link rel="stylesheet" href="../plugins/jquery-ui/jquery-ui.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
 <!-- BS Stepper -->
 <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
 <!-- ChartJs -->
 <link rel="stylesheet" type="text/css" href="../plugins/chart.js/Chart.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
  <style>
    /* Background Gradient for Analagous Colors */
.coral
{
    background-color: #FF5078;
    /* For WebKit (Safari, Chrome, etc) */
    background: #FF5078 -webkit-gradient(linear, left top, left bottom, from(#f19147), to(#bd7137)) no-repeat;
    /* Mozilla,Firefox/Gecko */
    background: #FF5078 -moz-linear-gradient(top, #FF9C50, #FF5078) no-repeat;
    /* IE 5.5 - 7 */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#FF9C50, endColorstr=#FF5078) no-repeat;
    /* IE 8 */
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#FF9C50, endColorstr=#FF9C50)" no-repeat;
}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 40px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: rgb(196, 40, 40);
  border-color: rgb(233, 13, 13);
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed text-sm" onload= "fetch('index2.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })">
<div class="wrapper" id="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar nav-flat navbar-expand navbar-lightblue navbar-dark nav-fixed text-sm ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" >
        <a href="#" class="nav-link" id="homeDashboard"> Home</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <span> Sign Out </span> <i class="fa fa-sign-out"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">You Really Want to Sign Out</span>
         
          <div class="dropdown-divider"></div>
          <a href="../logout.php" class="dropdown-item dropdown-footer"><i class="far fa-sign-out"> Sign Out </i></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-secondary">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <img src="../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php
 // Attempt select query execution
   $sql = "SELECT * FROM users where member_name like '$_SESSION[username]'";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_fetch_array($result);
   echo $row['member_name'];
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?>   |   Parent</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id='navBar'> 
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open" >
            <a href="#" class="nav-link bg-lightblue active" id="dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id= "viewStudents">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
               My Students
                <span class="right badge badge-info">
                <?php
 // Attempt select query execution
 $username = $_SESSION["username"];
 $user_id = $_SESSION["user_id"];

   $sql = "SELECT id FROM students WHERE parent_id = '$user_id'";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
?>
                </span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="viewExams">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Exams
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link" id='calendar'> 
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="viewSubject">
              <i class="nav-icon far fa-address-book"></i>
              <p>
               Subjects
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="viewFees">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                School Fees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="viewBanks">
              <i class="nav-icon fa fa-comments-dollar"></i>
              <p>
              School Banks Accounts
                <span class="badge badge-info right"> 
                     <?php
 // Attempt select query execution
   $sql = "SELECT * FROM banks";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"  id= 'timetable'>
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Time Table
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Main content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id='content-wrapper'>
    <!-- Content Header (Page header) -->
    <div id="view1">
    <div class="col-lg-12">
            <div class="card" style="min-height:750px">
              

              <div class="overlay light hidden" >  
                 <i class="fas fa-2x fa-sync-alt fa-spin"></i>
              </div>
             </div>
            <!-- /.card -->
    </div>
              <!-- /.card-header -->
              <div class='card-body' id="displayCalendar">