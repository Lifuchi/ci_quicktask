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
						<h2><?php echo $key['T_NAME'] ?></h2>
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

					<?php foreach ($content->result_array() as $key): ?>
						<div class="col-xl-3 col-lg-6">
							<section class="panel panel-transparent">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title"></h2>
								</header>
								<div class="panel-body">
									<section class="panel panel-group">
										<header class="panel-heading bg-primary">
											<div class="widget-profile-info">
												<div class="profile-info">
													<h4 class="name text-semibold"><?php echo $key['OBJECTIVE']?></h4>
													<!-- <h5 class="role">Administrator</h5> -->
													<div class="profile-footer">
														<a href="#">(edit profile)</a>
													</div>
												</div>
											</div>

										</header>
										<div id="accordion">
											<div class="panel panel-accordion panel-accordion-first">
												<div class="panel-heading">
													<h4 class="panel-title">
														<?php $idne = "collapse".$key['OBJECTIVE_ID']?>
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $idne?>">
															<i class="fa fa-check"></i> Tasks
														</a>
													</h4>
												</div>
												<div id="<?php echo $idne?>" class="accordion-body collapse in">
													<div class="panel-body">
														<ul class="widget-todo-list">

															<?php $count = $contentask->getTasks($key['T_ID'],$key['OBJECTIVE_ID'])->result_array();
															foreach($count as $row){  ?>

															<li>
																<div>
																	<!-- <input type="checkbox" checked="" id="todoListItem1" class="todo-check"> -->
																	<label class="todo-label" for="todoListItem1">

																		<span><?php echo $row['TA_NAME']?></span>
																	</label>
																</div>
																<!-- <div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div> -->
															</li>
														<?php } ?>
														</ul>
														<hr class="solid mt-sm mb-lg">
														<!-- <form method="get" class="form-horizontal form-bordered"> -->
															<!-- <div class="form-group"> -->
																<!-- <div class="col-sm-12"> -->
																	<!-- <div class="input-group mb-md"> -->
																		<!-- <input type="text" class="form-control"> -->
																		<!-- <div class="input-group-btn"> -->
																			<!-- <button type="button" class="btn btn-primary" tabindex="-1">Add</button> -->
																		<!-- </div> -->
																	<!-- </div> -->
																<!-- </div> -->
															<!-- </div> -->
														<!-- </form> -->
													</div>
												</div>
											</div>

										</div>
									</section>

								</div>
							</section>
						</div>
					<?php endforeach ?>

					</div>

				</section>
			</div>



<!-- tes -->
			<?php $this->load->view("_partials/sidebar.php") ?>

		</section>

		<?php $this->load->view("_partials/js.php") ?>


	</body>
</html>
