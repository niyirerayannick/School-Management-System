<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add new teacher</li>
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
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Teacher</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
           <div class="col-md-1"></div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
            <!-- general form elements -->
              <form  id="form" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"> <span class="text-danger">*</span> Fields Must Be Filled</label>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Teacher's Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="teacher_name" name="teacher_name" placeholder="Enter The Student's Full Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telephone Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" id="telephone" placeholder="Enter the Registration Number" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-sm" id="email" placeholder="Enter the email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Martial Status <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="martial_status" placeholder="Enter the Registration Number" name="martial_status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date OF Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-sm" id="DOB" name="DOB">
                  </div>
                  
                <div class="form-group">
                    <label for="exampleInputPassword1">Nationality <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="nationality" placeholder="Enter the Nationality" name="nationality">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Qualification<span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" id="qualification" placeholder="Enter the Teacher's Qualification" name="qualification">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Staff Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" id="staff_number" placeholder="Enter the Staff Number" name="staff">
                  </div>
                  
                <div class="form-group">
                    <label for="exampleInputEmail1">Entry Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-sm" name ="entry_date" id="dob">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Special Responsability<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="special_responsability" placeholder="Enter the Teacher's Qualification" name="responsability">
                  </div>
                     <div class="form-group clearfix">
                     <label>Teacher's Subjects</label><br>
                     <?php
                     include("../config.php");
                     $sql = "SELECT * FROM subjects";
                     if($result = mysqli_query($con,$sql)){
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){

                            $color;
                            if($row['id']  % 2 == 0 && $row['id'] > 4){
                                $color = 'icheck-primary';
                            }
                            elseif($row['id']  % 2 !== 0){
                              $color = 'icheck-danger';
                              } 
                            elseif($row['id']  % 2 == 0 && $row['id'] < 4){
                                $color = 'icheck-success';
                            }
                    
                            echo"
                            <div class='" . $color . " d-inline'>
                            <input type='checkbox' id= " . $row['id'] . " name='subject[]' value= " . $row['id'] . ">
                            <label for= " . $row['id'] . "> " . $row['subject_name'] . "
                            </label>
                          </div>";
                          }
                        }
                     } 
                      ?>
                    </div>
                    <div class="form-group clearfix">
                     <label>Gender</label><br>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="male" name="gender" value='male'>
                        <label for="male"> Male
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female"> Female
                        </label>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" id="addNewTeacherForm" name="formId" value ="addNewTeacher">
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="addNewTeacherBtn">Add New Teacher</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
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
