<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Users</a></li>
                        <li class="breadcrumb-item active">Create User</li>
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
                        <form method="POST" action="<?= base_url('user/update/');
                                                    echo $user->id; ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="<?= $user->name ?>" class="form-control" placeholder="Enter name" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" value="<?= $user->email ?>" placeholder="Enter email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                    <img src="<?= base_url('uploads/user/');
                                                echo $user->image; ?>" alt="" width="20%">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Birth Place</label>
                                    <textarea rows="3" name="birth_place" placeholder="Enter birth place" class="form-control" id="exampleInputEmail1"><?= $user->birth_place ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Religion</label>
                                    <input type="text" name="religion" value="<?= $user->religion ?>" placeholder="Enter religion" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sex</label>
                                    <select name="sex" id="" class="form-control">
                                        <?php if ($user->sex == 0) { ?>
                                            <option value="0">Femail</option>
                                            <option value="1">Male</option>
                                        <?php }elseif ($user->sex == 1) { ?>
                                            <option value="1">Male</option>
                                            <option value="0">Femail</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea name="address" rows="3" placeholder="Enter address" class="form-control" id="exampleInputEmail1"><?= $user->address ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone Number</label>
                                    <input type="text" name="phone_number" value="<?= $user->phone_number ?>" placeholder="Enter phone number" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <select name="role_id" id="" class="form-control">
                                        <option value="<?= $user->role_id; ?>"><?= check_role($user->role_id) ?></option>
                                        <option value="1">User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" id="" class="form-control" required>
                                        <?php if ($user->status == 0) { ?>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        <?php } elseif ($user->status == 1) { ?>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url('user') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
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