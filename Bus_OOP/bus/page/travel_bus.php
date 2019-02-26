   <?php require 'config.php';?>
   <div class="panel panel-success ">
           <!--  <div class="panel-heading" role="tab" id="headingOne">
            <h5>จองสนามฟุตบอล</h5>
            </div> -->
            <div class="panel-padding">
            <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;เที่ยวรถ</h4>
</div>
          <div class="panel-body ">
          <div class="row">
          <?php if($status == "admin" || $status == "employee"){?>
          <div class="col-md-3">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal4">เพิ่มสายการเดินรถ</button>
         	<br><br>
          </div>
          <?php }?>
          <div class="col-md-4">
          </div>
           
          <div class="col-md-5">
         	<table>
         	<form action="?p=travel_bus" method="post">
         		<tr> <td><input type="text" name="search" class="form-control" placeholder="Search"></td><td> <button class="btn btn-default" type="submit">ค้นหา</button></td></tr>
        	</form>
         	</table>
          </div>
          </div>
          <br>
          <div class="row">
          <div class="col-md-12">
          		 <table class="table table-bordered">
          		 <tr>
          		 	<th><center>ลำดับ</center></th>
          		 	<th width="100px"><center>ต้นทาง</center></th>
          		 	<th width="100px"><center>ปลายทาง</center></th>
          		 	<th width="100px"><center>เดินทาง</center></th>
          		 	<th width="150px"><center>เวลาออก</center></th>
          		 	<th width="150px"><center>เวลาถึง</center></th>
          		 	<th width="200px"><center>วันที่ออกเดินทาง</center></th>
                  <th width="200px"><center>วันที่ถึง</center></th>
          		 	<th><center>ประเภทรถ</center></th>
          		 	<th><center>ราคา</center></th>
                 <?php if($status == "admin" || $status == "employee"){?>
          		 	<th><center>แก้ไข</center></th>
                <?php }?>
          		 	<?php 

                 function DateDiff($strDate1,$strDate2)
   {
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );     }
    

          		 	$sqlz = "SELECT route.*,bustype.bustype_name FROM route INNER JOIN bustype ON route.id_bustype=bustype.bustype_id ORDER BY route.date_go ASC";
          		 	if(isset($_POST['search'])){
          		 		$search  = $_POST['search'];
          		 			$sqlz = "SELECT route.*,bustype.bustype_name FROM route INNER JOIN bustype ON route.id_bustype=bustype.bustype_id AND (route.price LIKE '%{$search}%' OR route.begin_travel LIKE '%{$search}%' OR route.end_travel LIKE '%{$search}%' OR bustype.bustype_name LIKE '%{$search}%' OR route.date_go LIKE '%{$search}%') ORDER BY route.date_go ASC";
          		 			
          		 	}
         	$result = $con->prepare($sqlz);
         	$result -> execute();
         	$j = 1;
         	if($result-> rowCount() > 0){
         	$i = 1;
         		while($rs2 = $result-> fetch()){
         			if($rs2['status_go'] == "0")
         			$travel = "ขาไป";
         			else 	$travel = "ขากลับ";

         $date = date("d/m");
        $year= date("Y")+543;
        $all_date  = $date.'/'.$year;
        $date_before = explode('/', $rs2['date_go']);
         $date_new = $date_before[0]."/".$date_before[1]."/".$date_before[2];

          $arr = explode("/", $all_date);
      $arr2 = explode("/", $date_new);
      $arr[2]  = intval($arr[2]-543);
      $arr2[2]  = intval($arr2[2]-543);
       $datetrue1  = $arr[2]."-".$arr[1]."-".$arr[0];
       $datetrue2  = $arr2[2]."-".$arr2[1]."-".$arr2[0];
        $datediff = floor(DateDiff($datetrue1, $datetrue2));

        if($datediff < 0) continue;

         		?>
         			<tr>
         					<td><center><?= $j?></center></td>
         					<td><center><?= $rs2['begin_travel']?></center></td>
         					<td><center><?= $rs2['end_travel']?></center></td>
         					<td><center><?= $travel?></center></td>
         					<td><center><?= $rs2['dep_time']?></center></td>
         					<td><center><?= $rs2['arr_time']?></center></td>
         					<td><center><?= $rs2['date_go']?></center></td>
                  <td><center><?= $rs2['date_gone']?></center></td>
         					<td><center><?= $rs2['bustype_name']?></center></td>
         					<td><center><?= $rs2['price']?></center></td>

                   <?php if($status == "admin" || $status == "employee"){?>
         					<td><center><a href="?p=edit_travel&id=<?= $rs2['rou_id']?>"><button type="button" class="btn btn-default">แก้ไข</button></a></center></td>
                  <?php }?>
                  </tr>
          		 	<?php $j++; }
          		 	}else{
         		?>
         		<tr><td colspan="10"><center>ไม่มีข้อมูล</center></td></tr>
         		<?php
         	}
         	?>
          		 </tr>
          		 </table>
          </div>
          </div>
          </div>

           <?php if($status == "admin" ){?>

               <div class="page-header"></div>
           <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;จัดการข้อมูลประเภทรถทัวร์</h4>
</div>
 <div class="panel-body ">
  <div class="row">
          <div class="col-md-3">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#mod2">เพิ่มข้อมูลประเภทรถทัวร์</button>
          <br><br>
          </div>
          </div>
          <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 an-user">
        <table class="table  table-bordered">
          <tr>
              <th width="20px"><center>ลำดับ</center></th>
              <th width="200px"><center>ประเภทรถ</center></th>
              <th width="140px"><center>จำนวนรถ(คัน)</center></th>
              <th width="120px"><center>แก้ไข</center></th>

          </tr>
          <?php 
          $sqlz = "SELECT * FROM bustype  ";
          $result = $con->prepare($sqlz);
          $result -> execute();
          if($result-> rowCount() > 0){
          $i = 1;
            while($rs = $result-> fetch()){
            ?>
              <tr>
                  <td><center><?= $i?></center></td>
                  <td><center><?= $rs['bustype_name']?></center></td>
                  <td><center><?= $rs['carnumber']?></center></td>
                  <td><center><a href="?p=edit_bustype&id=<?= $rs['bustype_id']?>"><button class="btn btn-default">แก้ไข</button></a></center></td>
              </tr>
            <?php
          $i++;
          }
          }else{
            ?>
            <tr><td colspan="3"><center>ไม่มีข้อมูล</center></td></tr>
            <?php
          }
          ?>
         </table>
    </div>
          </div>
          </div>

           <?php }?>
          

          </div>
          </div>

           <div class="modal fade bs-example-modal-sm" id="mod2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
     <form action="?p=travel_bus" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลประเภทรถทัวร์</h4>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputPassword1">ประเภทรถ</label>
    <input type="text" class="form-control" name="ins[type]"  placeholder="ประเภทรถ" required="">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">จำนวนรถ</label>
    <input type="number" class="form-control" name="ins[count]" placeholder="จำนวนรถ" title="จำนวนรถ" required>
  </div>
  </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">ตกลง</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        
      </div>
      </form>

    </div>

  </div>
