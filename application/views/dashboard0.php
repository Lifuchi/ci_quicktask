<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<?php $this->load->view("_partials/head.php") ?>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->

			<header class="header">

				<?php $this->load->view("_partials/header.php") ?>


				<div class="header-right">

					<!-- <span class="separator"></span> -->

					<!-- <span class="separator"></span> -->
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
								<li><span>Overall Objective</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						<div class="row">

							<?php	foreach ($team->result_array() as $row):  ?>
							<div class="col-md-12">
								<br>
								<section class="panel" >
									<header class="panel-heading bg-primary" >
										<!-- <div class="panel-heading-icon"> -->
											<!-- <i class="fa fa-globe"></i> -->
											<h4><?php echo $row['T_SINGKATAN']?></h4>
										<!-- </div> -->
									 </header>
									 <?php $count = $objective->getObjective($row['T_ID'])->result_array(); ?>
									 <?php foreach ($count as $key): ?>
								 <?php
								  if($key['done']== 0 && $key['alls'] == 0 ){
									 $ht = 0;
								  }else{
								  	$ht = round((int)$key['persendone']/(int)$key['persenalls']*100,2);
								  }
								 ?>

								 <!-- <br> -->
									<div class="col-md-4">
										<br>

									<div class="panel-body text-center"  >
										<h4 class="text-semibold mt-sm text-center" style="height:50px" > <?php echo $key['OBJECTIVE']?></h4>
										<div class="panel-body" >
											<div id='progressbar' class="progress light">
												<div id='progressbar2' class="progress-bar progress-bar-primary" role="progressbar"  aria-valuenow="<?php echo $ht;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ht;?>%">
															<?php echo $ht ?>%
												</div>
											</div>
											<div class="row show-grid" style="height:90px">
												<div class="col-md-4"><span class="show-grid-block"><h5>Target</h5> <h3><?php echo $key['alls']?></h3></span></div>
												<div class="col-md-4"><span class="show-grid-block"><h5>In Progress</h5> <h3><?php echo ((int)$key['alls']- (int)$key['done'])?></h3></span></div>
												<div class="col-md-4"><span class="show-grid-block"><h5>Completed</h5> <h3><?php echo $key['done']?></h3></span></div>
											</div>
										</div >


										</div>
									</div>
								<?php endforeach ?>
								<br>
								</section>
							</div>

						<?php endforeach ?>
						</div>
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
