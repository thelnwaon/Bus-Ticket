<div class="panel panel-success ">
           
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลผู้โดยสาร</h4>
</div>


          <div class="panel-body ">
          		  <div class="row">
          		  <div class="col-md-1">
          		  <?php require 'config.php'; if(isset($_GET['c'])) $c= $_GET['c'];
                if(isset($_GET['id'])) $id= $_GET['id'];?>
          		  
          		  </div>
          
          <div class="col-md-6"><br>
            <div class="thumbnail ">
          		  	<form action="?p=in_user_booking&id=<?= $id?>&c=<?= $c?>" method="post">
          		  	<div class="wtf">
          		  	</div>
          		  	<table id="in_booking">

          		  		<?php 
          		  		if(isset($_GET['c'])){
          		  		$count = $_GET['c'];
          		  		$i = 1;
						}
						while($count-- > 0){
          		  		?>
          		  	
          		  	 <tr><td> <label>ลำดับที่ <?= $i;?></label></td></tr>
          		  		<tr>

          		  				<td><span for="exampleInputEmail1">ชื่อ-นามสกุล</span></td>
          		  				<td> <input type="text" class="form-control" name="in[name<?= $i?>]"   title="ชื่อ-นามสกุล" required placeholder="ชื่อ-นามสกุล"></td>
          		  				<td><span>Username</span></td>
          		  				<td> <input type="text" class="form-control" name="in[user<?= $i?>]" title="Username" required placeholder="Username"></td>
          		  				 
          		  		</tr>
          		  		<tr>
          		  				<td><span for="exampleInputPassword1">รหัสบัตรประชาชน</span></td>
          		  				<td> <input type="text" class="form-control"  name="in[pid<?= $i?>]" maxlength="13" pattern="\d{0,13}" required placeholder="รหัสบัตรประชาชน"></td>
          		  				<td><span for="exampleInputPassword1">เบอร์โทร</span></td>
          		  				<td> <input type="text" maxlength="10"  class="form-control" name="in[tel<?= $i?>]" required placeholder="เบอร์โทรศัพท์"></td>
          		  		</tr>

          		  		<tr>
          		  				<td>
          		  					<span><span> เพศ</span></td>
          		  				
          		  					<td>
                          <select  class="form-control"  name="in[sex<?= $i?>]">
                            <option value="0">ชาย</option>
                             <option value="1">หญิง</option>

                          </select>

          		  		</tr>
          		  		<tr height="20px"></input></tr>
          		  		
          		  		<?php $i++; 
                    }
                    ?>
          		  		<input name="in[seat]" type="hidden" id="seat">
          		  	</table>


                <center><h4>ข้อมูลการเดินทาง</h4></center>
                    <div class="thumbnail ">

                    <?php

                    if(isset($_GET['id'])){
                      $sql  ="SELECT route.*,bustype.bustype_name FROM route INNER JOIN bustype ON route.id_bustype = bustype.bustype_id WHERE rou_id ='".$_GET['id']."'";
                      $result = $con->prepare($sql);
                      $result -> execute();
                      if($result -> rowCount() == 1){
                        $fetch = $result->fetch();
                      }
                      $status_go ;
                      if($fetch['status_go'] == 0)
                         $status_go = "เที่ยวไป";
                      else $status_go = "เที่ยวกลับ";
                    }
                     ?>
                    <p style="font-size: 14px"><b><?= $status_go?></b></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เดินทางจาก  :&nbsp;&nbsp;<?= $fetch['begin_travel']?></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไป&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['end_travel']?></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัน - เวลาเดินทาง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['date_go']," : ",$fetch['dep_time'],"น."; ?></p>
                     <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ถึงเวลาโดยประมาณ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['date_gone']," : ",$fetch['arr_time'],"น.";?></p>
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประเภทรถ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['bustype_name']?></p>
                       <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $c,"  ท่าน"?></p>
                       <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ราคาตั๋วโดยสาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $fetch['price']," /ท่าน"?></p>
                   
                    <hr>
                    <center><h4 class="red">ราคารวม :  <?= ($fetch['price'] * $c) ," บาท"?></h4></center>
                    </div>


          		  	 <div class="modal-footer">
      
      <a href="?p=home">
        <button type="button" class="btn btn-default"  data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span>กลับหน้าหลัก</button>
        </a>
         <button type="submit" class="btn btn-primary">ดำเนินการต่อ<span class="glyphicon glyphicon-chevron-right"></span></button>
        
      </div>
          		  	</form>
                 
