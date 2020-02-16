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
						<?php foreach ($contentname->result_array() as $key): ?>
						<h2><?php echo $key['T_NAME']; $idteam = $key['T_ID'];  ?></h2>
							<?php endforeach ?>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href=<?php echo site_url('okr');?>>
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Divisi</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<div class="row">

						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>

								<h2 class="panel-title"> Tasks</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<?php foreach ($content->field_data() as $field): ?>
												<th><?php echo $field->name ?> </th>

										<?php endforeach ?>

										</tr>
									</thead>
									<tbody>
										<?php foreach ($content->result_array() as $key): ?>
										<tr class="gradeA">
											<?php foreach ($key as $idnya => $key1): ?>
												<td> <?php echo $key1 ; ?></td>
											<?php endforeach ?>
										</tr>
									<?php endforeach ?>

									</tbody>
								</table>
							</div>

							<div class="panel-body">

								<?php if ($this->session->userdata('T_ID') == $idteam ) { ?>

									<div class="btn-group btn-group-justified">
										<a href = "#modalForm" class=" modal-with-form btn btn-default btn-primary" role="button">Add Objective</a>
										<!-- <button type="button" class="btn btn-default btn-primary">Primary</button> -->
										<a class="btn btn-default btn-danger" role="button">Add Task</a>
									</div>

								<?php } ?>
									<br>

									<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add Objective</h2>
											</header>
											<div class="panel-body">
												<form method="post" action="" onsubmit="test()" id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Objective Name</label>
														<div class="col-sm-9">
															<input type="text" name="objective" class="form-control" placeholder="Type your objective..." required="">
														</div>
													</div>
													<!-- <div class="form-group">
														<label class="col-sm-3 control-label">URL</label>
														<div class="col-sm-9">
															<input type="url" name="url" class="form-control" placeholder="Type an URL...">
														</div>
													</div> -->
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</form>
										</section>
									</div>
							</div>
						</section>

					</div>

				</section>
			</div>



<!-- tes -->
			<?php $this->load->view("_partials/sidebar.php") ?>

		</section>

		<?php $this->load->view("_partials/js.php") ?>

		<script>
		function test(){
			// alert("Data Masuk");
				document.getElementById('demo-form').action = '<?php echo site_url('okr/added');?>';
		}
		</script>
	</body>
</html>
