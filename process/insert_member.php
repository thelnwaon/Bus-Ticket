
<?php 
	require 'config.php';
	include_once 'function.php';
	if(isset($_POST['in'])){
		$data = $_POST['in'];
		try{
		$sql = "INSERT INTO user (user_name,user_tel,user_username,user_pid,user_sex,user_email,date_save) VALUES (:name,:tel,:user,:pid,:sex,:email,NOW())";
		$result = $con->prepare($sql);
		$result ->execute(array(":name"=>$data['name'],
								":tel"=>$data['tel'],
								":user"=>$data['user'],
								":pid"=>$data['pid'],
								":sex"=>$data['sex'],
								":email"=>$data['email']

								));
		if($result){
			alert("บันทึกข้อมูลสำเร็จ");
			back();

		}
	}catch(Exception $e){
		alert("เกิดข้อผิดพลาด");
			back();
	}
}

?>