</div>

</div>
 <div class="col-md-4">
                 <center><h4>เลือกที่นั่ง</h4></center>
                <?php if(isset($_GET['c'])) $c= $_GET['c'];
                  $sql = "SELECT seat_no,status FROM reservation WHERE id_rou='".$id."'";
                  $result = $con->prepare($sql);
                  $result -> execute();
                  $all_booking = $result->fetchAll();
                  if($result->rowCount() > 0){
                   
                  }else{
                    // echo "wtf";
                  }
                  
                ?>
                
             
          <p>คุณสามารถเลือกได้ : <span id="count_seat"><?= $c?></span> ที่นั่ง</p>
           <table class="table">
              <tr>
                <td >ประตู<center>พนักงาน</center></td>
                
                <td class="border-left"><center>คนขับ</center></td>
              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>1&nbsp;<?php $tmp = 0;  foreach ($all_booking as $value ) {
                    
                     if($value['seat_no'] == "1" &&  $value['status'] == "1" )  $tmp += 1;
                      if($value['seat_no'] == "1" && $value['status'] == "0" ) $tmp += 100;
                      $tmp += 0;
                
                   }
                     if($tmp >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                   else if($tmp > 0 && $tmp < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="1" type="checkbox"></input>
                  <?php
                  }


                  ?> </center></td>
                <td class="border-left"><center>2&nbsp;
                  <?php $tmp2=0; foreach ($all_booking as $value ) {
                    
                     if($value['seat_no'] == "2"  && $value['status'] == "1" )  $tmp2 += 1;
                      if($value['seat_no'] == "2" && $value['status'] == "0" ) $tmp2+=100;
                      $tmp2 += 0;
                
                   }
                   if($tmp2 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp2 > 0 && $tmp2 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="2" type="checkbox"></input>
                  <?php
                  }


                  ?>

                </center></td>
              

              </tr>
              <tr height="20px" class="none-border-bottom"><td class="none-border-bottom"></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>3&nbsp;
                   <?php $tmp3=0; foreach ($all_booking as $value ) {
                    
                      if($value['seat_no'] == "3" &&  $value['status'] == "1" )  $tmp3 += 1;
                      if($value['seat_no'] == "3" && $value['status'] == "0" ) $tmp3+=100;
                      $tmp3 += 0;
                
                   }
                    if($tmp3 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                     else if($tmp3 > 0 && $tmp3 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="3" type="checkbox"></input>
                  <?php
                  }


                  ?>
                </center></td>
                <td class="border-left"><center>4&nbsp;

            <?php $tmp4=0; foreach ($all_booking as $value ) {
                    
                      if($value['seat_no'] == "4" && $value['status'] == "1" )  $tmp4 += 1;
                      if($value['seat_no'] == "4" && $value['status'] == "0" ) $tmp4+=100;
                      $tmp4 += 0;
                
                   }
                     if($tmp4 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp4 > 0 && $tmp4 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="4" type="checkbox"></input>
                  <?php
                  }


                  ?>

                </center></td>
              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>5&nbsp;


                 <?php $tmp5=0; foreach ($all_booking as $value ) {
                    
                       if($value['seat_no'] == "5" && $value['status'] == "1" )  $tmp5 += 1;
                      if($value['seat_no'] == "5" && $value['status'] == "0" ) $tmp5+=100;
                      $tmp5 += 0;
                
                   }
                    if($tmp5 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                   else if($tmp5 > 0 && $tmp5 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="5" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
                <td class="border-left"><center>6&nbsp;


                <?php $tmp6=0; foreach ($all_booking as $value ) {
                    
                      if($value['seat_no'] == "6" && $value['status'] == "1" )  $tmp6 += 1;
                      if($value['seat_no'] == "6" && $value['status'] == "0" ) $tmp6+=100;
                      $tmp6 += 0;
                
                   }
                    if($tmp6 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp6 > 0 && $tmp6 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="6" type="checkbox"></input>
                  <?php
                  }


                  ?>

                </center></td>
              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                  <td>ประตู</td><td></td>

              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>7&nbsp;


              <?php $tmp7=0; foreach ($all_booking as $value ) {
                    
                       if($value['seat_no'] == "7" && $value['status'] == "1" )  $tmp7 += 1;
                      if($value['seat_no'] == "7" && $value['status'] == "0" ) $tmp7+=100;
                      $tmp7 += 0;
                
                   }
                    if($tmp7 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp7 > 0 && $tmp7 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="7" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
                <td class="border-left"><center>8&nbsp;

              <?php $tmp8=0; foreach ($all_booking as $value ) {
                    
                      if($value['seat_no'] == "8" && $value['status'] == "1" )  $tmp8 += 1;
                      if($value['seat_no'] == "8" && $value['status'] == "0" ) $tmp8 +=100;
                      $tmp8 += 0;
                
                   }
                     if($tmp8 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                   else if($tmp8 > 0 && $tmp8 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="8" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>9&nbsp;


              <?php $tmp9=0; foreach ($all_booking as $value ) {
                    
                       if($value['seat_no'] == "9" && $value['status'] == "1" )  $tmp9 += 1;
                      if($value['seat_no'] == "9" && $value['status'] == "0" ) $tmp9 +=100;
                      $tmp9 += 0;
                
                   }
                     if($tmp9 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp9 > 0 && $tmp9 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="9" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
                <td class="border-left"><center>10&nbsp;


                <?php $tmp10=0; foreach ($all_booking as $value ) {
                    
                       if($value['seat_no'] == "10" && $value['status'] == "1" )  $tmp10 += 1;
                      if($value['seat_no'] == "10" && $value['status'] == "0" ) $tmp10+=100;
                      $tmp10 += 0;
                
                   }
                     if($tmp10 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                   else if($tmp10 > 0 && $tmp10 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="10" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>11&nbsp;


                 <?php $tmp11=0; foreach ($all_booking as $value ) {
                    
                       if($value['seat_no'] == "11" && $value['status'] == "1" )  $tmp11 += 1;
                      if($value['seat_no'] == "11" && $value['status'] == "0" ) $tmp11 +=100;
                      $tmp11 += 0;
                
                   }
                     if($tmp11 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                   else if($tmp11 > 0 && $tmp11 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="11" type="checkbox"></input>
                  <?php
                  }


                  ?>



                </center></td>
                <td class="border-left"><center>12&nbsp;

          <?php $tmp12=0; foreach ($all_booking as $value ) {
                    
                      if($value['seat_no'] == "12" && $value['status'] == "1" )  $tmp12 += 1;
                      if($value['seat_no'] == "12" && $value['status'] == "0" ) $tmp12 +=100;
                      $tmp12 += 0;
                
                   }
                    if($tmp12 >= 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp12 > 0 && $tmp12 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="12" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
              </tr>
              <tr height="20px"><td></td><td class="border-left"></td></tr>
              <tr>
                <td ><center>13&nbsp;


                <?php $tmp13=0; foreach ($all_booking as $value ) {
                    
                      if($value['seat_no'] == "13" && $value['status'] == "1" )  $tmp13 += 1;
                      if($value['seat_no'] == "13" && $value['status'] == "0" ) $tmp13 +=100;
                      $tmp13 += 0;
                
                   }
                   if($tmp13 > 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                   else if($tmp13 > 0 && $tmp13 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="13" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
                <td class="border-left"><center>14&nbsp;

                 <?php $tmp14=0; foreach ($all_booking as $value ) {
                    
                     if($value['seat_no'] == "14" && $value['status'] == "1" )  $tmp14 += 1;
                      if($value['seat_no'] == "14" && $value['status'] == "0" ) $tmp14 +=100;
                      $tmp14 += 0;
                
                   }
                   
                    if($tmp14 > 100){
                     echo "<span class='label label-warning'>รอการอนุมัติ</span>";
                   }
                    else if($tmp14 > 0 && $tmp14 < 100){
                     echo "<span class='label label-danger'>จองแล้ว</span>";
                   }
                   else{
                ?>



                  <input id="seat" name="14" type="checkbox"></input>
                  <?php
                  }


                  ?>


                </center></td>
              </tr>
              


           </table>
                  </div>
</div>
</div>
</div>
    
    
          	

          