<?php
require_once('includes/common/config.include.php');
$arrResponseData = array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$userMailPassReset = $_POST['userMailPassReset'];
	if($userMailPassReset != '') {
		$objPortfolioManager = new PortfolioManager();
		$arrUserDetails = $objPortfolioManager->getUserDetailsByEmailOrMobile('email_id', $userMailPassReset);
		if($arrUserDetails['user_id']) {
			$secretHash = base64_encode($arrUserDetails['user_id']).'/'.base64_encode(PASSWORD_RESET_REQUEST_MESSAGE).'/'.base64_encode(GAUTAMW3_PORTFOLIO_HASH);
			$subject = 'Password reset link';
			$resetUrl = SITE_ROOT.'?q='.$secretHash;
			$mailData = array(
				'subject' => $subject,
				'mailTo' => $userMailPassReset,
				'name' => $arrUserDetails['first_name'],
				'resetUrl' => $resetUrl
			);
			$objPortfolioMailer = new PortfolioMail();
			if($objPortfolioMailer->sendPasswordResetLink($mailData)) {
				$arrResponseData['response'] = "success";
				$arrResponseData['responseMessage'] = "We just sent a mail with instructions to reset your password";
				$arrResponseData['responseMessageInfo'] = "Kindly check your mailbox!";
			} else {
				$arrResponseData['response'] = "warning";
				$arrResponseData['responseMessage'] = "Request Failed";
				$arrResponseData['responseMessageInfo'] = "Please try after some time";
			}
		} else {
			$arrResponseData['response'] = "error";
			$arrResponseData['responseMessage'] = "Wrong/Invalid email supplied";
			$arrResponseData['responseMessageInfo'] = "Please provide the correct one!";
		}
	} else {
		$arrResponseData['response'] = "error";
		$arrResponseData['responseMessage'] = "No email provided";
		$arrResponseData['responseMessageInfo'] = "Please provide one!";
	}
} else {
	$arrResponseData['response'] = "error";
	$arrResponseData['responseMessage'] = "Unauthorised access detected";
	$arrResponseData['responseMessageInfo'] = "************************";
}
echo json_encode($arrResponseData);
exit(0);
?>