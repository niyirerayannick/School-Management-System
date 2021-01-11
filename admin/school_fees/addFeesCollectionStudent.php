<form >
                            <div class="card-body" id ='view'>
                              <div class="row">
                                  <div class="col-md-1"></div>
                                      <div class="col-md-9">
                                         <div class="card mt-2 ml-2">
                                          <!-- /.card-header -->
                                              <div class="card-body">
                                                  <div class="form-group">
                                                      <label>Student Name</label>
                                                      <select name='student_id' class="form-control select2 select2-info" data-dropdown-css-class="select2-secondary">
                                                            <?php
                                                              include("../config.php");
                                                              // Attempt select query execution
                                                               $sql = "SELECT id,FullName FROM 
                                                               students WHERE students.id = '$_POST[student_id]'";
                                                               if($result = mysqli_query($con, $sql)){
                                                                  if(mysqli_num_rows($result) > 0){
                                                                      while($row = mysqli_fetch_array($result)){
                                                                         echo "<option value=" . $row['id'] . " selected>" . $row["FullName"] . "</option>";
                                                                        }
                                                                   } else{
                                                                     echo "<option disabled> No Such Students </option>";     
                                                                  }
                                                               }
                                                          ?>
                                                        </select>
                                                  </div>

                                                  <div class="form-group">
                                                      <label>Bank Name</label>
                                                      <select name='bank_id' class="form-control select2 select2-info" data-dropdown-css-class="select2-secondary">
                                                         <option selected="selected" disabled>Select The Bank's Name</option>
                                                            <?php
                                                              include("../config.php");
                                                              // Attempt select query execution
                                                               $sql = "SELECT * FROM banks ";
                                                               if($result = mysqli_query($con, $sql)){
                                                                  if(mysqli_num_rows($result) > 0){
                                                                      while($row = mysqli_fetch_array($result)){
                                                                         echo "<option value=" . $row['id'] . ">" . $row['bank_name'] . "</option>";
                                                                        }
                                                                   } else{
                                                                     echo "<option disabled> No Students Currently</option>";     
                                                                  }
                                                               }
                                                          ?>
                                                        </select>
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="exampleInputEmail1">School Fees Amount Paid</label>
                                                     <input type="text" class="form-control" name="amount" id="amount" 
                                                     placeholder="Enter Fees Amount">
                                                  </div>  
                                                <div class="form-group">
                                           <label>Academic Year <span class="text-danger">*</span></label>
                                           <select name="academic_year" class="form-control form-control-sm select2 select2-info" data-dropdown-css-class="select2-info">
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
                                         </div>
                                                 <!-- /.card-body -->
                                                <div class="card-footer">
                                                   <input type="hidden" id="changeFeeStructureForm" name="formId" value ="addFeesCollection">
                                                   <button class="btn btn-success"  id="AddFeesCollectionBtn">Add New Fees Collection</button>
                                                   <button type="reset" class="btn btn-danger float-right">Cancel</button>
                                                </div>
                                           </form>