</div>



 <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form action="?p=travel_bus" method="post">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มสายการเดินรถ</h4>
      </div>
      <div class="modal-body">
  <div class="form-group">
  <div class="row">
  <div class="col-xs-8 col-sm-6">
    <label for="exampleInputPassword1">ต้นทาง</label>
      
    <select name="post[begin_province]" class="form-control">
      <option value="" selected>--------- เลือกจังหวัด ---------</option>
      <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
      <option value="กระบี่">กระบี่ </option>
      <option value="กาญจนบุรี">กาญจนบุรี </option>
      <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
      <option value="กำแพงเพชร">กำแพงเพชร </option>
      <option value="ขอนแก่น">ขอนแก่น</option>
      <option value="จันทบุรี">จันทบุรี</option>
      <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
      <option value="ชัยนาท">ชัยนาท </option>
      <option value="ชัยภูมิ">ชัยภูมิ </option>
      <option value="ชุมพร">ชุมพร </option>
      <option value="ชลบุรี">ชลบุรี </option>
      <option value="เชียงใหม่">เชียงใหม่ </option>
      <option value="เชียงราย">เชียงราย </option>
      <option value="ตรัง">ตรัง </option>
      <option value="ตราด">ตราด </option>
      <option value="ตาก">ตาก </option>
      <option value="นครนายก">นครนายก </option>
      <option value="นครปฐม">นครปฐม </option>
      <option value="นครพนม">นครพนม </option>
      <option value="นครราชสีมา">นครราชสีมา </option>
      <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
      <option value="นครสวรรค์">นครสวรรค์ </option>
      <option value="นราธิวาส">นราธิวาส </option>
      <option value="น่าน">น่าน </option>
      <option value="นนทบุรี">นนทบุรี </option>
      <option value="บึงกาฬ">บึงกาฬ</option>
      <option value="บุรีรัมย์">บุรีรัมย์</option>
      <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
      <option value="ปทุมธานี">ปทุมธานี </option>
      <option value="ปราจีนบุรี">ปราจีนบุรี </option>
      <option value="ปัตตานี">ปัตตานี </option>
      <option value="พะเยา">พะเยา </option>
      <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
      <option value="พังงา">พังงา </option>
      <option value="พิจิตร">พิจิตร </option>
      <option value="พิษณุโลก">พิษณุโลก </option>
      <option value="เพชรบุรี">เพชรบุรี </option>
      <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
      <option value="แพร่">แพร่ </option>
      <option value="พัทลุง">พัทลุง </option>
      <option value="ภูเก็ต">ภูเก็ต </option>
      <option value="มหาสารคาม">มหาสารคาม </option>
      <option value="มุกดาหาร">มุกดาหาร </option>
      <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
      <option value="ยโสธร">ยโสธร </option>
      <option value="ยะลา">ยะลา </option>
      <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
      <option value="ระนอง">ระนอง </option>
      <option value="ระยอง">ระยอง </option>
      <option value="ราชบุรี">ราชบุรี</option>
      <option value="ลพบุรี">ลพบุรี </option>
      <option value="ลำปาง">ลำปาง </option>
      <option value="ลำพูน">ลำพูน </option>
      <option value="เลย">เลย </option>
      <option value="ศรีสะเกษ">ศรีสะเกษ</option>
      <option value="สกลนคร">สกลนคร</option>
      <option value="สงขลา">สงขลา </option>
      <option value="สมุทรสาคร">สมุทรสาคร </option>
      <option value="สมุทรปราการ">สมุทรปราการ </option>
      <option value="สมุทรสงคราม">สมุทรสงคราม </option>
      <option value="สระแก้ว">สระแก้ว </option>
      <option value="สระบุรี">สระบุรี </option>
      <option value="สิงห์บุรี">สิงห์บุรี </option>
      <option value="สุโขทัย">สุโขทัย </option>
      <option value="สุพรรณบุรี">สุพรรณบุรี </option>
      <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
      <option value="สุรินทร์">สุรินทร์ </option>
      <option value="สตูล">สตูล </option>
      <option value="หนองคาย">หนองคาย </option>
      <option value="หนองบัวลำภู">หนองบัวลำภู </option>
      <option value="อำนาจเจริญ">อำนาจเจริญ </option>
      <option value="อุดรธานี">อุดรธานี </option>
      <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
      <option value="อุทัยธานี">อุทัยธานี </option>
      <option value="อุบลราชธานี">อุบลราชธานี</option>
      <option value="อ่างทอง">อ่างทอง </option>
      <option value="อื่นๆ">อื่นๆ</option>
