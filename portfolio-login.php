<?php 
require_once('includes/common/config.include.php');
$arrResponseData = array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$userMail = $_POST['userMailSignIn'];
	$userPassword = $_POST['passwordSignIn'];
	if($userMail != '' && $userPassword != '') {
		$objPortfolioManager = new PortfolioManager();
		$userId = $objPortfolioManager->checkUserLogin($userMail, $userPassword);
		if($userId) {
			$cookieData = base64_encode($userId)."xxx".base64_encode(GAUTAMW3_PORTFOLIO_HASH);
			$loginStatus = $objInternalPortfolioManager->letUserLogin($userId, $cookieData, true);
			if($loginStatus) {
				$arrResponseData['response'] = "success";
				$arrResponseData['responseMessage'] = "Login Successfull";
				$arrResponseData['responseMessageInfo'] = "Redirecting to dashboard";
			} else {
				$arrResponseData['response'] = "warning";
				$arrResponseData['responseMessage'] = "Login Failed";
				$arrResponseData['responseMessageInfo'] = "Something went wrong";
			}
		} else {
			$arrResponseData['response'] = "error";
			$arrResponseData['responseMessage'] = "Login Failed";
			$arrResponseData['responseMessageInfo'] = "Wrong email and/or password";
		}
	}
} else {
	$arrResponseData['response'] = "error";
	$arrResponseData['responseMessage'] = "Unauthorized access";
	$arrResponseData['responseMessageInfo'] = "Some BOT attempt detected";
}
echo json_encode($arrResponseData);
exit(0);
?>