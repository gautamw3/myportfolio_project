<?php
class PortfolioManagerInternal {
	public $isLoggedIn;
	public $loginStatus;

	public function __construct() {
		$this->isLoggedIn = false;
		$this->loginStatus = false;
	}

	/****************************************
	* Let user login if login cookie is set *
	****************************************/
	public function isUserAlreadyLoggedIn() {
		if($_COOKIE[COOKIE_NAME]) {
			$arrParam = explode("xxx", $_COOKIE[COOKIE_NAME]);
			$userId = base64_decode($arrParam[0]);
			$authenticationHash = base64_decode($arrParam[1]);
			if($authenticationHash == GAUTAMW3_PORTFOLIO_HASH) { 
				$loginStatus = $this->letUserLogin($userId, '', false);
				if($loginStatus) {
					$this->isLoggedIn = true;
				}
			}
		}
		return $this->isLoggedIn;
	}

	/*********************
	* User login process *
	*********************/
	public function letUserLogin($userId, $cookieData='', $setCookie=false) {
		$objPortfolioManager = new PortfolioManager();
		$arrUserDetails = $objPortfolioManager->getUserDetailsById($userId);
		if($arrUserDetails['email_id']) {
			$_SESSION['USER_ID'] = $arrUserDetails['user_id'];
			$_SESSION['FIRST_NAME'] = $arrUserDetails['first_name'];
			$_SESSION['LAST_NAME'] = $arrUserDetails['last_name'];
			$_SESSION['USER_MAIL'] = $arrUserDetails['email_id'];
			$_SESSION['USER_MOBILE'] = $arrUserDetails['mobile'];
			if($setCookie) {
				setcookie(COOKIE_NAME, $cookieData, time() + (86400 * 3), "/");
			}
			$this->loginStatus = true;
		}
		return $this->loginStatus;
	}

	/*****************
	* Logout process *
	*****************/
	public function logout() {
		echo COOKIE_NAME;
		session_destroy();
		setcookie(COOKIE_NAME, "", time() - 3600);
		unset($_COOKIE[COOKIE_NAME]);
	}

	/*********************************
	* Get user profile details by id *
	*********************************/
	public function getUserProfileDetailsById($userId) {
		$arrUserDetails = '';
		$arrUserVerificationDetails = '';
		$arrUserProfileDetails = array();
		$objPortfolioManager = new PortfolioManager();
		$arrUserDetails = $objPortfolioManager->getUserDetailsById($userId);
		$arrUserVerificationDetails = $objPortfolioManager->userVerificationDetailsById($userId);
		$arrUserProfileDetails['user_id'] = $arrUserDetails['user_id'];
		$arrUserProfileDetails['first_name'] = $arrUserDetails['first_name'];
		$arrUserProfileDetails['last_name'] = $arrUserDetails['last_name'];
		$arrUserProfileDetails['email_id'] = $arrUserDetails['email_id'];
		$arrUserProfileDetails['mobile'] = $arrUserDetails['mobile'];
		$arrUserProfileDetails['status'] = $arrUserDetails['status'];
		$arrUserProfileDetails['is_admin'] = $arrUserDetails['is_admin'];
		$arrUserProfileDetails['profile_created'] = $arrUserDetails['date_added'];
		$arrUserProfileDetails['profile_updated'] = $arrUserDetails['date_updated'];

		$arrUserProfileDetails['verification_id'] = $arrUserVerificationDetails['verification_id'];
		$arrUserProfileDetails['emailVerificationCode'] = $arrUserVerificationDetails['emailVerificationCode'];
		$arrUserProfileDetails['mobileVerificationCode'] = $arrUserVerificationDetails['mobileVerificationCode'];
		$arrUserProfileDetails['isEmailVerified'] = $arrUserVerificationDetails['isEmailVerified'];
		$arrUserProfileDetails['isMobileVerified'] = $arrUserVerificationDetails['isMobileVerified'];
		$arrUserProfileDetails['verification_code_sent'] = $arrUserVerificationDetails['date_added'];
		$arrUserProfileDetails['verification_status_updated'] = $arrUserVerificationDetails['date_updated'];

		return $arrUserProfileDetails;
	}
}
?>