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
              <li class="breadcrumb-item active">Add New Class</li>
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
                <h3 class="card-title">Add New Class</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
             <form >
                <div class="card-body">
                 <div class="form-group">
                    <label name="class-name">Class Name</label>
                    <input type="hidden" id="addNewClassForm" name="formId" value ="addNewClass">
                    <input type="text" class="form-control" id="className" placeholder="Enter The Class Name" name="class-name">
                 </div>
                </div>
                <!-- /.card-body -->
  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="addClassBtn">Add Class</button>
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

