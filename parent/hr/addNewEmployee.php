<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Employee</li>
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
                <h3 class="card-title">Add New Employee</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
          <!-- left column -->
          <div class="col-md-1"></div>
          <div class="col-md-8">
            <!-- general form elements -->
              <form action=>
                <div class="card-body">
                <div class="row">
              <div class="col-md-12">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Employee's Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter The Employee's Full Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="address" name= "address" placeholder="Employee's Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title (Department)</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Employee's Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Employee's Quarification">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Experience (Years In Duty)</label>
                    <input type="text" class="form-control" id="experience" name="experience" placeholder="Employee's Experience">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Salary</label>
                    <input type="number" class="form-control" id="salary" name="salary" placeholder="Employee's Salary">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date Of Previous Salary Increase</label>
                    <input type="date" class="form-control" id="salary_increase_date" name="salary_increase_date" placeholder="Salary Increase">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date Of Birth</label>
                    <input type="date" class="form-control" id="DOB" name="dob" placeholder="dob">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Next Of Keen</label>
                    <input type="text" class="form-control" id="next-of-keen" name="next_of_keen" placeholder="Employee's Next Of Keen">
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="male" name="gender" value='male'>
                        <label for="male"> Male
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female"> Female
                        </label>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="hidden" id="addNewEmployeeForm" name="formId" value ="addNewEmployee">

                  <button type="submit" id="addEmployeeBtn" class="btn btn-success">Submit</button>
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