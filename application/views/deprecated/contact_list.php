<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Contacts List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
<!-- Main content -->
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Contact List</h3>
                <div class="text-right">
                    <a class="btn btn-info btn-sm" href="<?php echo base_url('contact/import_contact1')?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                          Import a New Contact
                    </a>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No.
                      </th>
                      <th style="width: 20%">
                          Participan Code
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                      <th style="width: 20%">
                          Phone Number
                      </th>
                      <th style="width: 20%">
                          Majors
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          1
                      </td>
                      <td>
                          <a>
                              1234567890
                          </a>
                      </td>
                      <td>
                          <a>
                              Lalita
                          </a>
                      </td>
                      <td>
                          <a>
                              081929230123
                          </a>
                      </td>
                      <td>
                          <a>
                              Jurusan Sistem Informasi
                          </a>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>