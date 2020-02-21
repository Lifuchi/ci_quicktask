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
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title">Objective Key Result</h2>
								</header>
								<div class="panel-body">

										<form id="addokr" action="" onsubmit="test()" class="form-horizontal form-bordered" method="post">
									<div class="form-group">
										<label class="col-md-3 control-label" for="inputRounded">Objective</label>
										<div class="col-md-6">
											<input type="text" name= "objective" class="form-control input-rounded" id="inputRounded">
										</div>
									</div>

									<div style="padding-left:80px" class="form-group">
										<label class="col-md-3 control-label" for="inputRounded">Key Feature</label>
										<div class="col-md-6">
											<input type="text" name="Key Feature" class="form-control input-rounded" id="inputRounded">
										</div>
									</div>

									<div style="padding-left:120px" class="form-group">
										<label class="col-md-3 control-label" for="inputRounded">Activity</label>
										<div class="col-md-6">
											<input type="text" name="Activity" class="form-control input-rounded" id="inputRounded">
										</div>
									</div>

									<div style="padding-left:120px" class="form-group">
										<label class="col-md-3 control-label">Date range</label>
										<div class="col-md-6">
											<div class="input-daterange input-group" data-plugin-datepicker>
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input type="text" class="form-control" name="start">
												<span class="input-group-addon">to</span>
												<input type="text" class="form-control" name="end">
											</div>
										</div>
									</div>

									<!-- <div class="btn-group btn-group-justified"> -->
										<!-- <a class="btn btn-default" role="button">Left</a> -->
										<!-- <button type="submit" class="btn btn-default" role="button">tambah</button> -->
										<!-- <button type="submit" class="btn btn-default" role="button">add</button> -->

										<!-- <a class="btn btn-default" role="button">Right</a> -->
									<!-- </div> -->

									<div class="btn-group btn-block">
										<button type="submit" class="btn btn-default btn-block" role="button">tambah</button>
									</div>
								</form>

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
function test(){
	alert("masuk gaj");
		document.getElementById('addokr').action = '<?php echo site_url('okr/added');?>';
}

</script>


	</body>
</html>
