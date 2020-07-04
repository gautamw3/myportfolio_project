<?php
require_once('includes/common/config.include.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$userMail = $_POST['userMail'];
	$userMobile = $_POST['userMobile'];
	$password = $_POST['password'];
	$userId;
	$arrResponseData = array();
	// Create PortfolioManager Class Object
	$objPortfolioManager = new PortfolioManager();              
	$userId = $objPortfolioManager->registerPortfolioUser($firstName, $lastName, $userMail, $userMobile, $password);
	if(gettype($userId) == "integer") {
		// Send mail for email verification
		$verificationCode = mt_rand(111111, 999999);
		$verificationHash = base64_encode($verificationCode);
		$subject = "perCEPTT | Email Verification";
		$activationHash = base64_encode(GAUTAMW3_PORTFOLIO_HASH);
		$userIdHash = base64_encode($userId);
		$activationUrl = SITE_ROOT."/account-activation.php?q=".$userIdHash."/".$activationHash."/".$verificationHash;
		$arrMailData = array('name'=>$firstName, 'activationUrl'=>$activationUrl);
		$objPortfolioMailer = new PortfolioMail();
		$objPortfolioMailer->sendFirstTimeMail($userMail, $subject, $arrMailData);
		// Send OTP for mobile verification
		$otp = mt_rand(111111, 999999);
		// $otpSentToTheNumber = "91".$userMobile;
		// $numbers = array($otpSentToTheNumber);
		// $message = 'OTP for the mobile verification is - '.$otp." valid for 24 hours from now.";
		// $objTextLocal = new Textlocal(TEXTLOCAL_USERNAME, TEXTLOCAL_API_HASH);
  //   	$result = $objTextLocal->sendSms($numbers, $message, TEXTLOCAL_SENDER);
    	$objPortfolioManager->addVerificationBase($userId, $verificationCode, $otp);
    	$cookieData = base64_encode($userId)."xxx".$activationHash;
		$objInternalPortfolioManager->letUserLogin($userId, $cookieData, true);

		$arrResponseData['response'] = "success";
		$arrResponseData['responseMessage'] = "Registration Successfull";
		$arrResponseData['responseMessageInfo'] = "Redirecting to dashboard";
	} else {
		$arrResponseData['response'] = "warning";
		$arrResponseData['responseMessage'] = "Registration Failed";
		$arrResponseData['responseMessageInfo'] = $userId;
	}
} else {
	$arrResponseData['response'] = "error";
	$arrResponseData['responseMessage'] = "Registration Failed";
	$arrResponseData['responseMessageInfo'] = "Invalid Form Submission";
}
echo json_encode($arrResponseData);
exit(0);
?>