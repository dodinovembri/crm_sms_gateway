<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Contact Group List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('group') ?>">Group</a></li>
						<li class="breadcrumb-item active">Contact Group</li>
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
					</div>
				<?php } elseif ($this->session->flashdata('warning')) { ?>
					<div class="alert alert-warning" role="alert">
						<?php echo $this->session->flashdata('warning'); ?>
					</div>
				<?php } ?>
				<a href="<?php echo base_url('contact_group/create') ?>"><button type="button" class="btn btn-block btn-primary" style="width: 13%;">Create New</button></a>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Group Name</th>
							<th>Contact Name</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach ($contact_groups as $key => $value) { $no++; ?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $value->contact_id ?></td>
								<td><?php echo $value->group_id ?></td>
								<td><?php echo $value->status ?></td>
								<td>
									<a href="<?= base_url('contact_group/show/');
												echo $value->id; ?>"><i class="fas fa-eye"></i></a> &nbsp;
									<a href="<?= base_url('contact_group/edit/');
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
											<a href="<?= base_url('contact_group/destroy/'); echo $value->id; ?>"><button type="button" class="btn btn-outline-light">Delete Data</button></a>
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