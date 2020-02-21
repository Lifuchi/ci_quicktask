<!doctype html>
<html class="fixed">
	<head>
		<?php $this->load->view("_partials/head.php") ?>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->

			<header class="header">

				<?php $this->load->view("_partials/header.php") ?>


				<div class="header-right">



					<span class="separator"></span>

					<span class="separator"></span>
					<?php $this->load->view("_partials/navbar.php") ?>


				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<?php $this->load->view("_partials/sidebarleft.php") ?>

				<!-- isinya -->
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href=<?php echo site_url('Dashboard');?>>
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						<div class="row">

							<?php foreach ($network->result_array() as $key): ?>
								<?php
								if($key['done']== 0 && $key['alls'] == 0 ){
									$ht = 0;
								}else{
									$ht = round((int)$key['done']/(int)$key['alls']*100 , 2);
								}
								?>

							<div class="col-md-2">
								<section class="panel" >
									<header class="panel-heading bg-danger" style="height : 120px">
										<div class="panel-heading-icon">
											<h2> Network</h2>
											<!-- <i class="fa fa-globe"></i> -->
										</div>
									</header>
									<div class="panel-body text-center" >
										<h5 class="text-semibold mt-sm text-center" style="height : 30px">  Network Overall Progress</h5>
										<div class="panel-body">
											<div id='progressbar' class="progress light">
												<div id='progressbar2' class="progress-bar progress-bar-primary" role="progressbar"  aria-valuenow="<?php echo $ht;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ht;?>%">
															<?php echo $ht ?>%
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						<?php endforeach ?>

							<?php foreach ($content->result_array() as $key): ?>

								<?php
								if($key['done']== 0 && $key['alls'] == 0 ){
									$ht = 0;
								}else{
									$ht = round((int)$key['done']/(int)$key['alls']*100, 2);
								}
								?>


							<div class="col-md-2">
								<section class="panel" >
									<header class="panel-heading bg-primary" style="height : 120px">
										<div class="panel-heading-icon">
											<!-- <i class="fa fa-globe"></i> -->
											<h2><?php echo $key['T_USER']?></h2>
										</div>
									</header>
									<div class="panel-body text-center" >
										<h4 class="text-semibold mt-sm text-center" style="height : 30px"> <?php echo $key['T_SINGKATAN']?></h4>
										<div class="panel-body">
											<div id='progressbar' class="progress light">
												<div id='progressbar2' class="progress-bar progress-bar-primary" role="progressbar"  aria-valuenow="<?php echo $ht;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ht;?>%">
															<?php echo $ht ?>%
												</div>
											</div>
											<?php
											// if($this->session->userdata("T_NAME") == $key['T_NAME'] ){
												echo '<p class="panel-subtitle"><a href ='.site_url('divisi/'.$key['T_ID'].'').' > View Project </a></p>';
											// }
											?>

										</div>
									</div>
								</section>
							</div>

						<?php endforeach ?>

						<!-- <div class="col-lg-12">
						<?php //foreach ($content->result_array() as $key): ?>
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title"><?php //echo $key['T_NAME']?></h2>

									<?php
									// if($this->session->userdata("T_NAME") == $key['T_NAME'] ){
										//echo '<p class="panel-subtitle"><a href ='.site_url('divisi/'.$key['T_ID'].'').' > View Project </a></p>';
									// }
									?>

									<?php
									// if($key['done']== 0 && $key['alls'] == 0 ){
									// 	$ht = 0;
									// }else{
									// 	$ht = round((int)$key['done']/(int)$key['alls']*100,2);
									// }
									?>

								</header>
								<div class="panel-body">
									<div id='progressbar' class="progress light m-md">
										<div id='progressbar2' class="progress-bar progress-bar-primary" role="progressbar"  aria-valuenow="<?php echo $ht;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ht;?>%">
													<?php //echo $ht ?>%
										</div>
									</div>
								</div>
							</section>
                <?php //endforeach ?>
						</div> -->

						<?php //foreach ($objective->result_array() as $key): ?>
							<?php
							// if($key['done']== 0 && $key['alls'] == 0 ){
							// 	$ht = 0;
							// }else{
							// 	$ht = round((int)$key['done']/(int)$key['alls']*100,2);
							// }
							?>
							<!-- <div class="col-md-4">
								<section class="panel" >
									<header class="panel-heading bg-primary" >
										<div class="panel-heading-icon">
											<i class="fa fa-globe"></i>
											<h4><?php //echo $key['T_SINGKATAN']?></h4>
										</div>
									 </header>
									<div class="panel-body text-center"  >
										<h4 class="text-semibold mt-sm text-center" style="height : 50px"> <?php //echo $key['OBJECTIVE']?></h4>
										<div class="panel-body" >
											<div id='progressbar' class="progress light">
												<div id='progressbar2' class="progress-bar progress-bar-primary" role="progressbar"  aria-valuenow="<?php //echo $ht;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ht;?>%">
															<?php //echo $ht ?>%
												</div>
											</div>

											<div class="row show-grid">
												<div class="col-md-4"><span class="show-grid-block"><h5>Target</h5> <h3><?php// echo $key['alls']?></h3></span></div>
												<div class="col-md-4"><span class="show-grid-block"><h5>In Progress</h5> <h3><?php //echo ((int)$key['alls']- (int)$key['done'])?></h3></span></div>
												<div class="col-md-4"><span class="show-grid-block"><h5>Completed</h5> <h3><?php //echo $key['done']?></h3></span></div>
											</div>

										</div>
									</div>
								</section> -->
							<!-- </div>  -->

						<?php //endforeach ?>
						<!-- </div> -->
					</div>
				</section>
			</div>



<!-- tes -->
			<?php $this->load->view("_partials/sidebar.php") ?>

		</section>

		<?php $this->load->view("_partials/js.php") ?>


		<script>

		$( document ).ready(function() {
			// var y = <?php //echo $all; ?>;
			// var x = <?php// echo $done; ?>;
			// // alert(y);
			// var xy = parseInt(x)/parseInt(y)*100;
			// // var xy = 100;
			// console.log(xy);
			// 		$( "#progressbar2" ).css('width', xy + '%').attr('aria-valuenow', xy);
			// 		$('#progressbar2').text(xy+'%');
			//
			//
		});

		function myFunction() {
				// alert("Das onload");

				// var x = 1;
				// var y = 2;

				// alert(y);

				// var xy = x/y*100;
				// alert(xy);
				// document.getElementById("myProgress").value = xy;

		}

		// script chart

		</script>

	</body>
</html>