</select>

</div>
	
	<div class="col-xs-4  col-sm-6">
	 <label for="exampleInputPassword1">ปลายทาง</label>
    <select name="post[end_province]" class="form-control">
      <option value="" selected>--------- เลือกจังหวัด ---------</option>
      <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
      <option value="กระบี่">กระบี่ </option>
      <option value="กาญจนบุรี">กาญจนบุรี </option>
      <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
      <option value="กำแพงเพชร">กำแพงเพชร </option>
      <option value="ขอนแก่น">ขอนแก่น</option>
      <option value="จันทบุรี">จันทบุรี</option>
      <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
      <option value="ชัยนาท">ชัยนาท </option>
      <option value="ชัยภูมิ">ชัยภูมิ </option>
      <option value="ชุมพร">ชุมพร </option>
      <option value="ชลบุรี">ชลบุรี </option>
      <option value="เชียงใหม่">เชียงใหม่ </option>
      <option value="เชียงราย">เชียงราย </option>
      <option value="ตรัง">ตรัง </option>
      <option value="ตราด">ตราด </option>
      <option value="ตาก">ตาก </option>
      <option value="นครนายก">นครนายก </option>
      <option value="นครปฐม">นครปฐม </option>
      <option value="นครพนม">นครพนม </option>
      <option value="นครราชสีมา">นครราชสีมา </option>
      <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
      <option value="นครสวรรค์">นครสวรรค์ </option>
      <option value="นราธิวาส">นราธิวาส </option>
      <option value="น่าน">น่าน </option>
      <option value="นนทบุรี">นนทบุรี </option>
      <option value="บึงกาฬ">บึงกาฬ</option>
      <option value="บุรีรัมย์">บุรีรัมย์</option>
      <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
      <option value="ปทุมธานี">ปทุมธานี </option>
      <option value="ปราจีนบุรี">ปราจีนบุรี </option>
      <option value="ปัตตานี">ปัตตานี </option>
      <option value="พะเยา">พะเยา </option>
      <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
      <option value="พังงา">พังงา </option>
      <option value="พิจิตร">พิจิตร </option>
      <option value="พิษณุโลก">พิษณุโลก </option>
      <option value="เพชรบุรี">เพชรบุรี </option>
      <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
      <option value="แพร่">แพร่ </option>
      <option value="พัทลุง">พัทลุง </option>
      <option value="ภูเก็ต">ภูเก็ต </option>
      <option value="มหาสารคาม">มหาสารคาม </option>
      <option value="มุกดาหาร">มุกดาหาร </option>
      <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
      <option value="ยโสธร">ยโสธร </option>
      <option value="ยะลา">ยะลา </option>
      <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
      <option value="ระนอง">ระนอง </option>
      <option value="ระยอง">ระยอง </option>
      <option value="ราชบุรี">ราชบุรี</option>
      <option value="ลพบุรี">ลพบุรี </option>
      <option value="ลำปาง">ลำปาง </option>
      <option value="ลำพูน">ลำพูน </option>
      <option value="เลย">เลย </option>
      <option value="ศรีสะเกษ">ศรีสะเกษ</option>
      <option value="สกลนคร">สกลนคร</option>
      <option value="สงขลา">สงขลา </option>
      <option value="สมุทรสาคร">สมุทรสาคร </option>
      <option value="สมุทรปราการ">สมุทรปราการ </option>
      <option value="สมุทรสงคราม">สมุทรสงคราม </option>
      <option value="สระแก้ว">สระแก้ว </option>
      <option value="สระบุรี">สระบุรี </option>
      <option value="สิงห์บุรี">สิงห์บุรี </option>
      <option value="สุโขทัย">สุโขทัย </option>
      <option value="สุพรรณบุรี">สุพรรณบุรี </option>
      <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
      <option value="สุรินทร์">สุรินทร์ </option>
      <option value="สตูล">สตูล </option>
      <option value="หนองคาย">หนองคาย </option>
      <option value="หนองบัวลำภู">หนองบัวลำภู </option>
      <option value="อำนาจเจริญ">อำนาจเจริญ </option>
      <option value="อุดรธานี">อุดรธานี </option>
      <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
      <option value="อุทัยธานี">อุทัยธานี </option>
      <option value="อุบลราชธานี">อุบลราชธานี</option>
      <option value="อ่างทอง">อ่างทอง </option>
