<?php 
function redirec_to($url){
        echo "<script>location.replace('".$url."')</script>";
}
function back(){
        echo "<script>window.history.back();</script>";
}
function alert($str){
        echo "<script>alert('".$str."')</script>";
}
function reload(){
	echo   "<script>location.reload()</script>"; 
}
?>