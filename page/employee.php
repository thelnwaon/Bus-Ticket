   <div class="panel panel-success ">
           <!--  <div class="panel-heading" role="tab" id="headingOne">
            <h5>จองสนามฟุตบอล</h5>
            </div> -->
            <div class="panel-padding">
            <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;จัดการสมาชิก</h4>
</div>
          <div class="panel-body ">
          <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="col-md-1">
          <a href="?p=addmem"><button type="button" class="btn btn-primary">เพิ่มข้อมูลพนักงาน</button></a>
          </div>
              <div class="col-md-5">
          </div>
          <div class="col-md-4">
         	<table>
         	<form action="?p=employee" method="post">
         		<tr> <td><input type="text" name="search" class="form-control" placeholder="Search"></td><td> <button class="btn btn-default" type="submit">ค้นหา</button></td></tr>
        	</form>
         	</table>
         <br>
          </div>
          </div><!-- 
          <div class="col-md-1">
          </div> -->
          <div class="row">
          	<div class="col-md-12">
          	<table class="table  table-bordered">
		<tr>
			<th width="50px"><center>ลำดับ</center></th>
			<th width="230px"><center>ชื่อ</center></th>
			<th><center>เบอรโทร</center></th>
			<th width="100px"><center>วันที่เพิ่มเข้างาน<center></th>
			<th><center>ที่อยู่</center></th>
			<th id="hide" width="123px"><center>แก้ไข/ลบ</center></th>
		</tr>
		<?php 
		require "config.php";
		$i = 1;

			$sql =  "SELECT * FROM employee";
			if(isset($_POST['search'])){
				$search = $_POST['search'];
				$sql =  "SELECT * FROM employee WHERE emp_name LIKE '%{$search}%'";
			}

			$result =  $con->prepare($sql);
			$result ->execute();
			if($result -> rowCount() > 0){
				while($rs = $result -> fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						
					<td><center><?= $i?></center></td>
					<td><center><?= $rs['emp_name']?></center></td>
					<td><center><?= $rs['emp_tel']?></center></td>
					<td><center><?= $rs['date_save_emp']?></center></td>
					<td><center><?= $rs['emp_address']?></center></td>
					<td id="hide"><center><a href="?p=edit&po=mem&id=<?= $rs['emp_id']?>"><button type="button" class="btn btn-default">แก้ไข</button></a>&nbsp;<a href="#" ><button onclick="del(<?= $rs['emp_id']?>)" type="button" class="btn btn-default">ลบ</button></a></center></td>
					
					</tr>

					<?php
					$i++;
				}

			}else{
			?>
			<tr><td colspan="6"><center>ไม่พบข้อมูล</center></td></tr>
			<?php

			}
		?>
</table>

          	</div>
          	</div>
          </div>
          <!-- </div> -->
          </div>
