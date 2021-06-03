<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Inbox</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
						<li class="breadcrumb-item active">Inbox</li>
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
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Sender Number</th>
							<th>Text</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach ($inbox as $key => $value) { $no++; ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value->SenderNumber ?></td>
								<td><?= $value->TextDecoded ?></td>
								<td><?= $value->Status ?></td>
							</tr>
						<?php } ?>
				</table>
			</div>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>