<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fees Collection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Fees </li>
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
                <h3 class="card-title"> List Fees Collection</h3>
              </div>
              <!-- /.card-header -->
             <!-- /.card-header -->
             <div class="card-body table-responsive p-0" style='min-height:650px'>
              <div class="row">
          <div class="col-md-1"> </div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
              <div class="card-body">
                <form action="#">
                  <div class="form-group">
                    <label name="class-name">Select Class To View Fee Collection</label>
                    <input type="hidden" id="addNewClassForm" name="formId" value ="addNewClass">
                    <select name="class-name" id="selectClassFees" class="form-control form-control-sm select2 select2-info">
                      <option disabled selected> Select Class To View Fee Collection</option>
                      <?php
                                  include '../config.php';
                                    // Attempt select query execution
                                   $sql = "SELECT classes.id,classes.class_name FROM classes,streams,teacher_classes WHERE teacher_classes.stream_id = streams.id
                                    and streams.class_id = classes.id
                                   ";
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
                </form>
              <table id="viewFeesTable" class="table table-bordered table-hover">
                <?php
             
        echo "</table>";
       
 ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class='row'>
            <div class = 'col-md-9'>
                    
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