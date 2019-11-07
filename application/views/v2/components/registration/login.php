<main class="main">
	<div class="container h-100">
  		<div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <h2 class="title mb-2">Login</h2>

                <form action="<?php echo base_url('index.php/Home/login_validate')?>" method="post" class="mb-1">
                    <label for="login-email">
                    	Username 
                    	<span class="required">*</span>
                    </label>
                    <input type="text" name="username" class="form-input form-wide mb-2" id="login-email" required />

                    <label for="login-password">
                    	Password 
                    	<span class="required">*</span>
                    </label>
                    <input type="password" name="password" class="form-input form-wide mb-2" id="login-password" required />

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-md">LOGIN</button>

                        <div class="custom-control custom-checkbox form-footer-right">
                            <input type="checkbox" class="custom-control-input" id="lost-password">
                            <label class="custom-control-label form-footer-right" for="lost-password">Remember Me</label>
                        </div>
                    </div><!-- End .form-footer -->
                    <a href="#" class="forget-password"> Forgot your password?</a>
                </form>
            </div><!-- End .col-md-6 -->
  		</div>
  	</div>
</main>