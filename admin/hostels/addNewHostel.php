<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hostel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Hostel</li>
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
                <h3 class="card-title">Add New Hostel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style= 'min-height:600px'>
              <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
              <form action=>
                <div class="card-body">
                <div class="row">
           <div class="col-md-1"></div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group" mt-2>
                <input type="hidden" id="addNewHostelForm" name="formId" value ="addNewHostel">
                    <label for="exampleInputEmail1">Hostel's Name</label>
                    <input type="text" class="form-control" id="hostel_name" name ="hostel_name" placeholder="Enter The Hostel's Name">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputEmail1">Capacity (Number of students it can hold)</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Hostel's Capacity">
                  </div>
                 
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="male" name="status" value='available'>
                        <label for="male"> Available
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input type="radio" id="female" name="status" value="unavailable">
                        <label for="female"> Unavailable
                        </label>
                      </div>
                    </div>
                    <button id ="addHostelBtn" type="submit" class="btn btn-success">Add hostel</button>
                  <button type="reset" class="btn btn-danger float-right">Cancel</button>
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