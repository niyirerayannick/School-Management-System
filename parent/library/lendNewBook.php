<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Library</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lend A Book</li>
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
                <h3 class="card-title">Lend A Book</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="min-height:600px">
              <div class="row">
           <div class="col-md-1"></div>
              <div class="col-md-9">
              <form >
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
             
                 <div class="form-group">
                  <label>Student</label>
<select id='studentLibrary' name ="student_library" class="form-control form-control-sm select2 select2-info"
 data-dropdown-css-class="select2-info" style="width: 100%;" >
                    <option selected="selected" disabled>Select Student</option>
                    <?php
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
  $sql = "SELECT * FROM students";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<option name='className' value =" . $row['id']  . ">" . $row['FullName']  . "</option>";
        }
        // Free result set
    } else{
        echo "<option disabled selected >No Students Currently</option>
        ";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Book Name</label>
                    <input type="text" class="form-control" id="book_name" name="book_name"
                     placeholder="Enter The Book Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Took The Book On</label>
                    <input type="date" class="form-control" id="pickup_date" name = "pickup_date" 
                    placeholder="Enter The Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">The Book Will Be Submitted Back On</label>
                    <input type="date" class="form-control" id="submission_date" name="submission_date"
                     placeholder="Enter The Date">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="hidden" id="lendNewBook" name="formId" value ="lendNewBook">
                  <button type="submit" class="btn btn-success" id="lendNewBookBtn">Lend This Book</button>
                  <button type="reset" class="btn btn-danger float-right">Submit</button>
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