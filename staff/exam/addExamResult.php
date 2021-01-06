<?php
session_start();
?>
<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Exam Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Exam Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="min-height:600px">
                     <div class="row">
                        <!-- left column -->
                        <div class="col-md-9">
                          <!-- general form elements -->
                          <form >
                            <div class="card-body">
                             <div class="row">
                               <div class="col-md-1"></div>
                               <div class="col-md-9">
                                 <div class="card mt-2 ml-2">
                                   <!-- /.card-header -->
                                   <div class="card-body">
                                   <div class="form-group">
                                        <label>Student Name</label>
                                        <select name='student_id' class="form-control select2 select2-info" data-dropdown-css-class="select2-secondary">
                                          <option selected="selected" disabled>Select The Student's Name</option>
                                          <?php
                                          include("../config.php");
                                          // Attempt select query execution
                                          $sql = "SELECT
                                          students.id,FullName,DOB,DOJ,RegNo,Photo,class_name, hostel_name ,parent_name , category_name ,
                                          sessions.Year,option_name,stream_name
                                          FROM 
                                          students,classes,sessions,student_category,hostels,parents,streams 
                                          LEFT JOIN options on options.id = streams.option_id 
                                          WHERE
                                          students.hostel_id = hostels.id and students.parent_id = parents.id AND students.stream_id = streams.id AND streams.class_id = classes.id 
                                          and students.student_category = student_category.id  AND sessions.status = 'active'";
                                          if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                              while($row = mysqli_fetch_array($result)){
                                                echo "<option value=" . $row['id'] . ">" . $row['FullName'] . "</option>";
                                              }
                                            } else{
                                              echo "<option disabled> No Students Currently</option>";     
                                                    }
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Subject Name</label>
                                        <select name = "subject_id" class="form-control select2 select2-info" data-dropdown-css-class="select2-info">
                                           <option selected="selected" disabled>Select The Subject</option>
                                           <?php
                                           $teacher_id = $_SESSION["user_id"];
                                           $sql = "SELECT * FROM subjects,teacher_subjects,teachers WHERE subjects.id = teacher_subjects.subject_id AND teachers.id = teacher_subjects.teacher_id and teachers.id = $teacher_id";
                                          if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){                                         
                                                while($row = mysqli_fetch_array($result)){
                                                  echo "<option value=" . $row['id'] . ">". $row['subject_name'] . "</option>";     
                                                 }
                                              } else{
                                                echo "<option disabled> No Subjects Currently</option>";     
                                                      }
                                            } ?>    
                                         </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Exam Category</label>
                                        <select name="category_id" class="form-control select2 select2-info" data-dropdown-css-class="select2-primary">
                                           <option selected="selected" disabled>Choose The Category</option>
                                           <?php
                                           $sql = "SELECT * FROM exam_categories";
                                          if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){                                         
                                                while($row = mysqli_fetch_array($result)){
                                                  echo "<option value=" . $row['id'] . ">". $row['category_name'] . "</option>";     
                                                 }
                                              } else{ 
                                                echo "<option disabled> No Exam Categories Currently</option>";     
                                                      }
                                            } else{
                                               echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                               }
                                                  ?>    
                                         </select>
                                      </div>
                                          <div class="form-group">
                                           <label>Academic Year <span class="text-danger">*</span></label>
                                           <select name="academic_year" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info">
                                             <option selected="selected" disabled>Select Current Academic Year</option>
                                             <?php
                                               // Attempt select query execution
                                              $sql = "SELECT * FROM sessions WHERE status = 'active'";
                                              if($result = mysqli_query($con, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                 while($row = mysqli_fetch_array($result)){
                                                   echo "<option name='year' value =" . $row['id']  . ">" . $row['Year']  . " : Term " . $row['Term']  . "</option>";
                                                    }
                                                  // Free result set
                                                } else{
                                                 echo "<option disabled selected >No Academic Year Currently</option>";
                                                  }
                                              } else{
                                               echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                              }
                                              ?>
                                           </select>
                                         </div>
                                       <!-- /.form group -->
                                       <div class="form-group">
                                           <input type="text" class="form-control" name="marks" placeholder="Enter the student's marks" data-inputmask='"mask": "99"' data-mask>
                                       </div>
                                       <!-- /.card-body -->
                                    </div>
                                    <div class="card-footer">
                                    <input type="hidden" name='formId' value="addExamResult">
                                     <button type="submit" class="btn btn-success" id="addExamResultBtn">Add Subject Result</button>
                                     <button type="reset" class="btn btn-danger float-right" >Cancel</button>
                                    </div>
                                    <!-- /.card-->
                                  </div>
                               </div>
                              </div>
                            </div>
                         </form>
                       </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.card-body -->
                   </div>
                   <!-- /.card -->
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
    </div>

