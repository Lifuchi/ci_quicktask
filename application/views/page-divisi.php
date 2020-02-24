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
						<h2>Change Status </h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<!-- <a href=<?php //echo site_url('okr');?>>
										<i class="fa fa-home"></i>
									</a> -->
								</li>
								<li><span>Divisi</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<div class="row">

						<div id="modalStatus2">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Change Status</h2>
								</header>
								<div class="panel-body">
									<form method="post" action="" onsubmit="test4()" id="demo-form4" class="form-horizontal mb-lg" novalidate="novalidate">

										<!-- <div class="form-group mt-lg">
											<label class="col-sm-3 control-label">Team</label>
											<div class="col-sm-9">
												<input type="text" name="idteam" class="form-control" readonly value="<?php echo $idteam ?>">
											</div>
										</div> -->

										<!-- <div class="form-group mt-lg">
											<label class="col-sm-3 control-label">Key Result Id</label>
											<div class="col-sm-9">
												<input id=task type="text" name="task" readonly class="form-control" required="">
											</div>
										</div> -->

										<div class="form-group mt-lg">
											<label class="col-sm-3 control-label">SubTask</label>
											<div class="col-sm-9">
												<select name = "st" class="form-control populate">
													<option >Choose</option>
													<?php foreach ($contentask->result_array() as $keys): ?>
															<option value ="<?php echo $keys['SKR_ID'];?>"><?php echo $keys['SKR_NAME'];?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>


										<div class="form-group mt-lg">
											<label class="col-sm-3 control-label">Status</label>
											<div class="col-sm-9">
												<select  name = "stats" class="form-control mb-md">
													<option value = 0 > To Do</option>
													<option value = 10 > On Doing</option>
													<option value = 100 >Done</option>
												</select>
											</div>
										</div>

								</div>
								<footer class="panel-footer">
									<div class="row">
										<div class="col-md-12 text-right">
											<button id="buu" type="submit" class="btn btn-primary">Submit</button>
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



<!-- tes -->
			<?php $this->load->view("_partials/sidebar.php") ?>

		</section>

		<?php $this->load->view("_partials/js.php") ?>


	</body>

<script>
function test4(){
	 var pathArray = window.location.pathname.split( "/" );
	 var hrf = "<?php echo base_url('okr/taskupdated/');?>"+pathArray[4]+ "/" + pathArray[5];
	// alert("Data Masuk");
	// var href = document.getElementById("myBtn").value;
	//alert(hrf);
	 // alert('<?php //echo base_url('okr/taskupdated/');?>'+pathArray[4]'');
		var x = document.getElementById('demo-form4').action = hrf;
		// alert(x);

}
</script>
</html>
