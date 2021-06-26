<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Sentbox</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
						<li class="breadcrumb-item active">Sentbox</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-body">
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
				<div class="mailbox-controls">
						<!-- Check all button -->
						<button type="button" id="checked_all" name="checked_all" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
						</button>
						<script>
							$(document).ready(function() {
								$("#checked_all").click(function() {
									$('$checked_row').attr('checked', true);
								});
							});
						</script>
						<div class="btn-group">
							<a href="#" data-toggle="modal" data-target="#modal-destroy-all"><button type="button" class="btn btn-default btn-sm">
									<i class="far fa-trash-alt"></i>
								</button></a>
						</div>
						<!-- /.btn-group -->
						<a href="<?= base_url('outbox') ?>"><button type="button" class="btn btn-default btn-sm">
								<i class="fas fa-sync-alt"></i>
							</button></a>
						<!-- /.float-right -->
					</div>
					<div class="modal fade" id="modal-destroy-all">
						<div class="modal-dialog">
							<div class="modal-content bg-primary">
								<div class="modal-header">
									<h4 class="modal-title">Delete Confirm</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Are you sure want to delete selected data?</p>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
									<a href="<?= base_url('sentbox/destroy_all/')?>"><button type="button" class="btn btn-outline-light">Delete Data</button></a>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Check</th>
							<th>No</th>
							<th>Destination Number</th>
							<th>Text</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0;
						foreach ($sentbox as $key => $value) {
							$no++; ?>
							<tr>
								<td>
									<button type="button" id="checked_row" name="checked_row" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
									</button>
								</td>
								<td><?= $no ?></td>
								<td><?= $value->DestinationNumber ?></td>
								<td><?= substr($value->TextDecoded, 0, 50) ?> ... </td>
								<td><?= $value->Status ?></td>
								<td>
									<a href="<?= base_url('sentbox/show/');
												echo $value->ID; ?>"><i class="fas fa-eye"></i></a> &nbsp;
									<a href="#" data-toggle="modal" data-target="#modal-primary<?= $value->ID; ?>"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
							<div class="modal fade" id="modal-primary<?= $value->ID; ?>">
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
												<a href="<?= base_url('sentbox/destroy/');
															echo $value->ID; ?>"><button type="button" class="btn btn-outline-light">Delete Data</button></a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>							
						<?php } ?>
				</table>
			</div>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>