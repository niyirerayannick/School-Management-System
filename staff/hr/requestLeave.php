<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Requesting Leave</li>
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
                <h3 class="card-title">Request Leave</h3>
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
                                        <label name="class-name">Reason For Requesting Leave</label>
                                        <input type="hidden" id="requestLeaveForm" name="formId" value ="requestLeaveForm">
                                        <input type="text" class="form-control" id="reason" placeholder="Enter The Reason" name="reason">
                                      </div>
                                      <div class="form-group">
                                        <label>Leave Type</label>
                                        <select name = 'leave_type' class="form-control select2 select2-info" data-dropdown-css-class="select2-info">
                                          <option selected="selected" disabled>Choose Type Of Leave You are Requesting</option>
                                          <option>Medical</option>
                                          <option>Jury</option>
                                          <option>Maternity / Peternity</option>
                                          <option>Leave Of Absence</option>
                                          <option>Care Taker</option>
                                       </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Leave Duration:</label>
                                        <div class="input-group">
                                          <button type="button" class="btn btn-default float-right" id="daterange-btn">
                                            <i class="far fa-calendar-alt"></i> Choose Duration
                                            <i class="fas fa-caret-down"></i>
                                          </button>
                                       </div>
                                     </div>
                                      <!-- /.form group -->
                                     <!-- /.card-body -->
                                    </div>
                                    <div class="card-footer">
                                     <button type="submit" class="btn btn-success" id="addClassBtn">Request Leave</button>
                                     <button type="reset" class="btn btn-danger float-right" >Cancel</button>
                                    </div>
                                    <!-- /.card-->
                                  </div>
                               </div>
                              </div>
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

