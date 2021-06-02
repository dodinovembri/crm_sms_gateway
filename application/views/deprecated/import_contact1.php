<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Import Contact</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Contact</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Participant Code</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" class="form-control">
              </div>
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
              <div class="form-group">
                <label for="inputStatus">Majors</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Teknik Elektro</option>
                  <option>Teknik Sipil</option>
                  <option>Teknik Kimia</option>
                </select>
              </div>
              <a href="#" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Submit" class="btn btn-success float-right">
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>