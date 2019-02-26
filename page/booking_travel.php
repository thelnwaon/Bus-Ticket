<div class="panel panel-success ">
         
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;เลือกเที่ยวรถ ขาไป</h4>
</div>


          <div class="panel-body ">
          		  <div class="row">
          <div class="col-md-12">


          		 <table class="table table-bordered">
          	<th><center>ลำดับ</center></th>
          		 	<th width="100px"><center>ต้นทาง</center></th>
          		 	<th width="100px"><center>ปลายทาง</center></th>
          		 	<th><center>เดินทาง</center></th>
          		 	<th width="150px"><center>เวลาออก</center></th>
          		 	<th width="150px"><center>เวลาถึง</center></th>
          		 	<th width="200px"><center>วันที่ออกเดินทาง</center></th>
          		 	<th><center>ประเภทรถ</center></th>
          		 	<th><center>ราคา</center></th>
          		 	<th><center>จองที่ยวรถ</center></th>
          	<?php 
          	require 'config.php';
            function DateDiff($strDate1,$strDate2)
   {
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );     }
    
          	if(isset($_POST['in'])){
          		$data = $_POST['in'];
          		// print_r($data);
          		if(!empty($data['begin_travel']) && !empty($data['end_travel']) && !empty($data['dep_time']) && !empty($data['cout_people'])){
          	
          		$sql = "SELECT route.*,bustype.bustype_name FROM route INNER JOIN bustype ON route.id_bustype=bustype.bustype_id WHERE route.begin_travel='".$data['begin_travel']."' AND route.end_travel='".$data['end_travel']."' AND route.status_go='0' AND route.date_go='".$data['dep_time']."'  ORDER BY route.dep_time ASC";	


          				$result = $con->prepare($sql);
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
          $firstTime = date("G:i:s");


      $arr = explode("/", $all_date);
      $arr2 = explode("/", $date_new);
      $arr[2]  = intval($arr[2]-543);
      $arr2[2]  = intval($arr2[2]-543);
       $datetrue1  = $arr[2]."-".$arr[1]."-".$arr[0];
       $datetrue2  = $arr2[2]."-".$arr2[1]."-".$arr2[0];
        $datediff = floor(DateDiff($datetrue1, $datetrue2));
          $tmp = 0;
         if($datediff <= 0){
          $secondTime = $rs2['dep_time'];

        list($firstMinutes, $firstSeconds) = explode(':', $firstTime);
        list($secondMinutes, $secondSeconds) = explode(':', $secondTime);

        $firstSeconds += ($firstMinutes * 60);
        $secondSeconds += ($secondMinutes * 60);
        $difference =    $secondSeconds-$firstSeconds ;
       $tmp = 0;
        if($difference <= 720){
$tmp=1;

        }

         }
         else{
          // continue;
         }
                

        

         		?>
         			<tr>
         					<td><center><?= $j?></center></td>
         					<td><center><?= $rs2['begin_travel']?></center></td>
         					<td><center><?= $rs2['end_travel']?></center></td>
         					<td><center><?= $travel?></center></td>
         					<td><center><?= $rs2['dep_time']?></center></td>
         					<td><center><?= $rs2['arr_time']?></center></td>
         					<td><center><?= $rs2['date_go']?></center></td>
         					<td><center><?= $rs2['bustype_name']?></center></td>
         					<td><center><?= $rs2['price']?></center></td>
         					<td><center><button type="button" onclick="confirm_booking(<?= $rs2['rou_id']?>,<?= $data['cout_people']?>)"
            class="btn btn-default" <?php if($tmp == 1) echo "disabled='disabled'";?>>เลือก</button></center></td>
         					</tr>
          		 	<?php $j++; }
          		 	}else{
         		?>
         		<tr><td colspan="10"><center>ไม่มีข้อมูล</center></td></tr>
         		<?php
         	}
         	?>

