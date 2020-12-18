<?php
include("../config.php");
  if($_POST["formId"] == 'addNewClass'){
    if(isset($_POST["option_name"])){
      addNewClass($_POST["class-name"],$_POST['option_name'],$_POST['stream_name']);
    }
    else{
      addNewClass($_POST["class-name"],NULL,$_POST['stream_name']);
    }
   }

  elseif($_POST["formId"] == 'selectUpdateClass'){
    selectUpdateClass($_POST['value']);
  }

  function selectUpdateClass($var){
    include("../config.php");

             $sql = "SELECT streams.id,stream_name,option_name,class_name FROM classes,streams LEFT JOIN options on streams.option_id = options.id WHERE classes.id = streams.class_id 
              and streams.id = '$var'
             ";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);?>
                 <div id='view'>
                  <section class='content-header'>
                        <div class='container-fluid'>
                          <div class='row mb-2'>
                            <div class='col-sm-6'>
                              <h1>Class</h1>
                            </div>
                            <div class='col-sm-6'>
                              <ol class='breadcrumb float-sm-right'>
                                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                                <li class='breadcrumb-item active'>Update Class Details</li>
                              </ol>
                            </div>
                          </div>
                        </div><!-- /.container-fluid -->
                      </section>
                  
                      <!-- Main content -->
                      <section class='content'>
                        <div class='container-fluid'>
                          <div class='row'>
                            <div class='col-12'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3 class='card-title'>Update Class Details</h3>
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
                                  
                                   <div class='form-group'>
                                      <label name='class-name'> Class Name</label>
                                      <input type='hidden' id='addNewClassForm' name='formId' value ='updateClass'>
                                      <input type='hidden' id='addNewClassId' name='id' 
                                      value= "<?php echo htmlentities($row['id']) ?>">
                                      
                                      <input type='text' class='form-control' id='className'
                                       value= "<?php echo $row['class_name']; ?>"
                                      name='class-name' disabled>
                                   </div>
                                   <div class='form-group'>
                                    <?php    
                                     if(!empty($row['option_name'])){
                                     ?>
                                     <label for="Stream">Option(Combination) Name</label>
                                      <input type="text" class="form-control" id="className"
                                      value = "<?php echo htmlentities($row['option_name']) ?>"
                                      name='option' disabled>
                                      <?php
                                    }
                                    else{
                                      ?>
                                      <label for="Stream">Option(Combination) Name</label>
                                       <input type="text" class="form-control"  disabled>
                                       <?php
                                    }
                                    ?>
                                   </div>
                                   <div class='form-group'>
                                     <label for="Stream">Stream Name</label>
                                      <input type='text' class='form-control form-disabled' id='className'
                                       value= "<?php echo $row['stream_name']; ?>"
                                      name="stream_name" >
                                   </div>
                                   <input type='hidden' id='addNewClassForm' name='formId' value ='updateClass'>
                                   <input type='hidden' id='addNewClassId' name='id' value = "<?php echo htmlentities($row['id']) ?>" >
                </div>
               <button type='submit' class='btn btn-success' id='updateClassBtn'>Update Class</button>

                                  </div>
                                  <!-- /.card-body -->
                    
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
                  
                 <?php
                }
               else{
                  echo "<div class='alert alert-danger' role='alert'>
                  There are was a problem performing the operation! 
                </div>";
      }
  }

  
?>
