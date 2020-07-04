<?php
require_once('includes/common/config.include.php');
$isLoggedIn = $objInternalPortfolioManager->isUserAlreadyLoggedIn();
$arrResponseData = array();
if($isLoggedIn) {
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$mobileOtp = $_POST['mobileOtp'];
		$userId = $_SESSION['USER_ID'];
		$objPortfolioManager = new PortfolioManager();
		$verificationId = $objPortfolioManager->validateMobileOtp($mobileOtp, $userId);
		if($verificationId) {
			$isVerified = $objPortfolioManager->verifyUserMobile($verificationId);
			if($isVerified) {
				$arrResponseData['response'] = "success";
				$arrResponseData['responseMessage'] = "Mobile Verification Successfull";
				$arrResponseData['responseMessageInfo'] = "Thanks!";
			} else {
				$arrResponseData['response'] = "warning";
				$arrResponseData['responseMessage'] = "Mobile Verification Failed";
				$arrResponseData['responseMessageInfo'] = "Please try after some time!";
			}
		} else {
			$arrResponseData['response'] = "error";
			$arrResponseData['responseMessage'] = "Mobile Verification Failed";
			$arrResponseData['responseMessageInfo'] = "Invalid Mobile OTP!";
		}
	} else {
		$arrResponseData['response'] = "error";
		$arrResponseData['responseMessage'] = "Mobile Verification Failed";
		$arrResponseData['responseMessageInfo'] = "Some bot attempt detected!";
	}
}
echo json_encode($arrResponseData);
exit(0);
?>