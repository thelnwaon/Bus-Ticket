<div class="panel panel-success ">
         
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;ประวัติการเดินทางของผู้ใช้</h4>
</div>


          <div class="panel-body ">
          
          		  <div class="row">
          <div class="col-md-12">
           <table class="table table">
          		<tr>
          				<th><center>ลำดับ</center></th>
          				<th><center>ชื่อ</center></th>
          				<th><center>รหัสประชาชน</center></th>
          				<th><center>เพศ</center></th>
          				<th><center>เบอร์โทร</center></th>
          				<th><center>วันที่สมัคร</center></th>

          		</tr>

          		<?php
          		require 'config.php'; 
          		$sql = "SELECT * FROM user";
          		$result =$con->prepare($sql);
				$result -> execute();
				if($result -> rowCount() > 0){
					$i = 1;
						while($rs = $result->fetch()){
							$sex  = "ชาย";
							if($rs['user_sex'] == "1") $sex = "หญิง";
          		 ?>
						<tr>
							<td><center><?= $i?></center></td>
							<td><center><a href="?p=show_history_booking&id=<?= $rs['user_id']?>"><?= $rs['user_name']?></a></center></td>
							<td><center><?= $rs['user_pid']?></center></td>
							<td><center><?= $sex?></center></td>
							<td><center><?= $rs['user_tel']?></center></td>
							<td><center><?= $rs['date_save']?></center></td>
						</tr>
          		 <?php 
          			$i++; }
				}else{
					?>
					<tr><td colspan="6"><center>ไม่มีผู้ใช้</center></td></tr>
					<?php
				}
					?>
				
          		
          </table>

          </div>
          </div>
          </div>
          </div>
          </div>

          