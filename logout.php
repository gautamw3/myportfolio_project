<?php
require_once('includes/common/config.include.php');
$objInternalPortfolioManager->logout();
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);
?>