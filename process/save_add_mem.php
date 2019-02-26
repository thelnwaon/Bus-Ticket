<?php 
	include 'config.php';
	if(isset($_POST['post'])){
		

		$data = $_POST['post'];
		$sql  =  "INSERT INTO employee (emp_name,emp_tel,emp_address,username,password,date_save_emp) VALUES (:name,:tel,:address,:user,:pass,NOW())";
		$result = $con->prepare($sql);
		$result ->execute(array('name'=>$data['name'],
								'tel'=>$data['tel'],
								'address'=>$data['address'],
								'user'=>$data['user'],
								'pass'=>$data['pass'],
								
					));
		if($result){
				alert('บันทึกข้อมูลสำเร็จ');
				redirec_to('?p=employee');
			
			
			

		}
		else{
					alert('เกิดข้อผิดพลาด');
					redirec_to('?p=employee');
			
			
		}
		}
		
	
?>