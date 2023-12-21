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
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
	
	<link href="<?=base_url() ?>assets/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
	<link href="<?=base_url() ?>assets/css/dot.css" rel="stylesheet">
	<link href="<?=base_url() ?>assets/css/sweetalert.css" rel="stylesheet">
	
	<link href="<?=base_url() ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
		.scroll-to-top{
				position: fixed;
				right: 1rem;
				bottom: 1rem;
				display: none;
				width: 2.75rem;
				height: 2.75rem;
				text-align: center;
				color: #fff;
				background: rgba(90,92,105,.5);
				line-height: 46px
		}
		.scroll-to-top:focus,.scroll-to-top:hover{
			color: #fff
		}
		.scroll-to-top:hover{
			background: #5a5c69
		}
		.scroll-to-top i{
			font-weight: 800
		}
		.rounded{
			border-radius: .35rem!important
		}
	</style>
</head>
<body id="page-top">

<?php  $this->load->view('navbar')?>
	<div class="container">
	
		<div class="card shadow mb-4 " style="margin-top: 90px">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Filter Rules</h6>
			</div>
			<div class="card-body">
<?php

echo "<pre>";
//var_dump($route);
echo "</pre>";
?>	
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="dataTable" style="width: 100%">
						<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th>DST Address</th>
								<th>Gateway</th>
								<th>Distances</th>
								<th>Disabled Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody style="font-weight: bold">
							<?php 
							$id=-1;
							foreach($route as $row){ 
							$id++;
							$di = $row['.id'];
							?>
							<tr>
								<th colspan="6"><?=$row["comment"] ?></th>
							</tr>
							<tr <?php if ($row['disabled'] == 'true') echo 'style="font-style: italic; font-weight:200"';?>>
									<td><?=$id?></td>
									<td><?=$row['dst-address'] ?></td>
									<td><?=$row["gateway-status"] ?></td>
									<td><?=$row["distance"] ?></td>
									<td><?=$row['disabled'] ?></td>
									<td>
										<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="disabled()" title="Disabled">
											<i class="fa fa-times"></i>
											<b> Disable</b>
											<?php 
											$this->routerosapi = new RouterosAPI();
											$this->routerosapi->comm("/ip/route/disable", array(
												'.id'. $id,
											));
											$this->routerosapi->read();
											?>
										</a>
									</td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot class="thead-dark">
							<tr>
								<th>Hostname</th>
								<th>IP Address</th>
								<th>MAC Address</th>
								<th>Server</th>
								<th>Last-seen</th>
								<th>Status</th>
								<th>Dynamic</th>
							</tr>
						</tfoot>
					</table>
					
					
						<a class="scroll-to-top rounded" href="#page-top">
							<i class="fas fa-angle-up"></i> Scroll Up
						</a>
				</div>
			</div>
		</div>
	</div>

	
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; ICT Infrastructure 2021</span>
		</div>
	</div>
</footer>


		


<!-- JavaScript-->
<script>
		function disabled(){
			//var id = id;
			/*swal({
				title: "Are you sure?",
				text: "Rule will be Disabled?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Disable!",
				closeOnConfirm: false
			},*/
			/*function(isConfirm){
				if (isConfirm) {*/
					window.location.href = '<?=base_url()?>disabled/'; //+id;
					//swal("Done", "Rule has been Disabled.", "success");
		/*		}
			});*/

		}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"> </script>
<script src="<?=base_url() ?>assets/js/bootstrap-notify.min.js"> </script>

<script src="<?=base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"> </script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"> </script>

<script src="<?=base_url() ?>assets/js/dataTables.js"> </script>

<script src="<?=base_url() ?>assets/js/app.js"> </script>
	
	</body>
</html>