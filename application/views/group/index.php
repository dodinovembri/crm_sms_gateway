<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Phone List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Phone</li>
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
				<a href="<?php echo base_url('group/create') ?>"><button type="button" class="btn btn-block btn-primary" style="width: 13%;">Create New</button></a>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Code</th>
							<th>Name</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach ($groups as $key => $value) { $no++; ?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $value->group_code ?></td>
								<td><?php echo $value->group_name ?></td>
								<td><?php echo $value->description ?></td>
								<td>
									<a href=""><i class="fas fa-eye"></i></a> &nbsp;
									<a href=""><i class="fas fa-pen-square"></i></a> &nbsp;
									<a href=""><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php } ?>
				</table>
			</div>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>