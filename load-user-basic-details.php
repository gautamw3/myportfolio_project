<?php
require_once('includes/common/config.include.php');
$isLoggedIn = $objInternalPortfolioManager->isUserAlreadyLoggedIn();
if($isLoggedIn) {
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$userId = $_SESSION['USER_ID'];
		$objPortfolioManager = new PortfolioManager();
		$arrUserProfileDetails = $objInternalPortfolioManager->getUserProfileDetailsById($userId);
		if(count($arrUserProfileDetails) > 0) { ?>
			<table>
				<tbody>
					<h3 style="color: #0f5ba7">Your Profile Details:</h3>
					<hr>
					<tr>
						<div class="row">
							<div class="col-md-4">
								<i class="fa fa-user" aria-hidden="true"></i> <strong>Name:</strong> <?php echo $arrUserProfileDetails['first_name']." ".$arrUserProfileDetails['last_name']; ?>
							</div>
							<div class="col-md-4">
								<i class="fa fa-envelope" aria-hidden="true"></i> <strong>Email:</strong> <?php echo $arrUserProfileDetails['email_id']; ?>
							</div>
							<?php if($arrUserProfileDetails['isEmailVerified'] == '0') { ?>
							<div class="col-md-4">
								<button type="button" class="genric-btn info radius small" id="verifyEmailBtn">Verify Email</button>
							</div>
						<?php } else { ?>
							<div class="col-md-4">
								<i class="fa fa-check fa-2x" aria-hidden="true" style="color: #48a868" title="Email Verified"></i>
							</div>
					    <?php } ?>
						</div>
					</tr>
					<hr>
					<tr>
						<div class="row">
							<div class="col-md-4">
								<i class="fa fa-mobile" aria-hidden="true"></i> <strong>Mobile:</strong> <?php echo $arrUserProfileDetails['mobile']; ?>
							</div>
							<?php if($arrUserProfileDetails['isMobileVerified'] == '0') { ?>
							<div class="col-md-4" id="mobileVerifyDiv">
								<div class="row">
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="mobileOtp" maxlength="6" onkeyup="if (/\D/g.test(this.value)) this.value= this.value.replace(/\D/g,'');" placeholder="Enter OTP *">
									  <div class="input-group-append">
									    <button id="verifyMobileBtn" class="genric-btn info radius small" type="button" onclick="return verifyMobile()">Verify</button>
									  </div>
									</div>
								</div>
							</div>
						    <?php } else { ?>
						    	<div class="col-md-4">
								<i class="fa fa-check fa-2x" aria-hidden="true" style="color: #48a868" title="Mobile Verified"></i>
							</div>
						    <?php } ?>
						</div>
					</tr>
					<hr>
		       		<tr>
						<div class="row">
							<div class="col-md-4">
								<i class="fa fa-users" aria-hidden="true"></i> <strong>Is Admin:</strong> <?php echo ($arrUserProfileDetails['is_admin'] == '0') ? 'False' : 'True'; ?>
							</div>
							<div class="col-md-4">
								<i class="fa fa-calendar-o" aria-hidden="true"></i> <strong>Joined:</strong> <?php echo date('D jS M Y', strtotime($arrUserProfileDetails['profile_created'])); ?>
							</div>
							<div class="col-md-4">
								<i class="fa fa-shield" aria-hidden="true"></i> <strong>Status:</strong> <?php echo $arrUserProfileDetails['status']; ?>
							</div>
						</div>
					</tr>
					<hr>
				</tbody>
			</table>
		<?php }
	}
}
?>