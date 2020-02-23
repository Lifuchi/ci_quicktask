<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Menu Collapsed Layout | Okler Themes | Porto-Admin</title>
		<?php $this->load->view("_partials/head.php") ?>


	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<?php $this->load->view("_partials/header.php") ?>


				<!-- start: search & user box -->
				<div class="header-right">

					<?php $this->load->view("_partials/navbar.php") ?>

				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php $this->load->view("_partials/sidebarleft.php") ?>

				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Menu Collapsed Layout</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Layouts</span></li>
								<li><span>Menu Collapsed</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<!-- end: page -->
				</section>
			</div>

			<?php $this->load->view("_partials/js.php") ?>

		</section>
	</body>
</html>
