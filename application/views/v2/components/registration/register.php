
	<main class="main">
		<!-- <nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
				</ol>
			</div>
		</nav> -->

		<div class="container h-100">
  			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-lg-9 order-lg-last dashboard-content">
					<h2>Registration</h2>
					<div style="color: red"><?php echo validation_errors(); ?></div>
					<form action="<?= base_url()."index.php/Home/register_validate" ?>" method="post">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group required-field">
											<label for="acc-name">Sponser No.</label>
											<input type="text" class="form-control" id="referal_id" name="referal_id" value="<?php echo set_value('referal_id'); ?>"  >
										</div><!-- End .form-group -->
										<div style="color: red"><?php echo form_error('referal_check'); ?></div>
									</div><!-- End .col-md-4 -->

									<div class="col-md-6">
										<div class="form-group">
											<label for="acc-mname">User Name</label>
											<input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>"  >
										</div><!-- End .form-group -->
										<div style="color: red"><?php echo form_error('full_name'); ?></div>
									</div><!-- End .col-md-4 -->
								</div><!-- End .row -->
							</div><!-- End .col-sm-11 -->
						</div><!-- End .row -->

						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="acc-lastname">Email Address</label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
							</div><!-- End .form-group -->
						</div><!-- End .col-md-4 -->

						<div class="col-md-6">
							<div class="form-group required-field">
								<label for="acc-lastname">User ID</label>
								<input type="text" class="form-control" id="user_id" name="user_id" value="<?= $user_id + 1 ?>" disabled>
							</div><!-- End .form-group -->
						</div>

						<div class="col-md-6">
							<div class="form-group required-field">
								<label for="acc-lastname">City</label>
								<input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city'); ?>"required>
							</div><!-- End .form-group -->
							<div style="color: red"><?php echo form_error('city'); ?></div>
						</div>

						<div class="col-md-6">
							<div class="form-group required-field">
								<label for="acc-lastname">Mobile</label>
								<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" required>
								<div style="color: red"><?php echo form_error('mobile'); ?></div>
							</div><!-- End .form-group -->
						</div>


						<!-- <div class="col-md-6">
							<div class="form-group required-field">
								<label for="acc-lastname">Province</label>
								<input type="text" class="form-control" id="provience" name="provience" value="<?php echo set_value('provience'); ?>" required>
							</div>
						</div> -->

							<div class="col-md-6">
								<div class="form-group required-field">
									<label for="acc-lastname">Create Password</label>
									<input type="password" class="form-control" id="password" name="password" required>
									<div style="color: red"><?php echo form_error('password'); ?></div>
								</div><!-- End .form-group -->
							</div>
							<div class="col-md-6">
								<div class="form-group required-field">
									<label for="acc-lastname">Confirm Password</label>
									<input type="password" class="form-control" id="cpassword" name="cpassword" required>
								</div><!-- End .form-group -->
							</div>
						</div>




						<div class="required text-right">* Required Field</div>
						<div class="form-footer">
							<a href="#"><i class="icon-angle-double-left"></i>Back</a>

							<div class="form-footer-right">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div><!-- End .form-footer -->
					</form>
				</div><!-- End .col-lg-9 -->

				<!-- <aside class="sidebar col-lg-3">
					<div class="widget widget-dashboard">
						<h3 class="widget-title">My Account</h3>

						<ul class="list">
							<li class="active"><a href="#">Account Dashboard</a></li>
							<li><a href="#">Account Information</a></li>
							<li><a href="#">Address Book</a></li>
							<li><a href="#">My Orders</a></li>
							<li><a href="#">Billing Agreements</a></li>
							<li><a href="#">Recurring Profiles</a></li>
							<li><a href="#">My Product Reviews</a></li>
							<li><a href="#">My Tags</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">My Applications</a></li>
							<li><a href="#">Newsletter Subscriptions</a></li>
							<li><a href="#">My Downloadable Products</a></li>
						</ul>
					</div>
				</aside>
			</div> -->
		</div>

		<div class="mb-5"></div><!-- margin -->
	</main><!-- End .main -->