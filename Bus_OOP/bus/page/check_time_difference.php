<?php 
date_default_timezone_set("Asia/Bangkok");
session_start();
	if(isset($_POST['data'])){
		$date = date("d/m");
				$year= date("Y")+543;
				$all_date  = $date.'/'.$year;
		require '../config.php';
		$sql  ="SELECT route.*,bustype.bustype_name,reservation.*,user.* FROM reservation  INNER JOIN route ON  route.rou_id = reservation.id_rou INNER JOIN bustype ON route.id_bustype = bustype.bustype_id INNER JOIN user ON  reservation.id_user=user.user_id";
		$result = $con->prepare($sql);
		$result -> execute();
		if($result -> rowCount() > 0){
			while($rs = $result -> fetch()){
				// if(time() - $_SESSION['ses_time_life']>$_timeSecond){

				if($rs['status'] == "0"){
				if($all_date  == $rs['date_booking']){  
			$firstTime = date("G:i:s");
				$secondTime = $rs['time_booking'];

				list($firstMinutes, $firstSeconds) = explode(':', $firstTime);
				list($secondMinutes, $secondSeconds) = explode(':', $secondTime);

				$firstSeconds += ($firstMinutes * 60);
				$secondSeconds += ($secondMinutes * 60);
			 $difference =   $firstSeconds- $secondSeconds ;
				if($difference >= 5){
				if(isset($_SESSION['status'])){
				if($_SESSION['status'] == "admin" || $_SESSION['status'] == "employee"){
					echo "    แจ้งเตือน : ";
					echo "การจองของคุณ ",$rs['user_name']," รหัสบัตรประชาชน ",$rs['user_pid']," จาก ",$rs['begin_travel']," ถึง ",$rs['end_travel']," วันที่ไป ",$rs['date_go']," เวลาออก ",$rs['dep_time'],"ได้ถูกยกเลิกแล้ว";
					$sqls = "DELETE FROM reservation WHERE res_id='".$rs['res_id']."'";
					$results = $con->prepare($sqls);
					$results -> execute();
				}
			}
					
				}
			}
			}
			}
		}
	}
	else{
		echo "Not found"; 		
	}

	
// การใช้งาน  
?>