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
                                                     <div class="col-md-11 mr-2 ml-5 mt-2">
                                                         <div class="col-md-12">
                                                           <div class="card mt-2">
                                                             <div class="card-header border-0" style='padding: 0.55rem 1rem;'>
                                                               <form action="#" id="getClassAttandance">

                                                                 <div class="row">
                                                                 <div class="col-md-5">
                                                                 <div class="form-group">
                                                                    <label name="class-name"> Class To Make A Class Attendance For</label>
                                                                    <select name="class_name" id="selectClassAttendanceClass" class="form-control form-control-sm select2 select2-info">
                                                                      <option disabled selected> Select Class To Make Attendance</option>
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
                                                                  </div>
                                                                  <div class="col-md-5">
                                                                  <div class="form-group">
                                                                    <label name="class-name">Subject</label>
                                                                    <select name="subject_name" id="selectClassAttendanceSubject" class="form-control form-control-sm select2 select2-info">
                                                                      <option disabled selected> Select Subject</option>
                                                                      <?php
                                                                        include '../config.php';
                                                                         // Attempt select query execution
                                                                         $id= $_SESSION["user_id"];
                                                                         $sql = "SELECT subjects.id,subjects.subject_name FROM subjects,teachers,teacher_subjects
                                                                          WHERE teacher_subjects.teacher_id = teachers.id and teacher_subjects.subject_id = subjects.id 
                                                                          AND teachers.id = $id
                                                                         ";
                                                                        if($result = mysqli_query($con, $sql)){
                                                                           if(mysqli_num_rows($result) > 0){
                                                                               while($row = mysqli_fetch_array($result)){
                                                                                 echo "<option name='subject_name' value =" . $row['id']  . ">" . $row['subject_name']  . "</option>";
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
                                                                    <input type="hidden" name="formId" value="getAttandanceTable">
                                                                  </div>
                                                                  </div>
                                                                  <div class="col-md-2">
                                                                     <button type = 'submit' class="btn btn-primary btn-block checkAllBtn mt-4" id="selectClassAttendance">
                                                                      <i class='fas fa-check'></i> View 
                                                                     </button>  
                                                                  </div>
                                                                  </div>
                                                               </form> 
                                                               <div class="row">
                                                                       <hr>
                                                                   <div class="col-md-10">
                                                                     <form action="#" id="makeAttandance">
                                                                     <table id="viewFeesTable" class="table table-bordered table-hover">
                                                                      <?php
                                                                        echo "</table>";
                                                                      ?>
                                                                      <input type="hidden" name='formId' value="makeClassAttendance">
                                                                         <button class="btn btn-outline-success btn-block checkAllBtn" style="display:none" id="makeAttendanceTable">
                                                                            <i class='fas fa-plus'></i> Record New Class Attendance
                                                                         </button>
                                                                      </form>
                                                                    </div>
                                                                    <div class="col-md-2 mt-4" >
                                                                         <button class="btn btn-outline-info btn-block checkAllBtn" style="margin-top:-25px;display:none" id="checkAll">
                                                                           <i class='fas fa-check'></i> Check All
                                                                         </button>
                                                                         <button class="btn btn-outline-danger btn-block checkAllBtn" style="margin-top:4px;display:none" id="unCheckAll">
                                                                            <i class='fas fa-times'></i> UnCheck All
                                                                         </button>

                                                                    </div>
                                                               </div>
                                                              </div>
                                                            </div>
                                                         </div>
                                                       </div>
                                                       <!-- /.col-md-9 -->

                </div>
            </div>
  
        </div>
        <!-- /.row -->


            <!-- /.card -->
          </div>
          <div class="col-4" id='small'>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"> View Class Attendance Class Attendance List</h3>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style='min-height:650px'>
                <div class="row">
                <div class="col-md-11 mr-2 ml-5 mt-2">
                                                         <div class="col-md-12">
                                                           <div class="card mt-2">
                                                             <div class="card-header border-0" style='padding: 0.55rem 1rem;'>
                                                               <form action="#" id="getClassAttandance">

                                                                 <div class="row">
                                                                 <div class="col-md-5">
                                                                 <div class="form-group">
                                                                    <label name="class-name"> Class To Make A Class Attendance For</label>
                                                                    <select name="class_name" id="selectClassAttendanceClass" class="form-control form-control-sm select2 select2-info">
                                                                      <option disabled selected> Select Class To Make Attendance</option>
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
                                                                  </div>
                                                                  <div class="col-md-5">
                                                                  <div class="form-group">
                                                                    <label name="class-name">Subject</label>
                                                                    <select name="subject_name" id="selectClassAttendanceSubject" class="form-control form-control-sm select2 select2-info">
                                                                      <option disabled selected> Select Subject</option>
                                                                      <?php
                                                                        include '../config.php';
                                                                         // Attempt select query execution
                                                                         $id= $_SESSION["user_id"];
                                                                         $sql = "SELECT subjects.id,subjects.subject_name FROM subjects,teachers,teacher_subjects
                                                                          WHERE teacher_subjects.teacher_id = teachers.id and teacher_subjects.subject_id = subjects.id 
                                                                          AND teachers.id = $id
                                                                         ";
                                                                        if($result = mysqli_query($con, $sql)){
                                                                           if(mysqli_num_rows($result) > 0){
                                                                               while($row = mysqli_fetch_array($result)){
                                                                                 echo "<option name='subject_name' value =" . $row['id']  . ">" . $row['subject_name']  . "</option>";
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
                                                                    <input type="hidden" name="formId" value="getAttandanceTable">
                                                                  </div>
                                                                  </div>
                                                                  <div class="col-md-2">
                                                                     <button type = 'submit' class="btn btn-primary btn-block checkAllBtn mt-4" id="selectClassAttendance">
                                                                      <i class='fas fa-check'></i> View 
                                                                     </button>  
                                                                  </div>
                                                                  </div>
                                                               </form> 
                                                               <div class="row">
                                                                       <hr>
                                                                   <div class="col-md-10">
                                                                     <form action="#" id="makeAttandance">
                                                                     <table id="viewFeesTable" class="table table-bordered table-hover">
                                                                      <?php
                                                                        echo "</table>";
                                                                      ?>
                                                                      <input type="hidden" name='formId' value="makeClassAttendance">
                                                                         <button class="btn btn-outline-success btn-block checkAllBtn" style="display:none" id="makeAttendanceTable">
                                                                            <i class='fas fa-plus'></i> Record New Class Attendance
                                                                         </button>
                                                                      </form>
                                                                    </div>
                                                                    <div class="col-md-2 mt-4" >
                                                                         <button class="btn btn-outline-info btn-block checkAllBtn" style="margin-top:-25px;display:none" id="checkAll">
                                                                           <i class='fas fa-check'></i> Check All
                                                                         </button>
                                                                         <button class="btn btn-outline-danger btn-block checkAllBtn" style="margin-top:4px;display:none" id="unCheckAll">
                                                                            <i class='fas fa-times'></i> UnCheck All
                                                                         </button>

                                                                    </div>
                                                               </div>
                                                              </div>
                                                            </div>
                                                         </div>
                                                       </div>
                                                       <!-- /.col-md-9 -->

                </div>
            </div>
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
  