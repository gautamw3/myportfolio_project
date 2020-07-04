<?php
require_once('includes/common/config.include.php');
$isLoggedIn = $objInternalPortfolioManager->isUserAlreadyLoggedIn();
if(!$isLoggedIn) {
	header('Location:'.SITE_ROOT.'?err=You are logged out of the system or your session has been expired');
}
$pageTitle = "Dashboard";
require_once('includes/pagesDependencies/header.php');
include('pages/dashboard.php');
require_once('includes/pagesDependencies/footer.php');
?>