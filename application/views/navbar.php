<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top fixed-top shadow">
	<div class="container">
		<a href="<?=base_url() ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
			<img class="me-2" src="<?=base_url() ?>assets/img/mikrotik.png" width="40" height="40" />
			<span class="fs-4">MikroTik TVIP-ASA</span>
		</a>
		<div class="topbar-divider d-none d-sm-block"></div>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('name') ?>&nbsp;</span>
					<img class="img-profile rounded-circle"	src="<?=base_url() ?>assets/img/user-male.svg">
				</a>
				
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="<?=base_url() ?>">
						<i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp; Home Page
					</a>
					<a class="dropdown-item" href="<?=base_url().'logout' ?>">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp; Log Out
					</a>
				</div>
			
			</li>
		</ul>
	</div>
</nav>
