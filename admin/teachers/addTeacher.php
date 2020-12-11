<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<<<<<<< HEAD
            <h1>Teacher</h1>
=======
            <h1>Teachers</h1>
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
<<<<<<< HEAD
              <li class="breadcrumb-item active">Add new teacher</li>
=======
              <li class="breadcrumb-item active">Add new Teacher</li>
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
            <div class="card card-outline card-info">
=======
            <div class="card">
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
              <div class="card-header">
                <h3 class="card-title">Add New Teacher</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
<<<<<<< HEAD
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
                    <input type="text" class="form-control form-control-sm" id="fullName" name="fullName" placeholder="Enter The Student's Full Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Registration Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" id="RegNo" placeholder="Enter the Registration Number" name="RegNo">
                  </div>
                  <div class="form-group">
                  <label>Class <span class="text-danger">*</span></label>
<select id='classTimeTable' name ="studentClass" class="form-control form-control-sm "
 data-dropdown-css-class="select2-info" style="width: 100%;" >
                    <option selected="selected" disabled>Select Student's Class </option>
                    <?php
                include '../config.php';
// Attempt select query execution
  $sql = "SELECT * FROM classes";
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
                <div class="form-group" style= "display:none" id="optionDiv">
                  <label>Option <span class="text-danger">*</span> </label>
<select id='optionSelect' name= "studentOption" class="form-control form-control-sm select2 select2-info"
data-dropdown-css-class="select2-info" style="width: 100%;">
                    
                  </select>
                </div>
                <div class="form-group" id="streamDiv"> 
                  <label>Stream <span class="text-danger">*</span></label>
      <select name="studentStream" id="streamSelect" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Student's Stream</option>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label>Academic Year <span class="text-danger">*</span></label>
<select name="academicYear" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Current Academic Year</option>
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
<select name="studentHostel" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
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
  <select name="studentCategory" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-sm" name ="dob" id="dob">
                  </div>
                <div class="form-group">
                  <label>Hostel</label>
                  <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Student's Hostel</option>
                    <?php
// Attempt select query execution
  $sql = "SELECT * FROM hostels";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<option value =" . $row['id']  . ">" . $row['Name']  . "</option>";
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
                    <label for="exampleInputFile">Student Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                    <input id="uploadImage" type="file" accept="image/*" name="image" />
                    </div>
                  </div>
                    <div class="form-group clearfix">
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
                <input type="hidden" id="addNewStudentForm" name="formId" value ="addNewStudent">
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="addStudentBtn">Add New Student</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
=======
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
              <form action="ex.php" method="get"></form>
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Teacher's Full Name</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Enter The Student's Full Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 <!-- <button type="submit" class="btn btn-primary">Submit</button>-->
                 <input type="submit" value="Submit">
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
    </div>
=======
    </div>
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
