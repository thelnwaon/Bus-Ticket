<?php 


	require 'config.php';
	if(isset($_GET['id'])){

		$sql = "DELETE FROM reservation  WHERE res_id='".$_GET['id']."'";
		$result =$con->prepare($sql);
		$result -> execute();

		if($result){
			redirec_to("?p=see_booking_member");
		}
		else{
			redirec_to("?p=see_booking_member");
		}
	}
?>

?>