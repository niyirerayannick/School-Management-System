<?php
include("config.php");

   ob_start();
   session_start();
 if (!isset($_SESSION['username'])) {
  header('location:../login1.html');
 }
 if ($_SESSION['user_type'] != 'staff') {
  header('location:../login1.html');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMS | Dashboard</title>
 <!-- full calendar  -->
 <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.css" />
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
   <!-- DataTables -->
   <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">

 
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

  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm" onload= "fetch('index2.php')
    .then(response => response.text())
    .then(html =>{
        let parser = new DOMParser();
        let doc = (parser.parseFromString(html, 'text/html')).querySelector('#view');
        contentWrapper.innerHTML = doc.innerHTML;
    })">
<div class="wrapper" id="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar nav-flat navbar-expand navbar-info navbar-dark nav-fixed text-sm ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" id="homeDashboard">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" id="classAttendanceHome">
        <a href="#" class="nav-link">Class Attendance</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" >
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <span> Sign Out </span> <i class="fa fa-sign-out"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Your Really Want to log out</span>
          <div class="dropdown-divider"></div> 
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

?>     |   Teacher</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id='navBar'> 
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open" id="dashboard">
            <a href="#" class="nav-link bg-navy active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="#" class="nav-link"  id='viewStudents'>
                  <i class="fas fa-list-ol nav-icon"></i>
                  <p>List all Students</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="#" class="nav-link" id='highPerformingStudents'>
                  <i class="fa fa-pen nav-icon"></i>
                  <p>High Performing Students</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Classes
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"> 
                     <?php
 // Attempt select query execution
 $teacher_id = $_SESSION["user_id"];
   $sql = "SELECT * FROM classes , teacher_classes,streams WHERE streams.class_id = classes.id AND streams.id = teacher_classes.stream_id 
   AND teacher_classes.teacher_id = $teacher_id";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?></span>
              </p>
            </a>
            <ul class="nav nav-treeview" >
           
              <li class="nav-item">
                <a href="#" class="nav-link"  id='viewClasses'>
                  <i class="fa fa-ellipsis-v nav-icon"></i>
                  <p>List My Classes</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="#" class="nav-link" id="ViewClassStream">
                  <i class="fa fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Combination</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id='addExamResult'>
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Exams
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
            <li class="nav-item" id='getExamResults'>
                <a href="#" class="nav-link" id="viewExamResult">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Exam Results</p>
                </a>
              </li>
              <li class="nav-item" id='getExamResults'>
                <a href="#" class="nav-link" id="viewExamResult">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Exam Results</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="#" class="nav-link" id='viewExamCategories'>
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Exam Categories</p>
                </a>
              </li>
            </ul>
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
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-address-book"></i>
              <p>
               Subjects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id="viewSubjects">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View My Subjects</p>
                </a>
              </li>
 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                School Fees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id="viewFeesStructure">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View School Fees Structure</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link" id="recentFeesCollection">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Fees Collection</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-comments-dollar"></i>
              <p>
                Banks
                <i class="fas fa-angle-left right"></i>
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
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" id="viewBanks">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banks You Work With</p>
                </a>
              </li>

              
            </ul>
          </li>
          <li class="nav-item" id= 'timeTable'>
            <a href="#" class="nav-link">
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