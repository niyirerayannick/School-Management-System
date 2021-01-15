

       
        <!-- Content Header (Page header) -->
<div id='view'>
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add new student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">bs-stepper</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- My  steps are  here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Student Information</span>
                      </button>
                    </div>
                    <div class="line"></div> >
                    <div class="step" data-target="#more-info">
                      <button type="button" class="step-trigger" role="tab" aria-controls="more-info" id="more-info-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">More Student Information</span>
                      </button>
                    </div>
                    <div class="line"></div> >
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Parent information</span>
                      </button>
                    </div>
                  </div>
                  <label> <span class="text-danger">*</span> Fields Must Be Filled</label>

                          <div class="bs-stepper-content">
                               <!-- My steps content are here -->
                              <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <form  id="form">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Student's Full Name <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control form-control-sm" id="fullName" name="fullName" placeholder="Enter The Student's Full Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Registration Number <span class="text-danger">*</span></label>
                                  <input type="number" class="form-control form-control-sm" id="RegNo" placeholder="Enter the Registration Number" name="RegNo" required>
                                </div>
                                <div class="form-group">
                                 <label for="exampleInputEmail1">Date Of Birth <span class="text-danger">*</span></label>
                                 <input type="date" class="form-control form-control-sm" name ="dob" id="dob" required>
                               </div>
                               <div class="form-group">
                                 <label for="exampleInputFile">Student Photo <span class="text-danger">*</span></label>
                                 <div class="input-group">
                                    <input id="file" type="file" accept="image/*" name="image" required/>
                                      <div id="error"></div>
                                 </div>
                               </div>
                              <div class="form-group clearfix">
                                  <label for="ge">Gender</label> <br>
                                  <div class="icheck-primary d-inline">
                                     <input type="radio" id="male" name="gender" value='male'>
                                         <label for="male"> Male
                                     </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                      <input type="radio" id="female" name="gender" value="female" >
                                          <label for="female"> Female
                                       </label>
                                   </div>
                                 </div>
                                 <button class="btn btn-primary" onclick="stepper.next()"> Next</button>
                             </div>

                             <div id="more-info" class="content" role="tabpanel" aria-labelledby="more-info-trigger">
                             <div class="form-group">
                                 <label>Class <span class="text-danger">*</span></label>
                                 <select id='classTimeTable' name ="studentClass" class="form-control form-control-sm "
                                   data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                   <option selected="selected" disabled>Select Student's Class </option>
                                    <?php
                                     include '../config.php';
                                     // Attempt select query execution
                                     $sql = "SELECT class_name,classes.id FROM classes,streams streams LEFT JOIN options on options.id = streams.option_id
                                     ,sessions
                                     WHERE streams.class_id = classes.id GROUP by class_name ORDER BY class_name";
                                     if($result = mysqli_query($con, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                                         while($row = mysqli_fetch_array($result)){
                                            echo "<option name='className' value =" . $row['id']  . ">" . $row['class_name']  . "</option>";
                                          }
                                          // Free result set
                                       } else{
                                        echo "<option disabled selected >No Classes Currently</option>";
                                        }
                                      } else{
                                      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                      }
                                       ?>
                                 </select>
                                </div>
                                <div class="form-group" style= "display:none" id="optionDiv">
                                  <label>Option <span class="text-danger">*</span> </label>
                                    <select id='optionSelect' name= "studentStream" class="form-control form-control-sm select2 select2-info"
                                    data-dropdown-css-class="select2-info" style="width: 100%;">  </select>
                                </div>
                                <div class="form-group" id="streamDiv"> 
                                  <label>Stream <span class="text-danger">*</span></label>
                                  <select name="studentStream" id="streamSelect" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                                    <option selected="selected" disabled>Select Student's Stream</option> 
                                  </select>
                                </div>
                                <div class="form-group">
                                   <label>Academic Year <span class="text-danger">*</span></label>
                                   <select name="academicYear" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                     <option selected="selected" disabled>Select Current Academic Year
                                     </option>
                                         <?php
                                           // Attempt select query execution
                                           $sql = "SELECT * FROM sessions";
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
                                  <div class="form-group">
                                      <label>Hostel <span class="text-danger">*</span></label>
                                         <select name="studentHostel" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                           <option selected="selected" disabled>Select Student's Hostel</option>
                                           <?php
                                             // Attempt select query execution
                                              $sql = "SELECT * FROM hostels";
                                             if($result = mysqli_query($con, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                   while($row = mysqli_fetch_array($result)){
                                                     echo "<option name='hostel' value =" . $row['id']  . ">" . $row['hostel_name']  . "</option>";
                                                   }
                                                   // Free result set
                                                 } else{
                                                 echo "<option disabled selected >No Hostels Currently</option>";
                                                }
                                             } else{
                                             echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                             }
                                           ?>
                                          </select>
                                   </div>
                                  <div class="form-group">
                                  <label>Student  Category <span class="text-danger">*</span></label>
                                  <select name="studentCategory" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                    <option selected="selected" disabled="selected">Select Category</option>
                                    <?php
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM student_category";
                                    if($result = mysqli_query($con, $sql)){
                                     if(mysqli_num_rows($result) > 0){
                                       while($row = mysqli_fetch_array($result)){
                                        echo "<option name='category' value =" . $row['id']  . ">". $row['category_name']  . "</option>";
                                        }
                                        // Free result set
                                      } else{
                                       echo "<option disabled selected >No Category  Currently</option>";
                                      }
                                   } else{
                                   echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                   }
                                   ?>
                                  </select>
                               </div>
                                 <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                 <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                             </div>

                         <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                               <div class="form-group">
                                 <label>Siblings</label><span class="text-danger">*</span>
                                 <select name="sibling" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                    <option selected="selected" disabled>Select Student's Siblings </option>
                                    <option value="0">0 (No Sibling at school)</option>
                                    <option value="1">1</option>
                                    <option value="2">2 > (2 or More)</option> 
                                  </select>
                               </div>
                               <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                               <input type="hidden" id="addNewStudentForm" name="formId" value ="addNewStudent">
                               <button type="submit" class="btn btn-success" id="addStudentBtn">Add New Student</button>
                               </form>

                           </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <strong>Copyright &copy; 2021 <a href="#">powered By</a> </strong> EduPower.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        
            </div><!-- /.container-fluid -->
         </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
