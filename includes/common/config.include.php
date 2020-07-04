<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// phpinfo();
session_start();
/******** Set Timezone to Indian Standard Time(IST) ********/
date_default_timezone_set("Asia/Kolkata");

/******** Site URL Configuration ********/
define('SITE_NAME', 'GAUTAM PORTFOLIO');
define('SITE_ROOT', 'http://127.0.0.1/my_portfolio_project');

/******** Database Configuration Credentials ********/
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_PREFIX', '');

/******** Textlocal API Credentials ********/
define('TEXTLOCAL_API_HASH', '');
define('TEXTLOCAL_API_KEY', '');
define('TEXTLOCAL_SENDER', '');
define('TEXTLOCAL_USERNAME', '');

/******** SMTP Credentials ********/
define('SMTP_USERNAME', '');
define('SMTP_PASSWORD', '');
define('SMTP_FROM_EMAIL', '');
define('SMTP_FROM_NAME', '');
define('SMTP_HOST', '');
define('SMTP_REPLY_EMAIL', '');
define('SMTP_REPLY_NAME', '');

/******** Hash for the authentication process ********/
define('GAUTAMW3_PORTFOLIO_HASH', '');

/******** Cookie Name ********/
define('COOKIE_NAME', '');

/******** Email Verification Message ********/
define('EMAIL_VERIFICATION_MESSAGE', '');

/******** Password Reset Message ********/
define('PASSWORD_RESET_REQUEST_MESSAGE', '');

require_once(__DIR__ .'/../apiClass/textlocal.class.php');
require_once(__DIR__ .'/portfolioMail.class.php');
require_once(__DIR__ .'/../dbClass/portfolio-manager.include.php');
require_once(__DIR__ .'/../manager/portfolio-manager.class.php');

$objInternalPortfolioManager = new PortfolioManagerInternal();
?>
