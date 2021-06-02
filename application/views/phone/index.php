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
				<a href=""><button type="button" class="btn btn-block btn-primary" style="width: 13%;">Create New</button></a>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>IMEI</th>
							<th>IMSI</th>
							<th>Net Code</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach ($phones as $key => $value) { $no++; ?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $value->IMEI ?></td>
								<td><?php echo $value->IMSI ?></td>
								<td><?php echo $value->NetCode ?></td>
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