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
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						<div class="row">
						<div class="col-md-6">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title">Network Overall</h2>
								</header>
								<div class="panel-body">

									<div id='progressbar' class="progress light m-md">

										<div id='progressbar2' class="progress-bar progress-bar-primary" role="progressbar"  aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
													<?php echo $done?>
										</div>
										<!-- <progress id="myProgress" value="100" max="100"></progress> -->
									</div>

									<script>

									// script chart

									</script>


									<!-- Flot: Basic -->

									<!-- <div class="chart chart-md" id="flotDashBasic"></div> -->
									<script>

									// script chart

									</script>

								</div>
							</section>
						</div>

					</div>

					<!-- start: page -->

					<!-- end: page -->
				</section>
			</div>



<!-- tes -->
			<?php $this->load->view("_partials/sidebar.php") ?>

		</section>

		<?php $this->load->view("_partials/js.php") ?>


		<script>

		$( document ).ready(function() {

			// alert(x);
    	// console.log(x);
			///activity progress 1 departemen

			var y = <?php echo $all; ?>;
			var x = <?php echo $done; ?>;
			// alert(y);
			var xy = parseInt(x)/parseInt(y)*100;
			// var xy = 100;
			console.log(xy);
					$( "#progressbar2" ).css('width', xy + '%').attr('aria-valuenow', xy);
					$('#progressbar2').text(xy+'%');


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
