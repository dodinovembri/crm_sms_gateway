<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Single Message</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" >
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Single Message</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <!-- phone mask -->
                <div class="form-group">
                  <label>Phone Number</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control"
                           data-inputmask="'mask': ['999-9999-9999 [-99999]', '+62 999 9999-9999[9]']" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              <div class="form-group">
                <label for="inputDescription">Message</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="row">
                 <div class="col-12">
                 <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Sent Message" class="btn btn-success float-right">
                </div>
             </div>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>