<?php 
	if(isset($_GET['id']) && isset($_GET['c'])){
		require 'config.php';
		$sql = "DELETE FROM reservation WHERE res_id='".$_GET['id']."'";
		$result =$con->prepare($sql);
		$result -> execute();
		$c = $_GET['c'];
		$c -= 1;
		


		if($result){
			if($c >= 0) {
			redirec_to("?p=booking_travel3&id=".$id."&c=".$c);
			}else{
				redirec_to("?p=home");
			}
		}
	
	}
?>