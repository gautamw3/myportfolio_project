<?php
require_once('includes/common/config.include.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$inputValue = $_POST['inputValue'];
	$inputField = ($_POST['inputField'] == 'email') ? 'email_id' : $_POST['inputField'];
	if($inputValue != '' && $inputField != '') {
		$objPortfolioManager = new PortfolioManager();
		$arrUserDetails = $objPortfolioManager->getUserDetailsByEmailOrMobile($inputField, $inputValue);
		if($arrUserDetails['user_id']) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
?>