
          <div class="panel panel-success ">
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;การจองตั๋วเที่ยวรถ</h4>
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
          <th width="170px"><center>วันที่จอง</center></th>
          		 	<th width="90px"><center>ต้นทาง</center></th>
          		 	
          		 	<th width="90px"><center>ปลายทาง</center></th>
          		 	<th width="100px"><center>เดินทาง</center></th>
          		 	<th width="200px"><center>วันเวลาที่ออกเดินทาง</center></th>
                  <th width="200px"><center>วันเวลาที่ถึง</center></th>
                  <th><center>ประเภทรถ</center></th>
                  <th><center>ราคา</center></th>
                  <th><center>สถานะ</center></th>
                  <th id="hide"><center>พิมพ์ตั๋ว/ยกเลิก</center></th>
                  </tr>
          	<?php 
          	require 'config.php';

          	  $sql  ="SELECT route.*,bustype.bustype_name,reservation.*,user.* FROM reservation  INNER JOIN route ON  route.rou_id = reservation.id_rou INNER JOIN bustype ON route.id_bustype = bustype.bustype_id INNER JOIN user ON  reservation.id_user=user.user_id ";
          	    $result = $con->prepare($sql);
                      $result -> execute();
                      $i = 1;
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
         					<td><center>
         						
         					<?php 
         					if($rs2['status'] == "0"){
         						?>
         						<button class="btn btn-default" onclick="reconfirm(<?= $rs2['res_id']?>)" type="button">ยังไม่ได้ชำระ</button>
         						<?php
         					}else{
         					?>
         					<span class="label label-success">ชำระแล้ว</span>
         					<?php }?>
         					</center></td>
         					<td id="hide">
         					<a href="?p=print_booking&id=<?= $rs2['res_id']?>"><button class="btn btn-danger">พิมพ์ตั๋ว</button></a>	
         					<button class="btn btn-warning" type="button" onclick="del_reconfirm(<?= $rs2['res_id']?>)" >ยกเลิก</button></td>
         					</tr>
                      	<?php
                       $i ++;}
          	?>
          	</table>
          	</div>
          	</div>
          </div>
          </div>
          </div>