</select>
</div>
</div></div>

	<div class="row">
		 <div class="col-xs-8 col-sm-6">
		  <label>วันที่ออกเดินทาง</label>
     <div class='input-group date date-picker' id='datepicker-th'>
                
                    <input  type='text' name="post[date_go]" class="form-control" format="dd-mm-yy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
		 </div>
		 <div class="col-xs-4  col-sm-6">
		  <label>วันที่ถึง</label>
		 <div class='input-group date date-picker' id='datepicker-th'>
                
                    <input  type='text' name="post[date_gone]" class="form-control" format="dd-mm-yy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                </div>

	</div><br>

	<div class="row">
  
  <div class="col-xs-8 col-sm-6">
   <div class="form-group">
    <label for="exampleInputPassword1">เวลาออก</label>
    <input type="text" class="form-control" maxlength="8" name="post[begin_time]" placeholder="กรุณาใส่ให้อยู่ในรูปบบ 00:00:00" title="ราคาตั๋ว" required>
  </div>
  </div>
 <div class="col-xs-4  col-sm-6">
  <div class="form-group">
    <label for="exampleInputPassword1">เวลาถึง</label>
    <input type="text" class="form-control" maxlength="8" name="post[end_time]" placeholder="กรุณาใส่ให้อยู่ในรูปบบ 00:00:00" title="ราคาตั๋ว" required>
  </div>
  </div>
