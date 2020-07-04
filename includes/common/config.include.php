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
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'gautamw3');
define('DB_USER', 'root');
define('DB_PASSWORD', 'gautam@root');
define('DB_PREFIX', 'gautamw3');

/******** Textlocal API Credentials ********/
define('TEXTLOCAL_API_HASH', 'd7fd64b50a490aff991bf458d31ece377640e0d60747e37d18e3fe0d0dd8ea1d');
define('TEXTLOCAL_API_KEY', '0Y7D3nyJxHA-r2PYchy3PZIaOyCLPntgZjMEiLvonC');
define('TEXTLOCAL_SENDER', 'TXTLCL');
define('TEXTLOCAL_USERNAME', 'gtminfinia@gmail.com');

/******** SMTP Credentials ********/
define('SMTP_USERNAME', 'gtminfinia@gmail.com');
define('SMTP_PASSWORD', 'Asdf;lkj1990');
define('SMTP_FROM_EMAIL', 'gtminfinia@gmail.com');
define('SMTP_FROM_NAME', 'Gautamw3 Portfolio Suite');
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_REPLY_EMAIL', 'gtminfinia@gmail.com');
define('SMTP_REPLY_NAME', 'Gautamw3 Portfolio Suite');

/******** Hash for the authentication process ********/
define('GAUTAMW3_PORTFOLIO_HASH', 'Gautam5589@Chetu');

/******** Cookie Name ********/
define('COOKIE_NAME', 'perCEPTTlOGINCookie');

/******** Email Verification Message ********/
define('EMAIL_VERIFICATION_MESSAGE', 'PortfolioEmailVerified');

/******** Password Reset Message ********/
define('PASSWORD_RESET_REQUEST_MESSAGE', 'PasswordResetRequest@perCEPTT#Portfolio&Gautamw3');

require_once(__DIR__ .'/../apiClass/textlocal.class.php');
require_once(__DIR__ .'/portfolioMail.class.php');
require_once(__DIR__ .'/../dbClass/portfolio-manager.include.php');
require_once(__DIR__ .'/../manager/portfolio-manager.class.php');

$objInternalPortfolioManager = new PortfolioManagerInternal();
?>
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
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'gautamw3');
define('DB_USER', 'root');
define('DB_PASSWORD', 'gautam@root');
define('DB_PREFIX', 'gautamw3');

/******** Textlocal API Credentials ********/
define('TEXTLOCAL_API_HASH', 'd7fd64b50a490aff991bf458d31ece377640e0d60747e37d18e3fe0d0dd8ea1d');
define('TEXTLOCAL_API_KEY', '0Y7D3nyJxHA-r2PYchy3PZIaOyCLPntgZjMEiLvonC');
define('TEXTLOCAL_SENDER', 'TXTLCL');
define('TEXTLOCAL_USERNAME', 'gtminfinia@gmail.com');

/******** SMTP Credentials ********/
define('SMTP_USERNAME', 'gtminfinia@gmail.com');
define('SMTP_PASSWORD', 'Asdf;lkj1990');
define('SMTP_FROM_EMAIL', 'gtminfinia@gmail.com');
define('SMTP_FROM_NAME', 'Gautamw3 Portfolio Suite');
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_REPLY_EMAIL', 'gtminfinia@gmail.com');
define('SMTP_REPLY_NAME', 'Gautamw3 Portfolio Suite');

/******** Hash for the authentication process ********/
define('GAUTAMW3_PORTFOLIO_HASH', 'Gautam5589@Chetu');

/******** Cookie Name ********/
define('COOKIE_NAME', 'perCEPTTlOGINCookie');

/******** Email Verification Message ********/
define('EMAIL_VERIFICATION_MESSAGE', 'PortfolioEmailVerified');

/******** Password Reset Message ********/
define('PASSWORD_RESET_REQUEST_MESSAGE', 'PasswordResetRequest@perCEPTT#Portfolio&Gautamw3');

require_once(__DIR__ .'/../apiClass/textlocal.class.php');
require_once(__DIR__ .'/portfolioMail.class.php');
require_once(__DIR__ .'/../dbClass/portfolio-manager.include.php');
require_once(__DIR__ .'/../manager/portfolio-manager.class.php');

$objInternalPortfolioManager = new PortfolioManagerInternal();
?>
