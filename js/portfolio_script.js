/**********************************
* Cofigure toastr js notification *
**********************************/
$(document).ready(function() {
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": true,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": true,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

  // Get user basic details
  if($("#dashboardContent").length) {
    loadUserBasicDetails();
  }

  <!-- Menu Toggle Script -->
  if($("#menu-toggle").length) {
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  }
  
  // Show Password Reset Modal
  // let getCurrentUrl = window.location.href;
  // alert(getCurrentUrl);
  // let arrCurrentUrlItem = getCurrentUrl.split("?q=")
  // alert(arrCurrentUrlItem[0]+" ^ "+arrCurrentUrlItem[1]);
  // let arrQueryStringItem = arrCurrentUrlItem[1].split("/");
  // alert(arrQueryStringItem[0]+" & "+arrQueryStringItem[1]+" & "+arrQueryStringItem[2]);
  // let userId = window.atob(arrQueryStringItem[0]);
  // alert(userId);
  // let message = window.atob(arrQueryStringItem[1]);
  // let authHash = window.atob(arrQueryStringItem[2]);
  // alert(userId+" ^ "+message+" ^ "+authHash);
});

/*****************************
* Loads user's basic details *
*****************************/
function loadUserBasicDetails() {
  $.ajax({
    type: 'POST',
    url: SITE_ROOT+'/load-user-basic-details.php',
    data: $.param({}),
    dataType: 'html',
    success:function(results) {
      $("#dashboardLoader").attr("style", "display: none !important");
      $("#dashboardContent").html(results).show();
    2[yur4
    ]}
  });
}

function verifyMobile() {
  let mobileOtp = $.trim($("#mobileOtp").val());
  if(mobileOtp != '' && mobileOtp.length == 6) {
    $("#verifyMobileBtn").addClass('active').attr('disabled', 'disabled').text("loading...");
    $.ajax({
      type: 'POST',
      url: SITE_ROOT + '/verify-mobile.php',
      data: $.param({'mobileOtp': mobileOtp}),
      dataType: 'json',
      success: function(results) {
        toastr[results.response](results.responseMessage, results.responseMessageInfo);
        if(results.response == 'success') {
          $("#mobileVerifyDiv").html("<i class='fa fa-check fa-2x' aria-hidden='true' style='color: #48a868' title='Mobile Verified'></i>");
        } else {
          $("#verifyMobileBtn").removeClass('active').removeAttr('disabled').text('Verify');
        }
      }
    });
  } else {
    alert('Invalid or null OTP received');
    $("#mobileOtp").css('border', '1px solid orange').focus();
  }
}

