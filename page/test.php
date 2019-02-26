<?php 
session_start();


$_SESSION['wtf'] = 10;
	function setSessionTime($_timeSecond){  
 if(!isset($_SESSION['ses_time_life'])){  
  $_SESSION['ses_time_life']=time();  
 }  
 if(isset($_SESSION['ses_time_life']) && time()-$_SESSION['ses_time_life']>$_timeSecond){  
  if(count($_SESSION)>0){  
   foreach($_SESSION as $key=>$value){  
    unset($$key);  
    unset($_SESSION[$key]);  
   }  
  }  
 }  
}  
// การใช้งาน  
setSessionTime(10);  
if(!isset($_SESSION['wtf'])){
	echo "<script>alert('wtf')</script>";
}
?>