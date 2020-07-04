<?php

class PortfolioManager {
	public $db;

	public function __construct() {
		$this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/********************
	* User registration *
	********************/
	public function registerPortfolioUser($firstName, $lastName, $userMail, $userMobile, $password) {
		$insertId = "";
		$password = md5($password);
		try {
			$sqlInsert = "INSERT INTO ".DB_PREFIX."_users SET first_name = :FIRSTNAME, last_name = :LASTNAME, email_id = :EMAILID, password = :PASSWORD, mobile = :MOBILE";
			$stmt = $this->db->prepare($sqlInsert);
			$stmt->bindValue(':FIRSTNAME', $firstName, PDO::PARAM_STR);
			$stmt->bindValue(':LASTNAME', $lastName, PDO::PARAM_STR);
			$stmt->bindValue(':EMAILID', $userMail, PDO::PARAM_STR);
			$stmt->bindValue(':MOBILE', $userMobile, PDO::PARAM_STR);
			$stmt->bindValue(':PASSWORD', $password, PDO::PARAM_STR);
			$stmt->execute();
			$insertId = $this->db->lastInsertId();
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return $sqlInsert . "<br>" . $e->getMessage();
		}
		return (int) $insertId;
	}

	/*******************************************
	* Verification data feeded to the database *
	*******************************************/
	public function addVerificationBase($userId, $emailVerificationCode, $mobileVerificationCode) {
		try {
			$insertId = "";
			$sqlInsert = "INSERT INTO ".DB_PREFIX."_users_verification SET userId = :USERID, emailVerificationCode = :EMAILVERIFICATIONCODE, mobileVerificationCode = :MOBILEVERIFICATIONCODE";
			$stmt = $this->db->prepare($sqlInsert);
			$stmt->bindValue(':USERID', $userId, PDO::PARAM_INT);
			$stmt->bindValue(':EMAILVERIFICATIONCODE', $emailVerificationCode, PDO::PARAM_STR);
			$stmt->bindValue(':MOBILEVERIFICATIONCODE', $mobileVerificationCode, PDO::PARAM_STR);
			$stmt->execute();
			$insertId = $this->db->lastInsertId();
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $insertId;
	}

	/*****************************
	* Email verification process *
	*****************************/
	public function verifyEmail($userId, $verificationCode) {
		$status = false;
		try{
			$sqlUpdate = "UPDATE ".DB_PREFIX."_users_verification SET isEmailVerified = '1' WHERE userId = :USERID LIMIT 1";
			$stmt = $this->db->prepare($sqlUpdate);
			$stmt->bindValue(':USERID', $userId, PDO::PARAM_STR);
			if($stmt->execute()) {
				$status = true;
			}
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $status;
	}

	/*************************
	* Get user details by id *
	**************************/
	public function getUserDetailsById($userId) {
		$arrUserDetails = '';
		try{
			$sqlSelect = "SELECT * FROM ".DB_PREFIX."_users WHERE user_id = :USERID";
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->bindValue(':USERID', $userId, PDO::PARAM_STR);
			$stmt->execute();
			$arrUserDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
		}catch(PDOException $e) {print_r($e); die;
			return "errorMsg : ".$e->getMessage();
		}
		return $arrUserDetails;
	}

	/**************************************
	* Get user details by email or mobile *
	**************************************/
	public function getUserDetailsByEmailOrMobile($inputField, $inputValue) {
		$arrUserDetails = '';
		try{
			$sqlSelect = "SELECT * FROM ".DB_PREFIX."_users WHERE ".$inputField." = :INPUTVALUE";
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->bindValue(':INPUTVALUE', $inputValue, PDO::PARAM_STR);
			$stmt->execute();
			$arrUserDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $arrUserDetails;
	}

	/**************************************
	* Get user verification details by id *
	**************************************/
	public function userVerificationDetailsById($userId) {
		$arrUserVerificationDetails = '';
		try{
			$sqlSelect = "SELECT * FROM ".DB_PREFIX."_users_verification WHERE userId = :USERID";
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->bindValue(':USERID', $userId, PDO::PARAM_STR);
			$stmt->execute();
			$arrUserVerificationDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $arrUserVerificationDetails;
	}

	/*********************
	* Verify user mobile *
	*********************/
	public function verifyUserMobile($verificationId) {
		$isVerified = false;
		try {
			$sqlUpdate = "UPDATE ".DB_PREFIX."_users_verification SET isMobileVerified = '1' WHERE verification_id = :VERIFICATIONID LIMIT 1";
			$stmt = $this->db->prepare($sqlUpdate);
			$stmt->bindValue(':VERIFICATIONID', $verificationId, PDO::PARAM_STR);
			if($stmt->execute()) {
				$isVerified = true;
			}
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $isVerified;
	}

	/**************************************************
	* Checks for the existance for the user on behalf *
	* of email and password provided and returns the  *
	* user_id if a match is found                     *
	**************************************************/
	public function checkUserLogin($userMail, $userPassword) {
		$userId = false;
		try{
			$sqlSelect = "SELECT user_id FROM ".DB_PREFIX."_users WHERE email_id = :EMAILID AND password = :PASSWORD";
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->bindValue(':EMAILID', $userMail, PDO::PARAM_STR);
			$stmt->bindValue(':PASSWORD', md5($userPassword), PDO::PARAM_STR);
			$stmt->execute();
			if($row = $stmt->fetch()) {
				$userId = $row['user_id'];
			}
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $userId;
	}

	/**********************
	* Validate Mobile OTP *
	**********************/

	public function validateMobileOtp($mobileOtp, $userId) {
		$verificationId = false;
		try{
			$sqlSelect = "SELECT verification_id FROM ".DB_PREFIX."_users_verification WHERE userId = :USERID AND mobileVerificationCode = :MOBILEVERIFICATIONCODE";
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->bindValue(':USERID', $userId, PDO::PARAM_STR);
			$stmt->bindValue(':MOBILEVERIFICATIONCODE', $mobileOtp, PDO::PARAM_STR);
			$stmt->execute();
			if($row = $stmt->fetch()) {
				$verificationId = $row['verification_id'];
			}
			$stmt->closeCursor();
		} catch(PDOException $e) {
			return "errorMsg : ".$e->getMessage();
		}
		return $verificationId;
	}
}
?>