<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="<?php echo base_url('uploads/user/');
                                            echo $profile->image; ?>" class="img-circle elevation-2" height="100px">
                            </div>
                            <br>
                            <h3 class="profile-username text-center"><?php echo $profile->name; ?></h3>

                            <p class="text-muted text-center"><?php echo $profile->email ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="account">
                                    <form method="POST" action="<?= base_url('profile/update/');
                                                                echo $profile->id; ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="name" value="<?= $profile->name ?>" class="form-control" placeholder="Enter name" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email" value="<?= $profile->email ?>" placeholder="Enter email" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                            <img src="<?= base_url('uploads/user/');
                                                        echo $profile->image; ?>" alt="" width="20%">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Birth Place</label>
                                            <textarea rows="3" name="birth_place" placeholder="Enter birth place" class="form-control" id="exampleInputEmail1"><?= $profile->birth_place ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Religion</label>
                                            <input type="text" name="religion" value="<?= $profile->religion ?>" placeholder="Enter religion" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sex</label>
                                            <select name="sex" id="" class="form-control">
                                                <?php if ($profile->sex == 0) { ?>
                                                    <option value="0">Femail</option>
                                                    <option value="1">Male</option>
                                                <?php } elseif ($profile->sex == 1) { ?>
                                                    <option value="1">Male</option>
                                                    <option value="0">Femail</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea name="address" rows="3" placeholder="Enter address" class="form-control" id="exampleInputEmail1"><?= $profile->address ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone Number</label>
                                            <input type="text" name="phone_number" value="<?= $profile->phone_number ?>" placeholder="Enter phone number" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Role</label>
                                            <select name="role_id" id="" class="form-control">
                                                <option value="<?= $profile->role_id; ?>"><?= check_role($profile->role_id) ?></option>
                                                <option value="1">User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select name="status" id="" class="form-control" required>
                                                <?php if ($profile->status == 0) { ?>
                                                    <option value="0">Inactive</option>
                                                    <option value="1">Active</option>
                                                <?php } elseif ($profile->status == 1) { ?>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="password">
                                    <form method="POST" action="<?= base_url('profile/update_password/'); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Confirm Password</label>
                                            <input type="password" name="password_confirm" placeholder="Enter Password Confirm" class="form-control">
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>