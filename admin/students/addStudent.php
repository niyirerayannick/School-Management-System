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
            <div class="card card-outline card-info">
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
                    <div class="form-group">
                    <label for="exampleInputEmail1">Student's Parent Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="fullName" name="parent" placeholder="Enter The Parent's Full Name">
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
