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
        <div class="row">
          <div class="col-12">
<<<<<<< HEAD
            <div class="card card-outline card-info">
=======
            <div class="card">
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
              <div class="card-header">
                <h3 class="card-title">Add New Student</h3>
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
<<<<<<< HEAD
              <form  id="form">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"> <span class="text-danger">*</span> Fields Must Be Filled</label>
                  </div>

                  
                <div class="form-group">
                    <label for="exampleInputEmail1">Student's Full Name <span class="text-danger">*</span></label>
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
=======
              <form>
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student's Full Name</label>
                    <input type="text" class="form-control form-control-sm" id="fullName" name="fullName" placeholder="Enter The Student's Full Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control form-control-sm" name ="email" id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Registration Number</label>
                    <input type="number" class="form-control form-control-sm" id="RegNo" placeholder="Enter the Registration Number" name="RegNo">
                  </div>
                  <div class="form-group">
                  <label>Class</label>
<select id='studentClass' name ="studentClass" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" >
                    <option selected="selected" disabled>Select Student's Class</option>
                    <?php
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
// Attempt select query execution
  $sql = "SELECT * FROM classes";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
<<<<<<< HEAD
                echo "<option name='className' value =" . $row['id']  . ">" . $row['class_name']  . "</option>";
=======
                echo "<option name='className' value =" . $row['id']  . ">" . $row['Name']  . "</option>";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
                <div class="form-group" style= "display:none" id="optionDiv">
                  <label>Option <span class="text-danger">*</span> </label>
<select id='optionSelect' name= "studentStream" class="form-control form-control-sm select2 select2-info"
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
=======
                <div class="form-group">
                  <label>Option</label>
<select name= "studentOption" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Student's Option</option>
                    <?php
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
  $sql = "SELECT * FROM classes";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<option name='className' value =" . $row['id']  . ">" . $row['Name']  . "</option>";
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
                <div class="form-group">
                  <label>Stream</label>
      <select name="studentStream" id="studentStream" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Student's Stream</option>
                    <?php
// Attempt select query execution
  $sql = "SELECT * FROM streams";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<option name='streamName' value =" . $row['id']  . ">" . $row['Name']  . "</option>";
        }
        // Free result set
    } else{
        echo "<option disabled selected >No Streams Currently</option>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Academic Year</label>
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
                  <label>Hostel <span class="text-danger">*</span></label>
=======
                  <label>Hostel</label>
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
<select name="studentHostel" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Student's Hostel</option>
                    <?php
// Attempt select query execution
  $sql = "SELECT * FROM hostels";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
<<<<<<< HEAD
                echo "<option name='hostel' value =" . $row['id']  . ">" . $row['hostel_name']  . "</option>";
=======
                echo "<option name='hostel' value =" . $row['id']  . ">" . $row['Name']  . "</option>";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
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
=======
                  <label>Student Performance Category</label>
  <select name="studentCategory" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled="selected">Select Performance</option>
                    <?php
// Attempt select query execution
  $sql = "SELECT * FROM studentcategories";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<option name='category' value =" . $row['id']  . ">". $row['Name']  . "</option>";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
                    <label for="exampleInputEmail1">Date Of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-sm" name ="dob" id="dob">
                  </div>
                <div class="form-group">
                  <label>Siblings</label>
                  <select name="sibling" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select Student's Siblings </option>
                       <option value="0">0 (No Sibling at school)</option>
                       <option value="1">1</option>
                       <option value="2">2 > (2 or More)</option>

                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Student Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                    <input id="file" type="file" accept="image/*" name="image" />
                    <div id="error"></div>
                    </div>
                  </div>
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
=======
                    <label for="exampleInputEmail1">Date Of Birth</label>
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
                    <label for="exampleInputFile">Student Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input " id="exampleInputFile" name ='studentPhoto'>
                        <label class="custom-file-label" for="studentPhoto" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                    <div class="form-group clearfix">
                      <div class="icheck-info d-inline">
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
                        <input type="radio" id="male" name="gender" value='male'>
                        <label for="male"> Male
                        </label>
                      </div>
<<<<<<< HEAD
                      <div class="icheck-primary d-inline">
=======
                      <div class="icheck-info d-inline">
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