/*****************************************************************
* This function handles the user registration within the system. *
*****************************************************************/
function registerUser() {
    let submitButton = $("#signupSubmit");
    let submitButtonText = $("#signupSubmit").text();
    let firstName = $.trim($("#firstName").val());
    let lastName = $.trim($("#lastName").val());
    let userMail = $.trim($("#userMail").val());
    let userMobile = $.trim($("#userMobile").val());
    let password = $.trim($("#password").val());
    let confirmPassword = $.trim($("#passord_confirm").val());
    let isEmailValidated, isMobileValidated, isPasswordValidated, isConfirmPasswordValidated;

    if($("#existanceAlert").is(":visible")) {
      return false;
    }

    if(firstName == "") {
    	$("#firstName").css("border", "1px solid red");
    }
    if(lastName == "") {
    	$("#lastName").css("border", "1px solid red");
    }
    if(userMail == "") {
    	$("#userMail").css("border", "1px solid red");
    } else {
    	isEmailValidated = getValidateInputField(userMail, "userMail", true);
    	if(isEmailValidated) {
    		$("#userMail").css("border", ""), $("#userMail").next(alert).hide();
    	} else {
    		$("#userMail").next(alert).show();
    	}
      var ifEmailExists = checkInputExistance(userMail, 'userMail', 'email');
      if(ifEmailExists == 1) {
        return false;
      }
    }
    if(userMobile == "") {
    	$("#userMobile").css("border", "1px solid red");
    } else {
    	isMobileValidated = getValidateInputField(userMobile, "userMobile", true);
    	if(isMobileValidated) {
    		$("#userMobile").css("border", ""), $("#userMobile").next(alert).hide();
    	} else {
    		$("#userMobile").next(alert).show();
    	}
      var ifMobileExists = checkInputExistance(userMobile, 'userMobile', 'mobile');
      if(ifMobileExists == 1) {
        return false;
      }
    }
    if(password == "") {
    	$("#password").css("border", '1px solid red');
    } else {
    	isPasswordValidated = getValidateInputField(password, "password", true);
    	if(isPasswordValidated) {
    		$("#password").css("border", ""), $("#password").next(alert).hide();
    	} else {
    		$("#password").next(alert).show();
    	}
    }
    if(confirmPassword == "") {
    	$("#passord_confirm").css("border", '1px solid red');
    } else {
    	isConfirmPasswordValidated = getValidateInputField(confirmPassword, "passord_confirm", true);
    	if(isConfirmPasswordValidated) {
    		$("#passord_confirm").css("border", ""), $("#passord_confirm").next(alert).hide();
    	} else {
    		$("#passord_confirm").next(alert).show();
    	}
    }
    if(firstName != '' && lastName != '' && isEmailValidated && isMobileValidated && isPasswordValidated && isConfirmPasswordValidated) {
    	$("#validationAlert").hide();
    	submitButton.addClass('active').attr('disabled', 'disabled').text("loading...");
    	$.ajax({
    		type:"post",
    		url:SITE_ROOT+"/user-register-process.php",
        dataTpe:'json',
    		data:$.param({'firstName':firstName, 
    					  'lastName':lastName, 
    			          'userMail':userMail, 
    			          'userMobile':userMobile, 
    			          'password':password
    					}),
    		success:function(results) {
    			toastr[results.response](results.responseMessage, results.responseMessageInfo);
    			submitButton.removeClass('active').removeAttr('disabled').text(submitButtonText);
    			if(results.response == "success") {
    				setTimeout(function() { window.location.assign(SITE_ROOT + '/dashboard.php'); }, 5000);
    			}
    		}
    	});	
    } else {
    	$("#validationAlert").show();
    }
}

/***************************************************************
* This function validates the email, mobile and password input *
* fields.                                                      *
***************************************************************/
function getValidateInputField(inputValue, inputId, referenced) {
    let emailPattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  	let strongPasswordPattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
  	let mediumPasswordPattern = mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
  	if(inputId == "userMail" || inputId == 'userMailPassReset' || inputId == 'userMailSignIn') {
  		if(emailPattern.test(inputValue.trim()) == false) {
  			if(referenced) {
  				return false;
  			} else {
  				$("#"+inputId).next(alert).show();
  			}
  		} else {
  			if(referenced) {
  				return true;
  			} else {
  				$("#"+inputId).next(alert).hide();
  			}
  		}
  	}
  	if(inputId == "userMobile") {
  		if(inputValue.length < 10 || inputValue.length > 15) {
  			if(referenced) {
  				return false;
  			} else {
  				$("#"+inputId).next(alert).show();
  			}
  		} else {
  			if(referenced) {
  				return true;
  			} else {
  				$("#"+inputId).next(alert).hide();
  			}	
  		}
  	}
  	if(inputId == "password" || inputId == "resetPassword") {
  		if(mediumPasswordPattern.test(inputValue.trim()) == true && strongPasswordPattern.test(inputValue.trim()) == false) {
  			$("#"+inputId).css('background-color', '#f48024');
  		} else if(mediumPasswordPattern.test(inputValue.trim()) == true && strongPasswordPattern.test(inputValue.trim()) == true) {
  			$("#"+inputId).css('background-color', '#03a010');
  		}
  		if(mediumPasswordPattern.test(inputValue.trim()) == false && strongPasswordPattern.test(inputValue.trim()) == false) {
  			$("#"+inputId).css('background-color', '#fd0808');
  			if(referenced) {
  				return false;
  			} else {
  				$("#"+inputId).next(alert).show();
  			}
  		} else {
  			if(referenced) {
  				return true;
  			} else {
  				$("#"+inputId).next(alert).hide();
  			}
  		}
  	}
  	if(inputId == "passord_confirm" || inputId == 'resetPasswordConfirm') {
  		if($.trim($("#"+inputId).val()) === $.trim($("#password").val()) || $.trim($("#"+inputId).val()) === $.trim($("#resetPassword").val())) {
  			if(referenced) {
  				return true;
  			} else {
  				$("#"+inputId).next(alert).hide();
  			} 
  		} else {
  			if(referenced) {
  				return false;
  			} else {
  				$("#"+inputId).next(alert).show();
  			}
  		}
  	}
}

