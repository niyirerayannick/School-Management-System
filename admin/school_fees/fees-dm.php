<?php
include("../config.php");
  if($_POST["formId"] == 'changeFeeStructure'){
    if(isset($_POST["option_name"])){
      addNewFees($_POST["class_name"],$_POST['option_name'],$_POST['amount']);
    }
    else{
      addNewFees($_POST["class_name"],NULL,$_POST['amount']);
    }
   }
  elseif($_POST["formId"] == 'deleteFeesStructureBtn'){
    deleteFeesStructure($_POST['value']);
   }
  elseif($_POST["formId"] == 'selectUpdateFees'){
    selectUpdateFeeStructure($_POST['value']);
  }
  elseif($_POST["formId"] == 'updateFeeStructureBtn'){
    updateFees($_POST["amount"],$_POST["id"]);
  }
  elseif($_POST["formId"] == 'addFeesCollection'){
    addFeesCollection($_POST["student_id"],$_POST["bank_id"],$_POST["amount"],$_POST["academic_year"]);
  }
  
  function addFeesCollection($student,$bank,$amount,$year){
    include("../config.php");
    $date = date('Y-m-d');
       $sql = "INSERT INTO `fees_collection` (`id`, `student_id`, `bank_id`, `amount_paid`, `payment_date`, `session_id`)
        VALUES (NULL, '$student', '$bank', '$amount', '$date', '$year');
       ;";

        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }

  function addNewFees($class,$option,$amount){
    include("../config.php");
    
      if($option !== 'NULL'){
       $sql = "INSERT INTO `fees_structure` (`id`, `class_id`,`option_id`,`amount`) 
       VALUES (NULL, '$class',(SELECT option_id FROM streams WHERE id = '$option'),'$amount');";
      }else{
        $sql = "INSERT INTO `fees_structure` (`id`, `class_id`,`option_id`,`amount`) 
        VALUES (NULL, '$class',NULL,'$amount');";
      }
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
    
  function updateFees($var,$id){
    include("../config.php");

       $sql = "UPDATE fees_structure SET amount = '$var' where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   
  function deleteFeesStructure($id){
    include("../config.php");
 
       $sql = "DELETE  FROM fees_structure where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation! 
          </div>";
         }
  }

  function selectUpdateFeeStructure($var){
    include("../config.php");

             $sql = "SELECT class_name,option_name,amount,fees_structure.id
             FROM classes,fees_structure
            LEFT JOIN options on fees_structure.option_id = options.id WHERE fees_structure.class_id = classes.id 
              AND fees_structure.id = '$var'
             ";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);?>
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">Change Fees Structure</h3>
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
                  <label>Class</label>
                  <input type="text" class="form-control"  id="class_name"  value="<?php echo htmlentities($row["class_name"]) ?>" disabled >
                </div>

                <div class="form-group" id='optionDiv'>
                  <label>Option</label>
                  <input type="text" class="form-control" value="<?php echo htmlentities($row["option_name"]) ?>" disabled >
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">School Fees Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" 
                    placeholder="Enter Fees Amount">

                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="hidden" id="changeFeeStructureForm" name="formId" value ="updateFeeStructureBtn">
                <input type="hidden" class="form-control"  name="id"  value="<?php echo htmlentities($row["id"]) ?>" >
                  <button class="btn btn-success"  id="updateFeeStructureBtn">Submit</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
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
                  
                 <?php
                }
               else{
                  echo "<div class='alert alert-danger' role='alert'>
                  There are was a problem performing the operation! 
                </div>";
      }
  }

  
?>
