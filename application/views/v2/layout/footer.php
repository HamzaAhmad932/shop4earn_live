</div>
<footer class="footer">
	<div class="container">
		<div class="footer-top">
			<div class="row">
				<div class="col-md-9">
					<div class="widget widget-newsletter">
						<div class="row">
							<div class="col-lg-6">
								<h4 class="widget-title">Subscribe newsletter</h4>
								<p>Get all the latest information on Events,Sales and Offers. Sign up for newsletter today</p>
							</div><!-- End .col-lg-6 -->

							<div class="col-lg-6">
								<form action="#">
									<input type="email" class="form-control" placeholder="Email address" required>

									<input type="submit" class="btn" value="Subscribe">
								</form>
							</div><!-- End .col-lg-6 -->
						</div><!-- End .row -->
					</div><!-- End .widget -->
				</div><!-- End .col-md-9 -->

				<div class="col-md-3 widget-social">
					<div class="social-icons">
						<a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
						<a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
						<a href="#" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
					</div><!-- End .social-icons -->
				</div><!-- End .col-md-3 -->
			</div><!-- End .row -->
		</div><!-- End .footer-top -->
	</div><!-- End .container -->

	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="widget">
						<h4 class="widget-title">Contact Us</h4>
						<ul class="contact-info">
							<li>
								<span class="contact-info-label">Address:</span>123 Street Name, City, England
							</li>
							<li>
								<span class="contact-info-label">Phone:</span>Toll Free <a href="tel:">(123) 456-7890</a>
							</li>
							<li>
								<span class="contact-info-label">Email:</span> <a href="mailto:mail@example.com">mail@example.com</a>
							</li>
						</ul>
					</div><!-- End .widget -->
				</div><!-- End .col-lg-3 -->

				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-5">
							<div class="widget">
								<h4 class="widget-title">My Account</h4>

								<div class="row">
									<div class="col-sm-6 col-md-5">
										<ul class="links">
											<li><a href="about.html">About Us</a></li>
											<li><a href="contact.html">Contact Us</a></li>
											<li><a href="my-account.html">My Account</a></li>
										</ul>
									</div><!-- End .col-sm-6 -->
									<div class="col-sm-6 col-md-5">
										<ul class="links">
											<li><a href="#">Orders History</a></li>
											<li><a href="#">Advanced Search</a></li>
											<li><a href="#" class="login-link">Login</a></li>
										</ul>
									</div><!-- End .col-sm-6 -->
								</div><!-- End .row -->
							</div><!-- End .widget -->
						</div><!-- End .col-md-5 -->

						<div class="col-md-7">
							<div class="widget">
								<h4 class="widget-title">Main Features</h4>

								<div class="row">
									<div class="col-sm-6">
										<ul class="links">
											<li><a href="#">Super Fast Magento Theme</a></li>
											<li><a href="#">1st Fully working Ajax Theme</a></li>
											<li><a href="#">20 Unique Homepage Layouts</a></li>
										</ul>
									</div><!-- End .col-sm-6 -->
									<div class="col-sm-6">
										<ul class="links">
											<li><a href="#">Powerful Admin Panel</a></li>
											<li><a href="#">Mobile & Retina Optimized</a></li>
										</ul>
									</div><!-- End .col-sm-6 -->
								</div><!-- End .row -->
							</div><!-- End .widget -->
						</div><!-- End .col-md-7 -->
					</div><!-- End .row -->

					<div class="footer-bottom">
						<p class="footer-copyright">Porto eCommerce. &copy;  2018.  All Rights Reserved</p>

						<ul class="contact-info">
							<li>
								<span class="contact-info-label">Working Days/Hours:</span>
								Mon - Sun / 9:00AM - 8:00PM
							</li>
						</ul>
						<img src="<?php echo base_url('v2/assets/images/payments.png')?>" alt="payment methods" class="footer-payments">
					</div><!-- End .footer-bottom -->
				</div><!-- End .col-lg-9 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End .footer-middle -->
</footer><!-- End .footer -->
</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
	<div class="mobile-menu-wrapper">
		<span class="mobile-menu-close"><i class="icon-cancel"></i></span>
		<nav class="mobile-nav">
			<ul class="mobile-menu">
				<li <?php if(strpos(current_url(), 'dashboard')){ echo 'class="active"';}?>><a href="<?php echo base_url('index.php/Home/dashboard');?>">Home</a></li>
                        
                <li><a href="#" class="sf-with-ul">Categories</a>
                    <ul>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                    </ul>
                </li>
                <li <?php if(strpos(current_url(), 'about')){ echo 'class="active"';}?>><a href="<?php echo base_url('index.php/Home/about');?>">About</a></li>
                <li <?php if(strpos(current_url(), 'contact')){ echo 'class="active"';}?>><a href="<?php echo base_url('index.php/Home/contact')?>">Contact</a></li>
                <li><a href="<?php echo base_url('index.php/Home/Login1')?>">Login</a></li>
			</ul>
		</nav><!-- End .mobile-nav -->

		<!--<div class="social-icons">-->
		<!--	<a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>-->
		<!--	<a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>-->
		<!--	<a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>-->
		<!--</div>-->
		<!-- End .social-icons -->
	</div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url(v2/assets/images/newsletter_popup_bg.jpg)">
	<div class="newsletter-popup-content">
		<img src="<?php echo base_url('v2/assets/images/logo-black.png')?>" alt="Logo" class="logo-newsletter">
		<h2>BE THE FIRST TO KNOW</h2>
		<p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
		<form action="#">
			<div class="input-group">
				<input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
				<input type="submit" class="btn" value="Go!">
			</div><!-- End .from-group -->
		</form>
		<div class="newsletter-subscribe">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="1">
					Don't show this popup again
				</label>
			</div>
		</div>
	</div><!-- End .newsletter-popup-content -->
</div><!-- End .newsletter-popup -->

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>


<!-- Plugins JS File -->
<script src="<?php echo base_url('v2/assets/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('v2/assets/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo base_url('v2/assets/js/plugins.min.js')?>"></script>

<!-- Main JS File -->
<script src="<?php echo base_url('v2/assets/js/main.min.js')?>"></script>
<?php if(!empty($js_file_name)):?>
<script type="text/javascript" src="<?php echo base_url('v2/assets/js/modules/'.$js_file_name)?>"></script>
<?php endif;?>
<?php if(!empty($show_google_maps)):?>
<!-- Google Map-->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCLbABrXVz5EMDPTQlDJ9NGhFaiE0OxlI8"></script>
    <script src="assets/js/map.js"></script>
<?php endif;?>
</body>
</html>