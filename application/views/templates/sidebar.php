<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo base_url('home') ?>" class="brand-link">
		<img src="<?php echo base_url() ?>assets/dist/img/sms.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">SMS GATEWAY</span>
	</a>
	<?php
		$CI = &get_instance();
		$CI->load->model(['UserModel']);
		$user_id = $this->session->userdata('id');
		$user = $CI->UserModel->getById($user_id)->row();
	?>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src=<?php echo base_url('uploads/user/'); echo $user->image; ?>" class="img-circle elevation-2">
			</div>
			<div class="info">
				<a href="<?php echo base_url('user/user') ?>" class="d-block"><?php echo $user->name; ?></a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?php echo base_url('home') ?>" class="nav-link <?php if ($this->uri->segment(1) == "home") { echo "active"; } ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-comments"></i>
						<p>
							Sent SMS
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('sent_sms/single_message') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Single Message</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('sent_sms/broadcast_message') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Broadcast Message</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('sent_sms/autoreply') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Autoreply</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-envelope"></i>
						<p>
							Mailbox
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('mail_box/inbox') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Inbox</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('mail_box/outbox') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Outbox</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('mail_box/draft') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Draft</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-file"></i>
						<p>
							Contact
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('contact/group_contact') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Group Contact</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('contact/import_contact') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Import Contact</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('user/user') ?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>
							User
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-arrow-circle-left"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
			</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>