/*****************************************************************
* Checks the existance of the email and mobile within the system *
* and reports for the availability for the same                  *
*****************************************************************/

function checkInputExistance(inputValue, inputId, inputField) {
  if(inputValue != '' && inputField != '') {
    $.ajax({
      type: 'POST',
      url: SITE_ROOT+'/check-input-existance.php',
      data: $.param({'inputValue': inputValue, 'inputField': inputField}),
      dataType: 'json',
      success:function(results) {
        if(results == 1) {
          $("#existanceMessage").text("User with the provided " +inputField+ " already exists.");
          $("#existanceAlert").show();
          $("#"+inputId).css('border', '1px solid red');
        } else {
          $("#existanceAlert").hide();
          $("#"+inputId).css('border', '');
        }
        return results;
      }
    });
  }
}

/*************************
* Request Password Reset *
*************************/
function sendPasswordResetLink() {
  let userMailPassReset = $.trim($("#userMailPassReset").val());
  let isEmailValidated;
  if(userMailPassReset == "") {
      $("#userMailPassReset").css("border", "1px solid red").focus();
  } else {
    isEmailValidated = getValidateInputField(userMailPassReset, "userMailPassReset", true);
    if(isEmailValidated) {
      $("#userMailPassReset").css("border", ""), $("#userMailPassReset").next(alert).hide();
      $("#passwordResetLinkRequest").addClass('active').attr('disabled', 'disabled').text("loading...");
      $.ajax({
        type: 'POST',
        url: SITE_ROOT + '/send-password-reset-mail.php',
        data: $.param({'userMailPassReset': userMailPassReset}),
        dataType: 'json',
        success: function(results) {
          toastr[results.response](results.responseMessage, results.responseMessageInfo);
          $("#2[passwordResetLinkRequest").removeClass('active').removeAttr('disabled').text('Submit');
        }
      });
    } else {
      $("#userMailPassReset").next(alert).show();
    }
  }
}

/************************************
* Lets the user login to the system *
************************************/
function loginUser() {
  let userMailSignIn = $.trim($("#userMailSignIn").val());
  let passwordSignIn = $.trim($("#passwordSignIn").val());
  isEmailValidated = false;

  if(userMailSignIn == "") {
    $("#userMailSignIn").css("border", "1px solid red");
  } else {
    isEmailValidated = getValidateInputField(userMailSignIn, "userMailSignIn", true);
    if(isEmailValidated) {
      $("#userMailSignIn").css("border", ""), $("#userMailSignIn").next(alert).hide();
      isEmailValidated = true;
    } else {
      $("#userMailSignIn").next(alert).show();
    }
  }
  if(passwordSignIn == "") {
      $("#passwordSignIn").css("border", '1px solid red');
      $("#passwordSignIn").next(alert).show();
  } else {
    $("#passwordSignIn").css("border", ""), $("#passwordSignIn").next(alert).hide();
  }
  if(isEmailValidated && passwordSignIn != '') {
    $("#loginSubmit").addClass('active').attr('disabled', 'disabled').text('loading...');
    $.ajax({
      type: 'POST',
      url: SITE_ROOT + '/portfolio-login.php',
      data: $.param({'userMailSignIn': userMailSignIn, 'passwordSignIn': passwordSignIn}),
      dataType: 'json',
      success: function(results) {
        toastr[results.response](results.responseMessage, results.responseMessageInfo);
        if(results.response == 'success') {
          setTimeout(function() { window.location.assign(SITE_ROOT + '/dashboard.php') }, 5000);
        } else {
          $("#loginSubmit").removeClass('active').removeAttr('disabled').text('Login');
        }
      }
    });
  }
}

var fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
}
 
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajax_file_upload(fileobj);
    };
}
 
function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        $("#drag_upload_file").fadeTo(1000, 0.4);
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(response) {
                alert(response);
                $('#selectfile').val('');
            }
        });
    }
}