<?php
include("../config.php");

$sql = "SELECT * FROM library ";

 if($res = mysqli_query($con,$sql)){
   $row = mysqli_fetch_array($res); ?>
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
 <li class="breadcrumb-item active">Update Library Details</li>
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
   <h3 class="card-title">Update Library Details</h3>
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
                  <form >
                     
                      <div class='form-group'>
                         <label name='class-name'> Book Name Name</label>
                         <input type='hidden' id='addNewBookForm' name='formId' value ='updateBook'>
                         <input type='hidden' id='addNewBookId' name='id'  value = "<?php echo htmlentities($row['id']) ?>">
                         <input type='text' class='form-control' id='book_name'  name='bookname'  value = "<?php echo htmlentities($row['bookname']) ?>">
                      </div>
                      <button type='submit' class='btn btn-success' id='updateBookBtn'>Update Library </button>

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