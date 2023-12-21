
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Monitoring MikroTik TVIP-ASA</title>
		
		<!-- CSS only -->
	<!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/dot.css" rel="stylesheet">		
		<link href="<?=base_url()?>assets/css/sweetalert.css" rel="stylesheet">		

		<script type="text/javascript" src="<?=base_url() ?>assets/js/sweetalert.min.js"> </script>
		
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png">
		<link rel="tvip-touch-icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="180x180">
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="32x32" type="image/png">
		<link rel="icon" href="<?=base_url() ?>assets/img/mikrotik.png" sizes="16x16" type="image/png">
		<style>
			.topbar{
				height: 5rem;
			}
			.topbar .nav-item .nav-link .img-profile {
				height: 2rem;
				width: 2rem;
			}
			.topbar .topbar-divider {
				width: 0;
				border-right: 1px solid #e3e6f0;
				height: calc(4.375rem - 2rem);
				margin: auto 1rem;
			}
			footer.sticky-footer {
				padding: 2rem 0;
				flex-shrink: 0;
			}
			
		</style>
	</head>
	<body>
		<?php $this->load->view('navbar')?>
		<div class="container">
			<div class="card shadow mb-4" style="margin-top: 90px ">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Routers</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered text-center">
							<thead class="table-dark ">
								<tr>
									<th>Name</th>
									<th>IP Address</th>
									<th>Status</th>
									<th>Latency</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						<?php 
						$serversoffline = array();
						$serversonline = array();
						foreach($routers as $server){
							$verbinding =  fsockopen($server->ip,$server->port, $errno, $errstr);
							if ($verbinding) array_push($serversonline, $server);
							else array_push($serversoffline, $server);
						}
						?>
						<?php foreach ($serversoffline as $server) { ?>
							<tr>
								<td><a href="<?=base_url().'Menu/'. $server->ip?>"><b><?php echo $server->name ?></b></a></td>
								<td><b><?php echo $server->ip ?></b></td>
								<td class="text-center"><i class="fas fa-arrow-circle-down blink fa-2x" style="color:red"></i></td>
								<td class="text-center"><b >Timed Out</b></td>
								<td>
									<a href="javascript:void(0)" class="btn btn-warning btn-sm"  onclick="reboot('<?=$server->ip ?>')" title="Reboot">
										<i class="fa fa-retweet"></i>
										<b> Reboot</b>
									</a>
									<a href="javascript:void(0)" class="btn btn-warning btn-sm"  onclick="showdhcp('<?=$server->ip ?>')">
										<i class="fa fa-book"></i>
										<b> Show DHCP</b>
									</a>
								</td>
							</tr>
						<?php } ?>
						<?php 
								//$this->load->library('Ppping');
								//$this->Ppping = new Ppping();
								foreach ($serversonline as $server) {
									//$this->Ppping->hostname = $server->ip;
									//$latency = $this->Ppping->Ping();
							?>
						<tr>
							<td><a href="<?=base_url().'Menu/'. $server->ip?>"><b><?php echo $server->name ?></b></a></td>
							<td><b><?php echo $server->ip ?></b></td>
							<td class="text-center"><i class="fa fa-arrow-circle-up blink fa-2x" style="color: green"></i></td>
							<td class="text-center"><b> <?php// echo $latency ?> ms</b></td>
							<td>
								<a href="javascript:void(0)" class="btn btn-danger btn-sm"  onclick="reboot('<?=$server->ip ?>')" title="Reboot">
									<i class="fa fa-retweet"></i>
									<b> Reboot</b>
								</a>
								<!--<a href="javascript:void(0)" class="btn btn-warning btn-sm"  onclick="showdhcp('<?=$server->ip ?>')">
									<i class="fa fa-book"></i>
									<b> Show DHCP</b>
								</a>-->
								<a href="<?=base_url().'showdhcp/'. $server->ip?>" class="btn btn-primary btn-sm" >
									<i class="fa fa-book"></i>
									<b> Show DHCP</b>
								</a>
								<?php if ($this->session->userdata('name') == "ANDRIANTO"){ ?>
								<a href="<?=base_url().'route/'. $server->ip?>" class="btn btn-primary btn-sm" >
									<i class="fa fa-book"></i>
									<b> Routes</b>
								</a>
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
						
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<?php
			// echo $this->session->userdata('name');
			?>
		</div>
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; ICT Infrastructure 2021</span>
				</div>
			</div>
		</footer>
		
		
		
		
		
		
		<!-- JavaScript-->
		<script src="<?=base_url() ?>assets/js/jquery.min.js"> </script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"> </script>
		<script src="<?=base_url() ?>assets/js/bootstrap-notify.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/app.js"> </script>
		<script>
			function showdhcp(ip)
			{
				var ip = ip;
				window.location.href = '<?=base_url() ?>showdhcp/'+ip;
			}
		</script>
		<script>
		function reboot(ip){
			var ip = ip;
			swal({
				title: "Are you sure?",
				text: "Router will be restarted",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Reboot!",
				closeOnConfirm: false
			},
			function(isConfirm){
				if (isConfirm) {
					window.location.href = '<?=base_url()?>reboot/'+ip;
					swal("Done", "Router has been restarted.", "success");
				}
			});

		}
		
		</script>
		<?php
		if ($this->session->flashdata('success')) { ?>
		<script>
		$.notify({
			icon: "fa fa-check-circle",
			message: "<?=$this->session->flashdata('success')?>"
		},{
			type: "success",
			allow_dismiss: false,
			placement: {
				from: "top",
				align: "right"
			},
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
		});
		</script>
		<?php }elseif($this->session->flashdata('failed')){ ?>
		<script>
		$.notify({
			icon: "fa fa-times-circle",
			message: "<?=$this->session->flashdata('failed')?>"
		},{
			type: "warning",
			allow_dismiss: false,
			placement: {
				from: "top",
				align: "right"
			},
		});
		</script>
		<?php }elseif($this->session->flashdata('error')){ ?>
		<script>
		$.notify({
			icon: "fa fa-exclamation-triangle",
			message: "<?=$this->session->flashdata('error')?>"
		},{
			type: "danger",
			allow_dismiss: false,
			placement: {
				from: "top",
				align: "right"
			},
		});
		</script>
		<?php } ?>
	</body>
</html>