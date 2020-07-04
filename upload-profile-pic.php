<?php
require_once('includes/common/config.include.php');
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['fileUpload']['tmp_name'];          //3             
      
    $targetPath = 'uploads/profile-pics/';  //4
     
    $targetFile =  $targetPath. $_FILES['fileUpload']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6    
}
?>