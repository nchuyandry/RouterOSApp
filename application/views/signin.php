<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Login Page</title>

		<!-- Custom fonts for this template-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

		<!-- Custom styles for this template-->
		<link href="<?=base_url() ?>assets/css/style.min.css" rel="stylesheet">
		<!--favicon-->
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png">
		<link rel="tvip-touch-icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="180x180">
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="32x32" type="image/png">
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="16x16" type="image/png">
		<style>
			
			[data-notify="message"]{
				font-weight: 400;
				font-size: x-large;
				align-items: center;
				position: inherit;
				padding-left: 3px;
			}
		</style>
	</head>
	<body class="bg-gradient-custom">
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-xl-5 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								
								<div class="col-lg-12">
									<div class="p-5">
										<div class="text-center">
											<img class="mb-4" src="<?=base_url() ?>assets/img/mikrotik.png" alt="" width="72" height="72">
											<h1 class="h4 text-gray-900 mb-4">Login</h1>
										</div>
										<form class="user" method="post" action="<?=base_url().'login/dologin' ?>">
											<div class="form-group">
												<input type="text" class="form-control form-control-user" name="username" placeholder="NIK" required>
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
											</div>
											
											<button class="btn btn-primary btn-user btn-block" type="submit">
												Login
											</button>
											<hr>
										</form>	
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/bootstrap-notify.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/app.js"> </script>
		<?php
		if ($this->session->flashdata('failed')) { ?>
		<script>
		$.notify({
			icon: "fa fa-exclamation-triangle fa-2x",
			message: "<?=$this->session->flashdata('failed')?>"
		},{
			type: 'danger',
			allow_dismiss: false,
			placement: {
				from: 'top',
				align: 'right'
			},
			animate: {
				enter: 'animated bounceIn',
				exit: 'animated bounceOut'
			},
		});
		</script>
		<?php } ?>
		

	</body>

</html>