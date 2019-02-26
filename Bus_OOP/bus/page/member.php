   <div class="panel panel-success ">
           <!--  <div class="panel-heading" role="tab" id="headingOne">
            <h5>จองสนามฟุตบอล</h5>
            </div> -->
            <div class="panel-padding">
            <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;จัดการพนักงาน</h4>
</div>
          <div class="panel-body ">
          <div class="row">
          <div class="col-md-offset-0 col-md-3 col-md-offset-4 an-user">
          <a href="?p=addmem&po=mem2"><button type="button" class="btn btn-success">เพิ่มข้อมูลสมาชิก</button></a>
          </div>
          <br><br><br>
          </div>
          	<!-- <div class="col-md-offset-3 col-md-6 col-md-offset-3 an-user"> -->
          	<table class="table table-striped table-bordered">
		<tr>
			<th>ลำดับ</th>
			<th>ชื่อ</th>
			<th width="170px">เบอร์โทรศัพท์</th>
			<th width="140px">ที่อยู่</th>
			<th>E-Mail</th>
			<th id="hide" width="123px"><center>แก้ไข/ลบ</center></th>
		</tr>
		<?php 
		require "config.php";
		$i = 1;

			$sql =  "SELECT * FROM member WHERE status='member'";
		// 		if(isset($_POST['search'])){
		// 		$search = $_POST['search'];
		// 	$sql = "SELECT * FROM member WHERE name LIKE '%{$search}%' AND status='member'";

		// }

			$result =  $con->prepare($sql);
			$result ->execute();
			if($result){
				while($rs = $result -> fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						
					<td><?= $i?></td>
					<td><?= $rs['name']?></td>
					<td><?= $rs['tel']?></td>
					<td><p><?= $rs['address']?></p></td>
					<td><?= $rs['email']?></td>
					<td id="hide"><center><a href="?p=edit&po=mem2&id=<?= $rs['id']?>"><button type="button" class="btn btn-warning">แก้ไข</button></a>&nbsp;<a href="#" ><button onclick="del(<?= $rs['id']?>)" type="button" class="btn btn-danger">ลบ</button></a></td>
					</center>
					</tr>

					<?php
					$i++;
				}

			}
		?>
</table>
          	</div>
          </div>
          <!-- </div> -->
          </div>
