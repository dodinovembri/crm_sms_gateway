<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Contact List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
						<li class="breadcrumb-item active">Contact</li>
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

				<!-- Check all button -->
				<button type="button" class="btn btn-default btn-sm">
					<input type="checkbox" name="checkedAll" id="checkedAll" class="btn btn-default btn-sm" />
				</button>
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
				<br><br>
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
								<button type="button" class="btn btn-outline-light" onclick="call()">Delete Data</button>
								<script>
									function call() {
										$("#form-delete").submit();
									}
								</script>
							</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url('contact/create') ?>"><button type="button" class="btn btn-block btn-primary" style="width: 13%;">Create New</button></a>
				<form action="<?php echo base_url('contact/destroy_all') ?>" id="form-delete" method="POST">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Check</th>
								<th>No</th>
								<th>Participants Number</th>
								<th>Name</th>
								<th>Majors</th>
								<th>Phone Number</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0;
							foreach ($contacts as $key => $value) {
								$no++; ?>
								<tr>
									<input type="hidden" name="ID[]" id="" value="<?php echo $value->id; ?>">
									<td>
										<input type="checkbox" name="checkAll" class="checkSingle" style="margin-left: 20px;">
									</td>
									<td><?php echo $no ?></td>
									<td><?php echo $value->participants_number ?></td>
									<td><?php echo $value->name ?></td>
									<td><?php echo $value->major ?></td>
									<td><?php echo $value->phone_number ?></td>
									<td><?php echo check_status($value->status) ?></td>
									<td>
										<a href="<?= base_url('contact/show/');
													echo $value->id; ?>"><i class="fas fa-eye"></i></a> &nbsp;
										<a href="<?= base_url('contact/edit/');
													echo $value->id; ?>"><i class="fas fa-pen-square"></i></a> &nbsp;
										<a href="#" data-toggle="modal" data-target="#modal-primary<?= $value->id; ?>"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
								<div class="modal fade" id="modal-primary<?= $value->id; ?>">
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
												<a href="<?= base_url('contact/destroy/');
															echo $value->id; ?>"><button type="button" class="btn btn-outline-light">Delete Data</button></a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
							<?php } ?>
					</table>
				</form>
			</div>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$("#checkedAll").change(function() {
			if (this.checked) {
				$(".checkSingle").each(function() {
					this.checked = true;
				})
			} else {
				$(".checkSingle").each(function() {
					this.checked = false;
				})
			}
		});

		$(".checkSingle").click(function() {
			if ($(this).is(":checked")) {
				var isAllChecked = 0;
				$(".checkSingle").each(function() {
					if (!this.checked)
						isAllChecked = 1;
				})
				if (isAllChecked == 0) {
					$("#checkedAll").prop("checked", true);
				}
			} else {
				$("#checkedAll").prop("checked", false);
			}
		});
	});
</script>