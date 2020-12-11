<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Banks</li>
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
                <h3 class="card-title">Add New Banks</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="min-height:600px">
              <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
              <form action=>
                <div class="card-body">
                <div class="row">
           <div class="col-md-1"></div>
              <div class="col-md-12">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="form-group">
                  <input type="hidden" id="addNewBankForm" name="formId" value ="addNewBank">
                    <label for="exampleInputEmail1">Bank's Name</label>
                    <input type="text" class="form-control" id="fullName" name ="bank_name"placeholder="Enter The Banks's Full Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Account Number</label>
                    <input type="number" class="form-control" id="acc_no" name = "bank_account" placeholder="Enter Account Number">
                  </div>
                  <button type="submit" id="addBankBtn" class="btn btn-success">Add Bank</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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