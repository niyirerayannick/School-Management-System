<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>School Fees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Fees Structure</li>
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
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">Change Fees Structure</h3>
              </div>
              <!-- /.card-header -->
<<<<<<< HEAD
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
                  <label>Class</label>
<select id='classTimeTable' name ="class_name" class="form-control form-control-sm select2 select2-info"
 data-dropdown-css-class="select2-info" style="width: 100%;" >
                    <option selected="selected" disabled>Select Class</option>
                    <?php
                $con = mysqli_connect("localhost", "root", "","student_management_system");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
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

                <div class="form-group" style= "display:none" id='optionDiv'>
                  <label>Option</label>
<select name= "option_name" class="form-control form-control-sm select2 select2-info" id="optionSelect"
data-dropdown-css-class="select2-info" style="width: 100%;">
                   
                  
                  </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">School Fees Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" 
                    placeholder="Enter Fees Amount">
                  </div>
                 
=======
              <div class="card-body table-responsive p-0">
              <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
              <form action=>
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student's Full Name</label>
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
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
<<<<<<< HEAD
                <input type="hidden" id="changeFeeStructureForm" name="formId" value ="changeFeeStructure">
                  <button class="btn btn-success"  id="changeFeeStructure">Submit</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
=======
                  <button type="submit" class="btn btn-primary">Submit</button>
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
    </div>