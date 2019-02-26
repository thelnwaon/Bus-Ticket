<?php 
	if(isset($_GET['c']) && isset($_GET['id'])){
		require 'config.php';
		 $count = $_GET['c'];
		 if(isset($_POST['in'])){
		 	$id = $_GET['id'];
			$data = $_POST['in'];
			$arr = explode(",", $data['seat']);
			// print_r($arr);
			if($data['seat'] == ""){
				alert("กรุณาเลือกที่นั่ง");
				back();
			}
			else if((sizeof($arr) -1 ) < $count){
				alert("กรุณาเลือกที่นั่งให้ครบจำนวนท่าน");
				back();
			}
			else{
			
			
			
		 	try{
		for($i = 0; $i < $count ; $i++){

				
				
				
				// echo $i = 1;
		
				// echo $data['name'.($i+1)] , " " , $data['user'.($i+1)], " " ,$data['pid'.($i+1)], " ",$data['name'.($i+1)], " ",$data['tel'.($i+1)], " ",$data['sex'.($i+1)];

				$sql = "SELECT * FROM user WHERE user_pid='".$data['pid'.($i+1)]."'";
				$result1 = $con->prepare($sql);
				$result1 -> execute();
				$fet = $result1->fetch();
				$date = date("d/m");
				$year= date("Y")+543;
				$all_date  = $date.'/'.$year;
				if($result1 -> rowCount() == 0 ){
					$sql = "INSERT INTO user (user_name,user_tel,user_username,user_pid,user_sex,date_save) VALUES (:name,:tel,:user,:pid,:sex,:da)";
						$result = $con->prepare($sql);
						$result ->execute(array(":name"=>$data['name'.($i+1)],
												":tel"=>$data['tel'.($i+1)],
												":user"=>$data['user'.($i+1)],
												":pid"=>$data['pid'.($i+1)],
												":sex"=>$data['sex'.($i+1)],
												':da'=>$all_date

												));
						$lastinsert =  $con->lastInsertId();
						$sqls = "INSERT INTO reservation (date_booking,seat_no,id_rou,id_user,status,id_pay_price,time_booking) VALUES ('".$all_date."','".$arr[$i+1]."','".$id."','".$lastinsert."','0','".uniqid()."',NOW())";
						$results = $con->prepare($sqls);
						$results ->execute();
						
				}else{
					$lastinsert =  $con->lastInsertId();
						$sqls = "INSERT INTO reservation (date_booking,seat_no,id_rou,id_user,status,id_pay_price,time_booking) VALUES ('".$all_date."','".$arr[$i+1]."','".$id."','".$fet['user_id']."','0','".uniqid()."',NOW())";
						$results = $con->prepare($sqls);
						$results ->execute();

				}

				
			}
			
			alert("บันทึกข้อมูลสำเร็จ");
			redirec_to("?p=booking_travel3&id=".$id."&c=".$count);

			
		}
		catch(Exception $e){
		alert("เกิดข้อผิดพลาด");
			// back();
			}
			
		}
	}
}
?>