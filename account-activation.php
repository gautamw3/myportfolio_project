<?php
require_once('includes/common/config.include.php');
if($_SERVER['REQUEST_METHOD'] == 'GET') {
	$paramRecieved = $_GET['q'];
	$arrParam = explode("/", $paramRecieved);
	$userId = base64_decode($arrParam[0]);
	$activationHash = base64_decode($arrParam[1]);
	$verificationHash = base64_decode($arrParam[2]);
	if($activationHash == GAUTAMW3_PORTFOLIO_HASH) {
		$objPortfolioManager = new PortfolioManager();
		$verificationStatus = $objPortfolioManager->verifyEmail($userId, $verificationHash);
		if($verificationStatus) {
			$message = base64_encode(EMAIL_VERIFICATION_MESSAGE);
			header("Location:".SITE_ROOT."?a=".$arrParam[0]."/".$message."/".$arrParam[1]);
		} else {
			echo "<div class='alert alert-danger'><strong>error!</strong> Email verification Failed. Please contact the admin</div>";
		}
	} else {
		echo "<div class='alert alert-danger'><strong>error!</strong> Some bot attempt detected</div>";
	}
} else {
	echo "<div class='alert alert-danger'><strong>error!</strong> Not a valid request</div>";
}
?>
