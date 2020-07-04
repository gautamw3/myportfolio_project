<?php
require_once(__DIR__ .'/../lib/PHPMailer-master/src/Exception.php');
require_once(__DIR__ .'/../lib/PHPMailer-master/src/PHPMailer.php');
require_once(__DIR__ .'/../lib/PHPMailer-master/src/SMTP.php');

class PortfolioMail {
	private $mail;

	public function __construct() {
		$this->mail = new PHPMailer\PHPMailer\PHPMailer();
		$this->mail->IsSMTP();
		$this->mail->SMTPDebug = 0;
		$this->mail->SMTPAuth = TRUE;
		$this->mail->SMTPSecure = "tls";
		$this->mail->Port = 587; 
		$this->mail->Username = SMTP_USERNAME;
		$this->mail->Password = SMTP_PASSWORD;
		$this->mail->Host = SMTP_HOST;
		$this->mail->Mailer = "smtp";
		$this->mail->SetFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
		$this->mail->AddReplyTo(SMTP_REPLY_EMAIL, SMTP_REPLY_NAME);
		$this->mail->WordWrap = 80;
		$this->mail->IsHTML(true);
	}
	
	/****************************************************
	* Send Email Verificationion Mail Upon Registration *
	****************************************************/
	public function sendFirstTimeMail($recipient, $subject, $content) {
		$this->mail->Subject = $subject;
		$this->mail->AddAddress($recipient); 

		$body = "<table align='center' cellpadding='0' cellspacing='0' style='font-family:arial;min-width:348px; max-width:600px; background-color: #e0e5ea;padding: 0 10px 60px; color: #333;'>
					<tbody>
						<tr>
							<td>
								<table align='center' cellpadding='0' cellspacing='0'  style='font-family:arial;min-width:348px; max-width:600px; background-color: #FFFFFF;padding: 0 30px;margin-top:10px;'>
									<tbody>
										<tr>
											<td><img width=' style='height:60px; padding: 0 40px 30px;' src='".SITE_ROOT."/img/logo.png' ></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:36px;text-align:left;'>Welcome, ".$content['name']."!</span>
											</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:16px;text-align:left'>You are receiving this mail because your <br>perCEPTT account has been created</span>
											</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:16px;text-align:left'>Kindly verify your email address by clicking the link below:</span>
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:16px;text-align:left'><a href='".$content['activationUrl']."'>".$content['activationUrl']."</a></span>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<center>
									<img width='' style='height:70' src='".SITE_ROOT."/img/logo.png' alt='perCEPTT'>
								</center>
							</td>
						</tr>
						<tr>
							<td style='padding-left:10px;padding-bottom:10px'>
								<center>
									<span style='font-size:14px;text-align:center'>Copyright &copy; 2020 perCEPTT. All rights researved.</span>
								</center>
							</td>
						</tr>
					</tbody>
				</table>";
		$this->mail->MsgHTML($body);
		if(!$this->mail->Send()) {
			return false;
		} else {
			return true;
		}
	}

	/***************************
	* Send Password Reset Link *
	***************************/
	public function sendPasswordResetLink($mailData) {
		$this->mail->Subject = $mailData['subject'];
		$this->mail->AddAddress($mailData['mailTo']); 

		$body = "<table align='center' cellpadding='0' cellspacing='0' style='font-family:arial;min-width:348px; max-width:600px; background-color: #e0e5ea;padding: 0 10px 60px; color: #333;'>
					<tbody>
						<tr>
							<td>
								<table align='center' cellpadding='0' cellspacing='0'  style='font-family:arial;min-width:348px; max-width:600px; background-color: #FFFFFF;padding: 0 30px;margin-top:10px;'>
									<tbody>
										<tr>
											<td><img width=' style='height:60px; padding: 0 40px 30px;' src='".SITE_ROOT."/img/logo.png' ></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:36px;text-align:left;'>Hi, ".$mailData['name']."!</span>
											</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:16px;text-align:left'>You are receiving this mail because you <br>have requested for password reset at perCEPTT</span>
											</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:16px;text-align:left'>Kindly reset your password by clicking the link below:</span>
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td style='padding-left:10px;padding-bottom:15px'>
												<span style='font-size:16px;text-align:left'><a href='".$mailData['resetUrl']."'>".$mailData['resetUrl']."</a></span>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<center>
									<img width='' style='height:70' src='".SITE_ROOT."/img/logo.png' alt='perCEPTT'>
								</center>
							</td>
						</tr>
						<tr>
							<td style='padding-left:10px;padding-bottom:10px'>
								<center>
									<span style='font-size:14px;text-align:center'>Copyright &copy; 2020 perCEPTT. All rights researved.</span>
								</center>
							</td>
						</tr>
					</tbody>
				</table>";
		$this->mail->MsgHTML($body);
		if(!$this->mail->Send()) {
			return false;
		} else {
			return true;
		}
	}
}
?>