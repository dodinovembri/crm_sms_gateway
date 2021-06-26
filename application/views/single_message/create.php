<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Single Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Create Single Message</li>
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
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                            <?php $this->session->unset_userdata('success'); ?>
                        </div>
                    <?php } elseif ($this->session->flashdata('warning')) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo $this->session->flashdata('warning'); ?>
                            <?php $this->session->unset_userdata('warning'); ?>
                        </div>
                    <?php } ?>
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form method="POST" action="<?= base_url('single_message/store') ?>">
                            <div class="card-header" style="background-color: #007bff;">
                                <h3 class="card-title" style="color: white;">Single Message</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" id="inputName" name="receiver_name" class="form-control">
                                </div>
                                <!-- if using from contact -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Send to Contact</label>
                                    <select name="destination_number" id="" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach ($contacts as $key => $value) { ?>
                                            <option value="<?= $value->phone_number ?>"><?= $value->phone_number ?> - <?= $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Phone Number</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="destination_number" data-inputmask="'mask': ['9999-9999-9999 [-99999]', '+62 999 9999-9999[9]']" data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Text</label>
                                    <textarea rows="5" name="text" class="form-control" id="exampleInputEmail1" placeholder="Enter message"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <a href="<?php echo base_url('home') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
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