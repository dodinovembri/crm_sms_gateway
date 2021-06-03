<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Contact Group</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('contact_group') ?>">Contact Groups</a></li>
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
					</div>
				<?php } elseif ($this->session->flashdata('warning')) { ?>
					<div class="alert alert-warning" role="alert">
						<?php echo $this->session->flashdata('warning'); ?>
					</div>
				<?php } ?>
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form method="POST" action="<?= base_url('contact_group/store') ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Contact to this Group</label>
                                    <select name="contact[]" id="" class="select2" multiple="multiple" style="width: 100%;">
                                        <?php foreach ($contacts as $key => $value) { ?>
                                            <option value="<?= $value->id ?>"><?= $value->phone_number ?> - <?= $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Contact</button>
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