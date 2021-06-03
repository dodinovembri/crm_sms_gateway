<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Phone</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('phone') ?>">Phones</a></li>
                        <li class="breadcrumb-item active">Create Phone</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form method="POST" action="<?= base_url('phone/store') ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID</label>
                                    <input type="id" name="id" class="form-control" id="exampleInputEmail1" placeholder="Enter ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">IMEI</label>
                                    <input type="text" name="imei" class="form-control" id="exampleInputEmail1" placeholder="Enter IMEI" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">IMSI</label>
                                    <input type="text" name="imsi" class="form-control" id="exampleInputEmail1" placeholder="Enter IMSI" required >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Client</label>
                                    <input type="text" name="client" class="form-control" id="exampleInputEmail1" placeholder="Enter client" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url('phone') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>