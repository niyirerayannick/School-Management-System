<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class Attendance</li>
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
                <h3 class="card-title">View Class Attendance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style= 'min-height:600px'>
                 <div class="row">
                           <!-- left column -->
                     <div class="col-md-12">
                      <!-- general form elements -->
                               <form id='form' action='#'>
                                 <div class="card-body">
                                   <div class="row">
                                     <div class="col-md-3">
                                       <div class="card mt-2">
                                         <!-- /.card-header -->
                                         <div class="card-body">
                                         <span class="text-danger">*</span> Denotes required fields
                                            <div class="form-group">
                                                <label>Class <span class="text-danger">*</span></label>
                                                <select id='classTimeTable' name ="class_name" class="form-control form-control-sm "
                                                data-dropdown-css-class="select2-info" style="width: 100%;" >
                                                    <option selected="selected" disabled>Select Student's Class </option>
                                                     <?php
                                                     include '../config.php';
                                                     // Attempt select query execution
                                                     $sql = "SELECT class_name,classes.id FROM classes,streams streams LEFT JOIN options on options.id = streams.option_id
                                                     ,sessions
                                                     WHERE streams.class_id = classes.id GROUP by class_name ORDER BY class_name
                                                      ";
                                                      if($result = mysqli_query($con, $sql)){
                                                          if(mysqli_num_rows($result) > 0){
                                                              while($row = mysqli_fetch_array($result)){
                                                                   echo "<option name='className' value =" . $row['id']  . ">" . $row['class_name']  . "</option>";
                                                                 }
                                                                // Free result set
                                                              } else{
                                                              echo "<option disabled selected >No Classes Currently</option> ";
                                                               }
                                                          }  else{
                                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                                       }
                                                           ?>
                                                </select>
                                             </div>
                                             <div class="form-group" style= "display:none" id="optionDiv">
                                               <label>Option <span class="text-danger">*</span> </label>
                                               <select id='optionSelect' name= "option_name" class="form-control form-control-sm select2 select2-info"
                                               data-dropdown-css-class="select2-info" style="width: 100%;">
                    
                                               </select>
                                             </div>
                                             <div class="form-group" id="streamDiv"> 
                                                <label>Stream <span class="text-danger">*</span></label>
                                                <select name="stream_name" id="stream_name" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                                                  <option selected="selected" disabled>Select Student's Stream</option>
                                                </select>
                                             </div>
                                             <button type="submit" class="btn btn-info btn-block" id="viewClassAttendance">
                                             View Attendance</button>
                                             </button>
                                         
                                          </div>
                                          <!-- /.card-body -->     
                                       </div>
                                       <!-- /.card -->
                                     </div>
                                     <!-- /.col-md-5 -->
                                     <div class="col-md-9" id='classAttendanceChart'>
                  
                                     <div class='row'>
      <div class='col-md-8' style="display:none" id="empty">
        <div class='callout callout-danger '>
        <h5><i class='icon fas fa-bullhorn'></i> No Chart Analytics!</h5>
       There are no record of attendance for this class in  the database
        </div>
   </div>

                                     </div>
                                   </div>
                                   <!-- /.row -->
                                 </div>
                                 <!-- /.card-body  -->
                               </form>          
                             </div>
                             <!-- /.col-md-10 -->

            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>