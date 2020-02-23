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



				<!-- start: search & user box -->
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
						<h2>OKR</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href=<?php echo site_url('okr');?>>
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>OKR</span></li>
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
									<h2 class="panel-title">Objective Key Result </h2>
								</header>
								<div class="panel-body">

									<!-- <h2 class="panel-title">OKR</h2> -->

									<a href=<?php echo site_url('okr/add')?> > <button type="button">Add OKR</button> </a>

									<!-- Flot: Basic -->

									<div class="chart chart-md" id="flotDashBasic"></div>
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


	</body>
</html>
