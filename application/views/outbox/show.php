<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Outbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('outbox') ?>">Outbox</a></li>
                        <li class="breadcrumb-item active">Outbox Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="rights">
            <div class="col-md-3">

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5><?= $outbox->ReceiverName ?></h5>
                            <h6>From: sms-gateway system
                                <span class="mailbox-read-time float-right"><?= $outbox->InsertIntoDB ?></span>
                            </h6>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <?= $outbox->TextDecoded ?>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-footer -->
                    <div class="card-footer">
                        <a href="#" data-toggle="modal" data-target="#modal-primary"><button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button></a>
                    </div>
                    <div class="modal fade" id="modal-primary">
                        <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Confirm</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this data?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                                    <a href="<?= base_url('outbox/destroy/');
                                    echo $outbox->ID ?>"><button type="button" class="btn btn-outline-light">Delete Data</button></a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>