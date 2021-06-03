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
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" value="<?= $user->name ?>" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="<?= $user->email ?>" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label><br>
                                <img src="<?= base_url('uploads/user/'); echo $user->image; ?>" alt="" width="20%">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Birth Place</label>
                                <textarea rows="3" name="birth_place" value="<?= $user->birth_place ?>" class="form-control" id="exampleInputEmail1" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Religion</label>
                                <input type="text" name="religion" value="<?= $user->religion ?>" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sex</label>
                                <input type="text" name="religion" value="<?= check_sex($user->sex) ?>" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea name="address" rows="3" value="<?= $user->address ?>" class="form-control" id="exampleInputEmail1" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" name="phone_number" value="<?= $user->phone_number ?>" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <input type="text" name="religion" value="<?= check_role($user->role_id) ?>" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <input type="text" name="religion" value="<?= check_status($user->status) ?>" class="form-control" id="exampleInputEmail1" >
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="<?php echo base_url('user') ?>"><button type="button" class="btn btn-secondary">Back to List</button></a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>