<?php
          			}
          			else{
          				alert("ข้อมูลไม่ครบถ้วน");
          				back();
          			}
          	}
          	?>
          		</table>
          			</div>
          </div>
          </div>
          <?php 
          if(isset($_POST['in'])){
            $data =  $_POST['in'];
            if($data['arr_time'] != ""){

                ?>

                        <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;เลือกเที่ยวรถ ขากลับ</h4>
</div>


          <div class="panel-body ">
                <div class="row">
          <div class="col-md-12">


               <table class="table table-bordered">
            <th><center>ลำดับ</center></th>
                <th width="100px"><center>ต้นทาง</center></th>
                <th width="100px"><center>ปลายทาง</center></th>
                <th><center>เดินทาง</center></th>
                <th width="150px"><center>เวลาออก</center></th>
                <th width="150px"><center>เวลาถึง</center></th>
                <th width="200px"><center>วันที่ออกเดินทาง</center></th>
                <th><center>ประเภทรถ</center></th>
                <th><center>ราคา</center></th>
                <th><center>จองที่ยวรถ</center></th>
            <?php 
            require 'config.php';
            if(isset($_POST['in'])){
              $data = $_POST['in'];
              // print_r($data);
              if(!empty($data['begin_travel']) && !empty($data['end_travel']) && !empty($data['dep_time']) && !empty($data['cout_people'])){
            
              $sql = "SELECT route.*,bustype.bustype_name FROM route INNER JOIN bustype ON route.id_bustype=bustype.bustype_id WHERE route.begin_travel='".$data['begin_travel']."' AND route.end_travel='".$data['end_travel']."' AND route.status_go='1' AND route.date_go='".$data['dep_time']."'  ORDER BY route.dep_time ASC";  


                  $result = $con->prepare($sql);
          $result -> execute();
          $j = 1;
          if($result-> rowCount() > 0){
          $i = 1;
            while($rs2 = $result-> fetch()){
              if($rs2['status_go'] == "0")
              $travel = "ขาไป";
              else  $travel = "ขากลับ";

               
          $date = date("d/m");
        $year= date("Y")+543;
        $all_date  = $date.'/'.$year;
        $date_before = explode('/', $rs2['date_go']);
         $date_new = $date_before[0]."/".$date_before[1]."/".$date_before[2];
          $firstTime = date("G:i:s");


      $arr = explode("/", $all_date);
      $arr2 = explode("/", $date_new);
      $arr[2]  = intval($arr[2]-543);
      $arr2[2]  = intval($arr2[2]-543);
       $datetrue1  = $arr[2]."-".$arr[1]."-".$arr[0];
       $datetrue2  = $arr2[2]."-".$arr2[1]."-".$arr2[0];
        $datediff = floor(DateDiff($datetrue1, $datetrue2));

         if($datediff >= 0){
          $secondTime = $rs2['dep_time'];

        list($firstMinutes, $firstSeconds) = explode(':', $firstTime);
        list($secondMinutes, $secondSeconds) = explode(':', $secondTime);

        $firstSeconds += ($firstMinutes * 60);
        $secondSeconds += ($secondMinutes * 60);
        $difference =    $secondSeconds-$firstSeconds ;
       $tmp = 0;
        if($difference <= 720){
$tmp=1;

        }

         }
                  

            ?>
              <tr>
                  <td><center><?= $j?></center></td>
                  <td><center><?= $rs2['begin_travel']?></center></td>
                  <td><center><?= $rs2['end_travel']?></center></td>
                  <td><center><?= $travel?></center></td>
                  <td><center><?= $rs2['dep_time']?></center></td>
                  <td><center><?= $rs2['arr_time']?></center></td>
                  <td><center><?= $rs2['date_go']?></center></td>
                  <td><center><?= $rs2['bustype_name']?></center></td>
                  <td><center><?= $rs2['price']?></center></td>
                  <td><center><button type="button" onclick="confirm_booking(<?= $rs2['rou_id']?>,<?= $data['cout_people']?>)" <?php if($tmp == 1) echo "disabled='disabled'";?> class="btn btn-default">เลือก</button></center></td>
                  </tr>
                <?php $j++; }
                }else{
            ?>
            <tr><td colspan="10"><center>ไม่มีข้อมูล</center></td></tr>
            <?php
          }
          ?>

<?php
                }
                
            }

            ?>

              </table>
                </div>
          </div>
          </div>


<?php

            }
          }
          ?>
          <a href="?p=home"><button type="button" class="btn btn-default">ย้อนกลับ</button></a>
          </div>
          </div>
