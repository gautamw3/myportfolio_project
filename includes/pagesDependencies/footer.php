<!--================ Start Footer Area =================-->
	<footer class="footer_area section_gap">
		<div class="container">
			<div class="row footer_inner justify-content-center">
				<div class="col-lg-6 text-center">
					<aside class="f_widget social_widget">
						<div class="f_logo">
							<img src="img/logo.png" alt="">
						</div>
						<div class="f_title">
							<h4>Follow Me</h4>
						</div>
						<ul class="list">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</aside>
					<div class="copyright">
						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--================End Footer Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo SITE_ROOT; ?>/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/popper.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/stellar.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/vendors/isotope/isotope-min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/gmaps.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/theme.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/toaster.min.js"></script>
	<script src="<?php echo SITE_ROOT; ?>/js/portfolio_script.js"></script>
	<script> var SITE_ROOT = "<?php echo SITE_ROOT; ?>" </script>
</body>

<!--=================== Signup Modal Starts ===================-->
<div class="modal" id="portfolioSignupModal" data-backdrop="static">
	<div class="modal-dialog modal-lg">
    	<div class="modal-content">

      	<!-- Modal Header -->
      	<div class="modal-header">
        	<h4 class="modal-title modalHeading">Signup</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>

      	<!-- Modal body -->
      	<div class="modal-body">
      		<div class="row" id="validationAlert" style="display: none">
		        <div class="col-md-12">
		        	<div class="alert alert-danger alert-dismissable">
		            	<strong>error!</strong> Please fix the errors below
		        	</div>
		        </div>
    		</div>
    		<div class="row" id="existanceAlert" style="display: none">
		        <div class="col-md-12">
		        	<div class="alert alert-danger alert-dismissable">
		            	<strong>error!</strong> <span id="existanceMessage"></span>
		        	</div>
		        </div>
    		</div>
	        <form id="portfolioSignupForm">
	        	<div class="row">
	        		<div class="col-md-6">
			        	<div class="form-group">
			    			<label for="firstName"><strong>First Name:</strong></label>
			    			<input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName" required>
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			    			<label for="lastName"><strong>Last Name:</strong></label>
			    			<input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName" required>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="row">
	        		<div class="col-md-6">
			  			<div class="form-group">
			    			<label for="userMail"><strong>Email:</strong></label>
			    			<input type="Email" class="form-control" id="userMail" placeholder="Enter Email" name="userMail" onkeyup="getValidateInputField($.trim($('#userMail').val()), 'userMail', '')" onblur="checkInputExistance($.trim($('#userMail').val()), 'userMail', 'email')" autocomplete="off" required>
			    			<alert id="alert-userMail" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Not a valid email id</span></alert>
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			    			<label for="userMobile"><strong>Mobile:</strong></label>
			    			<input type="text" class="form-control" id="userMobile" placeholder="Enter Mobile *" name="userMobile" onkeyup="if (/\D/g.test(this.value)) this.value= this.value.replace(/\D/g,'');getValidateInputField($.trim($('#userMobile').val()), 'userMobile', '')" onblur="checkInputExistance($.trim($('#userMobile').val()), 'userMobile', 'mobile')" maxlength="15" autocomplete="off" required>
			    			<alert id="alert-userMobile" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Not a valid mobile number </span></alert>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-md-6">
			  			<div class="form-group">
					    	<label for="password"><strong>Password:</strong></label>
					    	<input type="password" class="form-control" id="password" placeholder="Enter password *" name="password" onkeyup="return getValidateInputField($.trim($('#password').val()), 'password', '')" required>
					    	<alert id="alert-password" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Invalid Password </span></alert>
					    </div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			    			<label for="passord_confirm"><strong>Confirm Password:</strong></label>
			    			<input type="password" class="form-control" id="passord_confirm" placeholder="Confirm Password *" name="passord_confirm" onkeyup="return getValidateInputField($.trim($('#passord_confirm').val()), 'passord_confirm', '')" required>
			    			<alert id="alert-passord_confirm" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Password mismatch </span></alert>
			  			</div>
			  		</div>
		  		</div>
	  		    <button type="button" class="btn btn-primary btn-block" id="signupSubmit" onclick="return registerUser()">Submit</button>
			</form>
    	</div>
	</div>
  </div>
</div>
<!--=================== Signup Modal Ends ===================-->

