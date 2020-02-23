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
						<h2>Sub Task</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href=<?php echo site_url('okr');?>>
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Sub Task</span></li>
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
									<h2 class="panel-title">Add Subtask</h2>
								</header>
								<div class="panel-body">

										<form id="addokr" action="" onsubmit="test()" class="form-horizontal form-bordered" method="post">


								<div class="form-group">
										<label class="col-md-3 control-label" for="inputRounded">Key Result</label>
										<div class="col-md-6">
									<select name = "kr" data-plugin-selectTwo class="form-control populate">
										<?php foreach ($contentobjective->result_array() as $key): ?>
										<optgroup label="<?php echo $key['OBJECTIVE'];?>">
												<?php foreach ($contensubtask->getKrName($key['OBJECTIVE_ID'])->result_array() as $keys): ?>
											<option value ="<?php echo $keys['KR_ID'];?>"><?php echo $keys['KR_NAME'];?></option>
												<?php endforeach ?>
										</optgroup>
									<?php endforeach ?>
										<!-- <optgroup label="Alaskan/Hawaiian Time Zone">
											<option value="AK">Alaska</option>
											<option value="HI">Hawaii</option>
										</optgroup>
										<optgroup label="Pacific Time Zone">
											<option value="CA">California</option>
											<option value="NV">Nevada</option>
											<option value="OR">Oregon</option>
											<option value="WA">Washington</option>
										</optgroup> -->
									</select>
							</div>
						</div>


									<div id = "readroot0" class="form-group col-md-12">
										<!-- <input type="button" class="btn btn-danger" value="Remove data" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br /> -->
										<!-- <label class="col-md-2 control-label" for="inputRounded">Subtask</label> -->
										<!-- <div class="col-md-6"> -->
											<input name="subtask" type="text" placeholder="sub task" class="form-control input-rounded col-md-6" >
										<!-- </div> -->
										<br>
										<br>

										<!-- <label class="col-md-2 control-label" for="inputRounded">persentage</label> -->
										<!-- <div class="col-md-2"> -->
											<!-- <input name="persentage" type="text"  class="form-control input-rounded" id="bobot"> -->
  										<input name="persentage" type="text" placeholder="percentage %" class="form-control input-rounded col-md-6" value="" aria-required="true" aria-invalid="false" >
										<!-- </div> -->
									</div>

									<!-- <div class="btn-group btn-group-justified"> -->
										<!-- <a class="btn btn-default" role="button">Left</a> -->
										<!-- <button type="submit" class="btn btn-default" role="button">tambah</button> -->
										<!-- <button type="submit" class="btn btn-default" role="button">add</button> -->

										<!-- <a class="btn btn-default" role="button">Right</a> -->
									<!-- </div> -->
									<span id="writeroot"></span>

									<div class="button" onclick="moreFields0()">
											<!-- <span class=""></span><span class=""> Add Subtasks</span> -->
											<a class="btn btn-primary"> Add Subtasks</a>
									</div>
									<br>

									<div class="btn-group btn-block">
										<button type="submit" class="btn btn-warning btn-block" role="button">Submit</button>
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



var counter = 0;
var flag = 0;
var count = 0;

function test(){
	alert("masuk gaj");
		document.getElementById('addokr').action = '<?php echo site_url('subtask/added/');?>'+count;
}

function moreFields0() {
					count++;
					var newFields = document.getElementById('readroot0').cloneNode(true);
					newFields.id = '';
					newFields.style.display = 'block';
					var newField = newFields.childNodes;
					for (var i=1;i<newField.length;i++) {
							var theName = newField[i].name
							if (theName){
									newField[i].name = theName + count;
							}
							console.log(newField[i].name);
					}
					// console.log(newField.length);
					var insertHere = document.getElementById('writeroot');
					insertHere.parentNode.insertBefore(newFields,insertHere);
			}

function moreFields() {
		// alert("masuk gaj");
            counter++;
            var newFields = document.getElementById('readroot1').cloneNode(true);
            newFields.id = '';
            newFields.style.display = 'block';
            var newField = newFields.childNodes;
            for (var i=1;i<newField.length;i++) {
                var theName = newField[i].name
                if (theName){
                    newField[i].name = theName + counter;
                }
                //console.log(newField[i].name);
            }
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields,insertHere);
        }
				// window.onload = moreFields;
				// window.onload = moreFields0;


</script>


	</body>
</html>
