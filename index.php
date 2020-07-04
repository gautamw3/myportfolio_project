<?php 
require_once('includes/common/config.include.php');
$isLoggedIn = $objInternalPortfolioManager->isUserAlreadyLoggedIn();
if(!$isLoggedIn) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$paramReceived = $_GET['a'];
		$arrParam = explode("/", $paramReceived);
		$userId = base64_decode($arrParam[0]);
		$message = base64_decode($arrParam[1]);
		$authenticationHash = base64_decode($arrParam[2]);
		if($authenticationHash == GAUTAMW3_PORTFOLIO_HASH) { 
			if($message == EMAIL_VERIFICATION_MESSAGE) {
				$cookieData = $arrParam[0]."xxx".$arrParam[2];
				$objInternalPortfolioManager->letUserLogin($userId, $cookieData, true);
			} else if($message == PASSWORD_RESET_REQUEST_MESSAGE) {
				header('Location:'.SITE_ROOT.'/password-reset.php');
				exit(0);
			}
			
		}
	}
}
$pageTitle = "Home";
require_once('includes/pagesDependencies/header.php'); 
include('pages/home.php');	
require_once('includes/pagesDependencies/footer.php'); 
?>