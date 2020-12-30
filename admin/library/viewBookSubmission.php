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
              <li class="breadcrumb-item active">View Submitted Books</li>
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
                           <button class="btn btn-info card-title" id="newBook"> <i class="fa fa-plus"></i>  Lend a New Book</button>
                           </div>
                                  <!-- /.card-header -->
                             <div class="card-body">
                                <table id="viewBookSubmissionTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                <?php
               include('../config.php');
// Attempt select query execution
  $sql = "SELECT library.id, students.FullName,class_name,bookname,pdate,sdate,library.status FROM library,students,classes,streams
  LEFT JOIN options on options.id = streams.option_id,sessions
  WHERE library.student_id = students.id AND students.stream_id = streams.id AND streams.class_id = classes.id and library.status= 'submitted'";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
      ?>
               <th>id</th>
               <th>Student Name</th>
               <th>Class  </th>
               <th>Book Name</th>
               <th>Book was lent  on</th>
               <th>Submission Date</th>
               <th>Status</th>
               <th>Edit</th>
               <th>Delete</th>
           </tr> 
            </thead>
            <tbody>
             
            <?php
        while($row = mysqli_fetch_array($result)){
                echo "
                <tr><td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>" . $row['bookname'] . "</td>";
                echo "<td>" . $row['pdate'] . "</td>";
                echo "<td>" . $row['sdate'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><button id='updateLibrary' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteLibrary' class='btn btn-danger btn-sm' value=" . $row['id'] . "><i class='far fa-trash-alt'></i> Delete</button></td>";
                echo"</tr>
                ";
              }
       
      }
    }
 ?>
                                 </tbody>
                                  <tfoot>
                                       <tr>
        <th>id</th>
        <th>Student Name</th>
        <th>Class  </th>
        <th>Book Name</th>
        <th>Book was lent  on</th>
        <th>Submission Date</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
                                         </tr>
                                     </tfoot>
                                 
                                </table>

            </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>