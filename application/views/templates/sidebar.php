<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo base_url('home') ?>" class="brand-link">
		<img src="<?php echo base_url() ?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
				<li class="nav-header">Transactions</li>
				<li class="nav-item <?php if ($this->uri->segment(1) == "single_message/*" || $this->uri->segment(1) == "broadcast_message/*") { echo "menu-is-opening menu-open"; } ?> ">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-comments"></i>
						<p>
							Send Message
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('single_message/create') ?>" class="nav-link <?php if ($this->uri->segment(1) == "single_message/create") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Single Message</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('broadcast_message/create') ?>" class="nav-link <?php if ($this->uri->segment(1) == "broadcast_message/create") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Broadcast Message</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item <?php if ($this->uri->segment(1) == "inbox" || $this->uri->segment(1) == "sentbox" || $this->uri->segment(1) == "outbox") { echo "menu-is-opening menu-open"; } ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-envelope"></i>
						<p>
							Mailbox
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('inbox') ?>" class="nav-link <?php if ($this->uri->segment(1) == "inbox") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Inbox</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('sentbox') ?>" class="nav-link <?php if ($this->uri->segment(1) == "sentbox") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Sentbox</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('outbox') ?>" class="nav-link <?php if ($this->uri->segment(1) == "outbox") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Outbox</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item <?php if ($this->uri->segment(1) == "contact" || $this->uri->segment(1) == "contact_group") { echo "menu-is-opening menu-open"; } ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-file"></i>
						<p>
							Contact
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('contact') ?>" class="nav-link <?php if ($this->uri->segment(1) == "contact") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Contact</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('contact_group') ?>" class="nav-link <?php if ($this->uri->segment(1) == "contact_group") { echo "active"; } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Contact Group</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('autoreply') ?>" class="nav-link <?php if ($this->uri->segment(1) == "autoreply")  echo "active"; ?>">
						<i class="nav-icon fas fa-comment-alt"></i>
						<p>
							Autoreply
						</p>
					</a>
				</li>
				<li class="nav-header">Setup Managements</li>
				<li class="nav-item">
					<a href="<?php echo base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == "user")  echo "active"; ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Users
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('phone') ?>" class="nav-link <?php if ($this->uri->segment(1) == "phone")  echo "active"; ?>">
						<i class="nav-icon fas fa-phone"></i>
						<p>
							Phone
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