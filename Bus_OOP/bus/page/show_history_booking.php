
<div class="panel panel-success ">
         
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;ประวัติการเดินทางของผู้ใช้</h4>
</div>


          <div class="panel-body ">
          <div class="row">
          <div class="col-md-11">
          </div>
          <div class="col-md-1">
          <button class="btn btn-default" id="print">print</button><br><br>
          </div>
          </div>
          		  <div class="row">
          <div class="col-md-12">
          	 <table class="table table-bordered">
          		 <tr>
          <th><center>ลำดับ</center></th>
          <th width="100px"><center>ชื่อผู้จอง</center></th>
          <th width="100px"><center>วันที่จอง</center></th>
          		 	<th width="90px"><center>ต้นทาง</center></th>
          		 	
          		 	<th width="90px"><center>ปลายทาง</center></th>
          		 	<th width="100px"><center>เดินทาง</center></th>
          		 	<th width="200px"><center>วันเวลาที่ออกเดินทาง</center></th>
                  <th width="200px"><center>วันเวลาที่ถึง</center></th>
                  <th><center>ประเภทรถ</center></th>
                  <th><center>ราคา</center></th>
                  <th><center>ที่นั่ง</center></th>
                 
                  </tr>
          	<?php 
          	require 'config.php';
          		if(isset($_GET['id'])){
          	  $sql  ="SELECT route.*,bustype.bustype_name,reservation.*,user.* FROM reservation  INNER JOIN route ON  route.rou_id = reservation.id_rou INNER JOIN bustype ON route.id_bustype = bustype.bustype_id INNER JOIN user ON  reservation.id_user=user.user_id WHERE user.user_id='".$_GET['id']."' AND reservation.status='1'";
          	    $result = $con->prepare($sql);
                      $result -> execute();
                      $i = 1;
                      if($result -> rowCount() > 0){
                      while($rs2 = $result->fetch()){
                      	if($rs2['status_go'] == "0")
		         			$travel = "ขาไป";
		         			else 	$travel = "ขากลับ";


                      	?>

                      	<tr>
         					<td><center><?= $i?></center></td>
         					<td><center><?= $rs2['user_name']?></center></td>
         					<td><center><?= $rs2['date_booking']?></center></td>
         					<td><center><?= $rs2['begin_travel']?></center></td>
         					<td><center><?= $rs2['end_travel']?></center></td>
         					<td><center><?= $travel?></center></td>

         					<td><center><?= $rs2['date_go']," : ",$rs2['dep_time']?></center></td>
                  <td><center><?= $rs2['date_gone']," : ",$rs2['arr_time']?></center></td>
         					<td><center><?= $rs2['bustype_name']?></center></td>
         					<td><center><?= $rs2['price']?></center></td>
         					<td><center><?= $rs2['seat_no']?></center></td>
         					
         					</tr>
                      	<?php
                       $i ++;}
                   } else{

               	?>
               	<tr><td colspan="11"><center>ไม่พบข้อมูล</center></td></tr>
               	<?php
               }
               }
              
          	?>
          	</table>
          	</div>
          	</div>
          		<button onclick="back()" id="hide" class="btn btn-default" type="button">ย้อนกลับ</button>
          	</div>

          	</div>
          	</div>
