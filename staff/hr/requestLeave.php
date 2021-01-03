<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Requesting Leave</li>
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
                <h3 class="card-title">Request Leave</h3>
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
                    <label name="class-name">Reason For Requesting Leave</label>
                    <input type="hidden" id="addNewClassForm" name="formId" value ="addNewClass">
                    <input type="text" class="form-control" id="className" placeholder="Enter The Reason" name="reason">
                 </div>

                 <div class="form-group" style= "display:none" id="optionDiv">
                  <label>Option</label>
<select name= "option_name" class="form-control form-control-sm select2 select2-info"
data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option selected="selected" disabled>Select  Option</option>
                    <?php
                include('../config.php');
// Attempt select query execution
  $sql = "SELECT * FROM options";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo "<option name='option_name' value =" . $row['id']  . ">" . $row['option_name']  . "</option>";
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
                    <label name="class-name">Stream <spam class="text-info"> E.g A,B,C </spam></label>
                    <input type="text" class="form-control"  placeholder="Enter The Stream Name" name="stream_name">
                 </div>
                </div>
                <!-- /.card-body -->
  
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="addClassBtn">Request Leave</button>
                  <button type="reset" class="btn btn-danger float-right" >Cancel</button>

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

