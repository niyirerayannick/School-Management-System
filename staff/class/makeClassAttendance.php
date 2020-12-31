<?php
session_start();
?>
<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CLASS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class Attendance </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content">
     <div class="container-fluid">
     <div class="row">
        <div class="col-8" id='big'>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"> Make A Class Attendance List</h3>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style='min-height:650px'>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="card mt-2">
                           <div class="card-header border-0" style='padding: 0.55rem 1rem;'>
                               <form action="#">
                                   <div class="form-group">
                                        <label name="class-name">Select Class To Make A Class Attendance</label>
                                        <input type="hidden" id="addNewClassForm" name="formId" value ="addNewClass">
                                       <select name="class-name" id="selectClassAttendance" class="form-control form-control-sm select2 select2-info">
                                           <option disabled selected> Select Class To View Fee Collection</option>
                                           <?php
                                           include '../config.php';
                                           // Attempt select query execution
                                           $id= $_SESSION["user_id"];
                                           $sql = "SELECT classes.id,classes.class_name FROM classes,streams,teachers,teacher_classes WHERE teacher_classes.stream_id = streams.id
                                           and streams.class_id = classes.id AND teachers.id = $id
                                           ";
                                          if($result = mysqli_query($con, $sql)){
                                           if(mysqli_num_rows($result) > 0){
                                          while($row = mysqli_fetch_array($result)){
                                            echo "<option name='className' value =" . $row['id']  . ">" . $row['class_name']  . "</option>";
                                              }
                                           // Free result set
                                          } else{
                                          echo "<option disabled selected >No Classes Currently</option>
                                                             ";
                                          }
                                          } else{
                                          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                            }
                                           ?>
                                        </select>
                                    </div>
                                </form> 
                               </div>
                          </div></div>
                          <div class="col-md-6">
                          <div class="card mt-2 border-0">
                           <div class="card-header" style='padding: 0.55rem 1rem;'>
                               <form action="#">
                                   <div class="form-group">
                                        <label name="class-name">Select Class To Make A Class Attendance</label>
                                        <input type="hidden" id="addNewClassForm" name="formId" value ="addNewClass">
                                       <select name="class-name" id="selectClassAttendance" class="form-control form-control-sm select2 select2-info">
                                           <option disabled selected> Select Class To View Fee Collection</option>
                                           <?php
                                           include '../config.php';
                                           // Attempt select query execution
                                           $id= $_SESSION["user_id"];
                                           $sql = "SELECT classes.id,classes.class_name FROM classes,streams,teachers,teacher_classes WHERE teacher_classes.stream_id = streams.id
                                           and streams.class_id = classes.id AND teachers.id = $id
                                           ";
                                          if($result = mysqli_query($con, $sql)){
                                           if(mysqli_num_rows($result) > 0){
                                          while($row = mysqli_fetch_array($result)){
                                            echo "<option name='className' value =" . $row['id']  . ">" . $row['class_name']  . "</option>";
                                              }
                                           // Free result set
                                          } else{
                                          echo "<option disabled selected >No Classes Currently</option>
                                                             ";
                                          }
                                          } else{
                                          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                            }
                                           ?>
                                        </select>
                                    </div>
                                </form> 
                               </div>
                          </div>
                          </div>
                          </div>
                        <!-- /.card -->
                        <table id="viewFeesTable" class="table table-bordered table-hover">
                                 <?php
             
                                  echo "</table>";
       
                                 ?>
                 
                                    </tbody>
                                </table>
                    </div>
                    <!-- /.col-md-9 -->
                    <div class="col-md-2 mt-4" >
                        <button class="btn btn-primary checkAllBtn" style="margin-top:114px;display:none" id="checkAll">
                        <i class='fas fa-check'></i> Check All
                    </button>
                    <button class="btn btn-danger checkAllBtn" style="margin-top:4px;display:none" id="unCheckAll">
                        <i class='fas fa-times'></i> UnCheck All
                    </button>
                    </div>
                </div>
            </div>
  
        </div>
        <!-- /.row -->


            <!-- /.card -->
          </div>
          <div class="col-4" id='small'>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"> Make A Class Attendance List</h3>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style='min-height:650px'>
                <div class="row">
                    <div class="col-md-1"> </div>
                    <div class="col-md-9">
                        <div class="card mt-2 ml-2">
                           <div class="card-body">
                               <form action="#">
                                   <div class="form-group">
                                        <label name="class-name">Select Class To View Fee Collection</label>
                                        <input type="hidden" id="addNewClassForm" name="formId" value ="addNewClass">
                                       <select name="class-name" id="selectClassFees" class="form-control form-control-sm select2 select2-info">
                                           <option disabled selected> Select Class To View Fee Collection</option>
                                           <?php
                                           include '../config.php';
                                           // Attempt select query execution
                                           $sql = "SELECT classes.id,classes.class_name FROM classes,streams,teacher_classes WHERE teacher_classes.stream_id = streams.id
                                           and streams.class_id = classes.id
                                           ";
                                          if($result = mysqli_query($con, $sql)){
                                           if(mysqli_num_rows($result) > 0){
                                          while($row = mysqli_fetch_array($result)){
                                            echo "<option name='className' value =" . $row['id']  . ">" . $row['class_name']  . "</option>";
                                              }
                                           // Free result set
                                          } else{
                                          echo "<option disabled selected >No Classes Currently</option>
                                                             ";
                                          }
                                          } else{
                                          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                            }
                                           ?>
                                        </select>
                                    </div>
                                </form>
                                <table id="viewAttandanceTable" class="table table-bordered table-hover">
                                 <?php
             
                                  echo "</table>";
       
                                 ?>
                 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body --> 
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-9 -->
                </div>
            </div>
  
        </div>
        <!-- /.row -->

            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  