<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hostels</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Hostels</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
              <div class="row">
              <div class="col-md-12">
                           <div class="card">
                               <div class="card-header">
                                 <button class="btn btn-info card-title" id="newHostel"> <i class="fa fa-plus"></i>  Add New Hostel</button>
                               </div>
                                  <!-- /.card-header -->
                             <div class="card-body">
                                <table id="viewHostelTable" class="table table-bordered table-hover">
                                  <thead>
                                   <tr>
                                     <?php
                                                                 include '../config.php';
                                                                 // Attempt select query execution
                                                                 $sql = "SELECT * FROM hostels";
                                                                    if($result = mysqli_query($con, $sql)){
                                                                      if(mysqli_num_rows($result) > 0){
                                                                       ?>
                                     <th>id</th>
                                     <th>Hostel Name </th>
                                     <th>Capacity</th>
                                     <th>Status</th>
                                     <th> Edit </th>
                                     <th> Delete </th>
                                   </tr> 
                                  </thead>
                                  <tbody>
                                     <tr>
                                                                          <?php
                                                                          while($row = mysqli_fetch_array($result)){
                                                                              echo "<td>" . $row['id'] . "</td>";
                                                                              echo "<td>" . $row['hostel_name'] . "</td>";
                                                                              echo "<td>"  . $row['capacity']   ."</td>";
                                                                              if ( $row['status'] == 'available') {
                                                                              echo "<td> <span class='btn btn-xs btn-outline-primary'>"  . $row['status']   ."</td>";
                                                                              }else{
                                                                              echo "<td> <span class='btn btn-xs btn-danger'>"  . $row['status']   ."</td>";
                                                                              }
                                                                              echo "<td><button id='updateHostel' class='btn btn-success btn-xs' value=" . $row['id'] . "><i class='far fa-edit-alt'></i> Edit</button></td>";
                                                                              echo "<td><button id='deleteHostel' class='btn btn-outline-danger btn-sm' value=" . $row['id'] . "><i class='far fa-trash-alt'></i> Delete</button></td>";
                                                                              echo "</tr>";
                                                                           }
                                                                        }
                                                                      }
                                                                   ?>
                                       </tr>
                                   <tbody>
                                  <tfoot>
                                       <tr>
                                       <th>id</th>
                                     <th>Hostel Name </th>
                                     <th>Capacity</th>
                                     <th>Status</th>
                                     <th> Edit </th>
                                     <th> Delete </th>
                                         </tr>
                                     </tfoot>
                                 
                                </table>
                             </div>
                             <!-- /.card-body -->
                         
                            </div>
            <!-- /.card -->
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