<!--=================== Signin Modal Starts ===================-->
<div class="modal" id="portfolioSigninModal" data-backdrop="static">
	<div class="modal-dialog modal-md">
    	<div class="modal-content">

      	<!-- Modal Header -->
      	<div class="modal-header">
        	<h4 class="modal-title modalHeadingSignIn">Signin</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>

      	<!-- Modal body -->
      	<div class="modal-body">
	        <form id="portfolioSigninForm">
			  	<div class="row">
			  		<div class="col-md-12">
		        		<div class="form-group">
			    			<label for="userMailSignIn"><strong>Email:</strong></label>
			    			<input type="Email" class="form-control" id="userMailSignIn" placeholder="Enter Email" name="userMail" onkeyup="getValidateInputField($.trim($('#userMailSignIn').val()), 'userMailSignIn', '')" required>
			    			<alert id="alert-userMailSignIn" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Not a valid email id</span></alert>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-md-12">
			  			<div class="form-group">
					    	<label for="passwordSignIn"><strong>Password:</strong></label>
					    	<input type="password" class="form-control" id="passwordSignIn" placeholder="Enter password *" name="password" required>
					    	<p style="margin-top: 10px;">Forgot password?<a href="JavaScript:void(0)" onclick="$('#portfolioSigninModal').modal('hide');$('#forgotPasswordModal').modal()"> Click here</a></p>
					    </div>
					</div>
			  	</div>
	  		    <button type="button" class="btn btn-primary btn-block" id="loginSubmit" onclick="return loginUser()">Login</button>
			</form>
    	</div>
	</div>
  </div>
</div>
<!--=================== Signin Modal Ends ===================-->

<!--=================== Forgot Password Modal Starts ===================-->
<div class="modal" id="forgotPasswordModal" data-backdrop="static">
	<div class="modal-dialog modal-md">
    	<div class="modal-content">

      	<!-- Modal Header -->
      	<div class="modal-header">
        	<h4 class="modal-title modalHeadingPassReset">Password Reset</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>

      	<!-- Modal body -->
      	<div class="modal-body">
      		<div class="row" id="validationAlertPassReset" style="display: none">
		        <div class="col-md-12">
		        	<div class="alert alert-danger alert-dismissable">
		            	<strong>error!</strong> Wrong email or password
		        	</div>
		        </div>
    		</div>
	        <form id="portfolioPassResetForm">
			  	<div class="row">
			  		<div class="col-md-12">
		        		<div class="form-group">
			    			<label for="userMailPassReset"><strong>Email:</strong></label>
			    			<input type="Email" class="form-control" id="userMailPassReset" placeholder="Enter Email *" name="userMail" onkeyup="getValidateInputField($.trim($('#userMailPassReset').val()), 'userMailPassReset', '')" required>
			    			<alert id="alert-userMailPassReset" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Not a valid email id</span></alert>
			  			</div>
			  		</div>
			  	</div>
	  		    <button type="button" class="btn btn-primary btn-block" id="passwordResetLinkRequest" onclick="return sendPasswordResetLink()">Submit</button>
			</form>
    	</div>
	</div>
  </div>
</div>
<!--=================== Forgot Password Modal Ends ===================-->

<!--=================== Password Reset Modal Starts ===================-->
<!-- <div class="modal" id="passwordResetModal" data-backdrop="static">
	<div class="modal-dialog modal-md">
    	<div class="modal-content"> -->

      	<!-- Modal Header -->
      	<!-- <div class="modal-header">
        	<h4 class="modal-title modalHeadingPassReset">Password Reset</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div> -->

      	<!-- Modal body -->
      	<!-- <div class="modal-body">
      		<div class="row" id="validationAlertPassReset" style="display: none">
		        <div class="col-md-12">
		        	<div class="alert alert-danger alert-dismissable">
		            	<strong>error!</strong> Wrong email or password
		        	</div>
		        </div>
    		</div>
	        <form>
			  	<div class="row">
			  		<div class="col-md-12">
		        		<div class="form-group">
			    			<label for="resetPassword"><strong>New Password:</strong></label>
			    			<input type="text" class="form-control" id="resetPassword" placeholder="Enter New Password *" name="resetPassword" onkeyup="return getValidateInputField($.trim($('#resetPassword').val()), 'resetPassword', '')" required>
			    			<alert id="alert-resetPassword" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Not a valid email id</span></alert>
			  			</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-md-12">
		        		<div class="form-group">
			    			<label for="resetPasswordConfirm"><strong>New Password:</strong></label>
			    			<input type="password" class="form-control" id="resetPasswordConfirm" placeholder="Confirm New Password *" name="resetPasswordConfirm" onkeyup="return getValidateInputField($.trim($('#resetPasswordConfirm').val()), 'resetPasswordConfirm', '')" required>
			    			<alert id="alert-resetPasswordConfirm" style="display: none;color: red"><span><i class="fa fa-warning" aria-hidden="true"></i> Password mismatch </span></alert>
			  			</div>
			  		</div>
			  	</div>
	  		    <button type="button" class="btn btn-primary btn-block" id="passwordResetLinkRequest" onclick="return sendPasswordResetLink()">Submit</button>
			</form>
    	</div>
	</div>
  </div>
</div> -->
<!--=================== Password Reset Modal Ends ===================-->

</html>