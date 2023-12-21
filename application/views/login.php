<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<title>Login Page</title>

		<!-- Bootstrap core CSS -->

		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

		<!-- Favicons -->
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png">
		<link rel="tvip-touch-icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="180x180">
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="32x32" type="image/png">
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="16x16" type="image/png">


		<style>
			.bs-example{
				margin: 20px;
			}
		</style>

		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>
		<!-- Custom styles for this template -->
		<link href="<?=base_url()?>assets/css/signin.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<form class="form-signin" action="<?=base_url().'login/dologin' ?>" method="post">
		<img class="mb-4" src="<?=base_url() ?>assets/img/mikrotik.png" alt="" width="72" height="72">
			<div class="card">
				<!--<div class="card-header">-->
					<h1 class="h3 mb-3 font-weight-normal pt-4">Sign In </h1>
				<!--</div>-->
				<div class="card-body">
					<div class="form-group py-2">
						<input type="text" id="username" name="username" class="form-control" placeholder="NIK" required >
					</div>
					<div class="form-group py-2">
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
					</div>
					<div class="d-grid gap-2">
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</div>
				</div>
			</div>
			<p class="mt-5 mb-3 text-muted">&copy; 2020 ICT infrastructure</p>
		</form>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
		<script src="<?=base_url()?>assets/js/bootstrap-notify.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/app.js"> </script>
		<?php if($this->session->flashdata('failed')){ ?>
		<script>
			$.notify({
				icon: "fa fa-exclamation-triangle",
				message: "<?=$this->session->flashdata('failed')?>"
			},{
				type: "danger",
				allow_dismiss: false,
				placement: {
					from: "top",
					align: "center"
				},
			});
		</script>
		<?php }?>
	</body>
</html>