</div>

  </div>



	<div class="row">
	<div class="col-md-3"></div>
 <div class="col-md-6">
   <div class="form-group">
    <label for="exampleInputPassword1">ประเภทรถ</label>
     <select class="form-control" name="post[bustype]">
    <?php
    	$sqlz = "SELECT * FROM bustype";
         	$result = $con->prepare($sqlz);
         	$result -> execute();
         	if($result-> rowCount() > 0){
         	$i = 1;
         		while($rs = $result-> fetch()){
         		
    ?>
   				<option value="<?= $rs['bustype_id']?>"><?= $rs['bustype_name']?></option>
		 	<?php  }
		 }
		 	else{
			?>
			<option value"" >ไม่มีข้อมูล</option>
			<?php
		 	}
		 	?>
		 </select>
  </div>
</div>

</div>
<div class="row">
<div class="col-md-3"></div>
 <div class="col-md-6">
   <div class="form-group">
    <label for="exampleInputPassword1">ราคาตั๋ว</label>
    <input type="number" class="form-control" name="post[price]" placeholder="ราคาตั๋ว" title="ราคาตั๋ว" required>
  </div>
</div>

  </div>

  <div class="row">
<div class="col-md-3"></div>
 <div class="col-md-6">
   <div class="form-group">
    <label>เที่ยวเดิน</label>
     <select class="form-control" name="post[travel]">
      
      <option value="0">ขาไป</option>
      <option value="1">ขากลับ</option>
     </select>
   </div>
   </div>
   </div>

 

  
  

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        
      </div>
      </form>

    </div>

  </div>
</div>
<?php 
	if(isset($_POST['post'])){
		if(!empty($_POST['post'])){
			$data = $_POST['post'];
			// print_r($data);
			// $sql  = "SELECT * FROM route WHERE begin_travel='".$data['begin_province']."' AND 
			// end_travel='".$data['end_province']."' ";

			//AND dep_time = '".$data['begin_time']."' AND arr_time = '".$data['end_time']."' AND status_go = '".$data['travel']."' AND date_go='".$data['date_go']."'

			// $result =  $con->prepare($sql);
			// $result -> execute();
			// if($result -> rowCount() == 0){
				$sqls = "INSERT INTO route (dep_time,arr_time,price,status_go,id_bustype,begin_travel,end_travel,date_go,date_gone) 
				VALUES ('".$data['begin_time']."','".$data['end_time']."','".$data['price']."','".$data['travel']."','".$data['bustype']."','".$data['begin_province']."','".$data['end_province']."','".$data['date_go']."','".$data['date_gone']."')";
				$result =  $con->prepare($sqls);
			$result -> execute();
				if($result){
					alert("บันทึกข้อมูลสำเร็จ");
					redirec_to("?p=travel_bus");
				}
				else{
					alert("เกิดข้อผิดพลาด");
					redirec_to("?p=travel_bus");
				}
			// }
			// else{
			// 	alert("ไม่สามารถเพิ่มเที่ยวรถนี้ได้");
			// }
		}
	}
	if(isset($_POST['ins'])){
		$datas = $_POST['ins'];
		 $sql  = "INSERT INTO bustype  (bustype_name,carnumber) VALUES ('".$datas['type']."','".$datas['count']."')";
  $result = $con->prepare($sql);
  $result -> execute();
  if($result){
          alert("บันทึกข้อมูลสำเร็จ");
          redirec_to("?p=travel_bus");
        }
        else{
          alert("เกิดข้อผิดพลาด");
          redirec_to("?p=travel_bus");
        }
	}
	
?>
