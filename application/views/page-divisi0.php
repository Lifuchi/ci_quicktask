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
									<a href=<?php echo site_url('dashboard');?>>
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
											<?php if ($this->session->userdata('T_ID') == $idteam ) { ?>
												<th>ACTION</th>
											<?php } ?>

										</tr>
									</thead>
									<tbody>
										<?php foreach ($content->result_array() as $key): ?>
										<tr class="gradeA">
											<?php $nilai = 0;?>
											<?php foreach ($key as $idnya => $key1): ?>
												<td> <?php echo $key1 ; ?></td>
												<?php
												if($idnya == 'TASK_ID'){
													$idtask = $key1;
												}
												// echo "<script>console.log('apakah masuk');</script>";
												if ($idnya == 'PROJECT TASK'){
													// echo "<script>console.log('apakah masuk2');</script>";
													if($key1 == 'Qualitativ'){
														$nilai = 1;
													}
												}
												?>
											<?php endforeach ?>

											<?php if ($this->session->userdata('T_ID') == $idteam ) { ?>
												<?php if ($nilai == 1){
													?>
													<th><a id = <?php echo $idtask?> onclick="coba(this.id)" name = <?php echo $idtask?> href = "#modalStatus2" class=" modal-with-form btn btn-default btn-danger">Change Status</a></th>
													<?php
												}else{
													?>
													<th><a id = <?php echo $idtask?> onclick="coba2(this.id)" name = <?php echo $idtask?> href = "#modalStatus" class=" modal-with-form btn btn-default btn-primary">Change Status</a></th>

													<?php
												}?>

										 <?php  }?>

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
										<a href = "#modalForm2" class="modal-with-form btn btn-default btn-danger" role="button">Add Task</a>
									</div>

								<?php } ?>
									<br>

									<div id="modalStatus" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Change Status</h2>
											</header>
											<div class="panel-body">
												<form method="post" action="" onsubmit="test3()" id="demo-form3" class="form-horizontal mb-lg" novalidate="novalidate">

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Task Id</label>
														<div class="col-sm-9">
															<input id = "task2" value= "" type="text" name="task" readonly class="form-control" required="">
														</div>
													</div>

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Status</label>
														<div class="col-sm-9">
															<input min="0" max="100" id = "stats" type="number" name="stats" class="form-control" placeholder="Type your status..." required="">
														</div>
													</div>


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

									<div id="modalStatus2" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Change Status</h2>
											</header>
											<div class="panel-body">
												<form method="post" action="" onsubmit="test4()" id="demo-form4" class="form-horizontal mb-lg" novalidate="novalidate">

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Task Id</label>
														<div class="col-sm-9">
															<input id=task type="text" name="task" readonly class="form-control" required="">
														</div>
													</div>

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Status</label>
														<div class="col-sm-9">
															<select  name = "stats" class="form-control mb-md">
																<option value = 0 > To Do</option>
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
													<div class="form-group">
														<label class="col-sm-3 control-label">Description</label>
														<div class="col-sm-9">
															<textarea name="desc" rows="5" class="form-control" placeholder="Type your Description..." required></textarea>
														</div>
													</div>
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

									<div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add Tasks</h2>
											</header>
											<div class="panel-body">
												<form method="post" action="" onsubmit="test2()" id="demo-form2" class="form-horizontal mb-lg" novalidate="novalidate">

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Objective</label>
														<div class="col-sm-9">
															<select name= "obj" class="form-control mb-md">
																<?php foreach ($contentobjective->result_array() as $key): ?>
																<option value ="<?php echo $key['OBJECTIVE_ID'];?>"><?php echo $key['OBJECTIVE'];?></option>
															<?php endforeach ?>
															</select>
														</div>
													</div>


													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Task Name</label>
														<div class="col-sm-9">
															<input type="text" name="tasks" class="form-control" placeholder="Type your tasks..." required="">
														</div>
													</div>

													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Project Task</label>
														<div class="col-sm-9">

															<select onchange="getQ(this.value)" name = "qtask" class="form-control mb-md">
																<option value = "Quantitati" >Quantitati</option>
																<option value = "Qualitativ" >Qualitativ</option>
															</select>
														</div>

												</div>

												<div class="form-group mt-lg">
													<label class="col-sm-3 control-label">Target</label>
													<div class="col-sm-9">
														<input id = "target"  value="1" type="number" name="target" class="form-control" placeholder="Type your tasks..." required="">
													</div>
												</div>

													<!-- <div class="form-group">
													<label class="col-md-3 control-label">Date range</label>
													<div class="col-md-6">
														<div  class="input-daterange input-group" data-plugin-datepicker >
															<span class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</span>
															<input type="text" class="form-control" name="start" id="start">
															<span class="input-group-addon">to</span>
															<input type="text" class="form-control" name="end" id="end">
														</div>
													</div>
												</div> -->

													<!-- <div class="form-group">
														<label class="col-sm-3 control-label">Description</label>
														<div class="col-sm-9">
															<textarea name="desc" rows="5" class="form-control" placeholder="Type your objective..." required></textarea>
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

		function test2(){
			// alert("Data Masuk");
				document.getElementById('demo-form2').action = '<?php echo site_url('okr/taskadded');?>';
		}

		// $("a").click(function() {
    // // var fired_button = $(this).val();
		// var fired_button = $(this).attr('value');
    // alert(fired_button);
		// });

		function coba(a){

			 document.getElementById("task").value = a;

			// console.log(a);
			// alert(a);
		}

		function coba2(a){

			 document.getElementById("task2").value = a;

			// console.log(a);
			// alert(a);
		}


		function test3(){
			// alert("Data Masuk");
			// var href = document.getElementById("myBtn").value;
				var x = document.getElementById('demo-form3').action = '<?php echo base_url()?>okr/taskupdated';
				// alert(href);
				alert(x);
		}

		function test4(){
			// alert("Data Masuk");
			// var href = document.getElementById("myBtn").value;
				var x = document.getElementById('demo-form4').action = '<?php echo base_url('okr/taskupdated');?>';
				alert(x);

		}


		function getQ(val){
          if (val == 'Quantitati'){
            // alert("haloo");
            document.getElementById('target').readOnly = false;
          }else{
            document.getElementById('target').readOnly = true;
          }
        }

		$( document ).ready(function() {
			console.log( "ready!" );

			// $("#ui-datepicker-div").css("z-index", "1003" );

				// $('#start').datepicker({
				// 	// console.log( "ready!" );
				// 	autoclose: true,
				// 	container: '#demo-form2',
				// 	format: 'yyyy-mm-dd'
				// });
				// $('#end').datepicker({
				// 	// console.log( "ready!" );
				// 	autoclose: true,
				// 	container: '#demo-form2',
				// 	format: 'yyyy-mm-dd'
				// });

		});
		// $(document).ready(function() {
		// 	alert(tes);
		// 	$('#start').datepicker({
		// 		autoclose: true,
		// 		container: '#demo-form2',
		// 		format: 'yyyy-mm-dd'
		// 	});
		// 	$('#end').datepicker({
		// 		autoclose: true,
		// 		container: '#demo-form2',
		// 		format: 'yyyy-mm-dd'
		// 	});
		// } );



		</script>
	</body>
</html>
