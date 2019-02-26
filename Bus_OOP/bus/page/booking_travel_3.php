<div class="panel panel-success ">
           
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลการเดินทาง</h4>
</div>


          <div class="panel-body ">
          	<div class="row">
          	<div class="col-md-10">
          	</div>
          	<div class="col-md-1">
          	<button class="btn btn-default" id="print">print</button>
          	</div>
          	</div>
          		  <div class="row">		 		
          		    <div class="col-md-offset-3 col-md-7 col-md-offset-2 an-user">

		 		  <?php if(isset($_GET['c'])) $c= $_GET['c'];?>
          		  	

          		  	<!-- <center><h4>ข้อมูลการเดินทาง</h4></center> -->
                    

                    <?php

                    if(isset($_GET['id'])){
                    	require 'config.php';

                    	$price = 0;

                        $sql  ="SELECT route.*,bustype.bustype_name,reservation.*,user.* FROM reservation  INNER JOIN route ON  route.rou_id = reservation.id_rou INNER JOIN bustype ON route.id_bustype = bustype.bustype_id INNER JOIN user ON  reservation.id_user=user.user_id ORDER BY reservation.res_id DESC";
                      $result = $con->prepare($sql);
                      $result -> execute();
                      $i = 0;
                      while($fetch = $result->fetch()){
                      	if($c == $i) break;
                      
                      $status_go ;
                      if($fetch['status_go'] == 0)
                         $status_go = "เที่ยวไป";
                      else $status_go = "เที่ยวกลับ";
                    
                     ?>
                     <div class="thumbnail ">
                     <div class="box-right"><button type="button" id="hide" onclick="cancel_booking(<?= $fetch['res_id']?>,<?= $_GET['c']?>)" class="btn btn-warning">ยกเลิก</button></div>
                    <p style="font-size: 14px"><b><?= $status_go?></b></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ  :&nbsp;&nbsp;<?= $fetch['user_name']?></p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสบัตรประชาชน  :&nbsp;&nbsp;<?= $fetch['user_pid']?></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เดินทางจาก  :&nbsp;&nbsp;<?= $fetch['begin_travel']?></p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไป&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['end_travel']?></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัน - เวลาเดินทาง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['date_go']," : ",$fetch['dep_time'],"น."; ?></p>
                     <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ถึงเวลาโดยประมาณ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['date_gone']," : ",$fetch['arr_time'],"น.";?></p>
                     <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่นั่ง  :&nbsp;&nbsp;<?= $fetch['seat_no']?></p>
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประเภทรถ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['bustype_name']?></p>
                       <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $c,"  ท่าน"?></p>
                      
                   
                    <hr>
                     <center><h4 class="red">ราคาตั๋วโดยสาร :  <?= ($fetch['price'] ) ," บาท"?></h4></center>
                      <center><p>รหัสชำระเงิน : <?= $fetch['id_pay_price'];?></p></center>
                    
                    </div>

                    <?php $i ++; $price +=$fetch['price']; }

                    }?>
                    <hr>
                    <center><h4 class="red">รวมราคาตั๋วโดยสาร :  <?= $price ," บาท"?></h4></center>

                    <hr>
          </div>
          </div>
            <a href="?p=home">
        <button type="button" class="btn btn-default" id="hide"  data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span>กลับหน้าหลัก</button>
        </a>
          </div>
          </div>
</div>