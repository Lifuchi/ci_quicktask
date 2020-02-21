<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<?php $this->load->view("_partials/head.php") ?>


	</head>

	<body style="background-image: url('assets/images/bg.jpg');">
		<img src="assets/images/bg.jpg" height="54" alt="Porto Admin" />

		<!-- start: page -->
		<div class="col-lg-12">
		<section class="body-sign" style="width: 10000px">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<!-- <img src="assets/images/logo.png" height="54" alt="Porto Admin" /> -->

				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<!-- <form action="" method="post">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="pwd" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<!-- <div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div> -->
								<!-- </div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div> -->

							<!-- <span class="mt-lg mb-lg line-thru text-center text-uppercase"> -->
								<!-- <span>or</span> -->
							<!-- </span> -->

						<!-- </form>  -->


						<div class="login-form">
                  <?php $error = $this->session->flashdata("error"); ?>
                  <div class="alert alert-<?php echo $error ? 'warning' : 'info' ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error ? $error : 'Enter your Team and password' ?>
                  </div>

                    <form id="sign" onsubmit="test()" action="" method="post" >
                      <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">

														<label>Team</label>

														<select
																type="text"
																id="team-list"
																class="form-control"
																name="username">

																<option value="option1">Pilih</option>
														<?php foreach ($content->field_data() as $field): ?>
														<?php endforeach ?>
																<?php foreach ($content->result_array() as $key){ ?>
																			<option value="<?php echo $key['T_ID'] ?>"><?php echo $key['T_NAME'] ?></option>
																<?php } ?>
														</select>

                            <!-- <input type="text" class="form-control" placeholder="team" name="username"> -->
                        </div>

                        <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
                        <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
													<div class="col-sm-4 text-right">
												                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
												<div>
                    </form>
                </div>

					</div>
				</div>


				<!-- <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
			</div>
		</section>
		<!-- end: page -->
<div>
		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<script>
		function test(){
				document.getElementById('sign').action = '<?php echo site_url('Auth');?>';
		}


		</script>

	</body><img src="http://www.ten28.com/fref.jpg">
</html>
