 <div class="panel panel-success ">
           <!--  <div class="panel-heading" role="tab" id="headingOne">
            <h5>จองสนามฟุตบอล</h5>
            </div> -->
            <div class="panel-padding">
            <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;แก้ไขข้อมูล</h4>
</div>
          <div class="panel-body ">
    
<?php
    include 'config.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM route WHERE rou_id=:id";
        $result = $con->prepare($sql);
        $result -> execute(array('id'=>$id));
        if($result){
            $rs = $result->fetch(PDO::FETCH_ASSOC);
        }


    }
 
 ?>
 <div class="col-md-2">
         </div>
         <div class="col-md-8">
 <table class="table table-bordered" >
 <form action="?p=edit_travel&id=<?= $id?>" method="post">
                          <tr>
                            <td width="150px">  <label for="exampleInputPassword1">ต้นทาง</label></td>
                            <td>
                            
      
    <select name="post[begin_province]" class="form-control">
    <?php $arr_province =array("กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา" ,"ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา" ,"นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี" ,"พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน" ,"ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา" ,"สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี" ,"สุรินทร์","หนองคาย","หนองบัวลำภู","อยุธยา","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี");
  
    for($i = 0 ; $i < sizeof($arr_province) ; $i ++){
    $element = "";
       if($rs['begin_travel'] == $arr_province[$i])$element = "selected";
       ?>
       <option value="<?= $arr_province[$i]?>" <?= $element?> ><?= $arr_province[$i]?></option>
    <?php
    }
 ?>
      
     
</select>

                            </td>
                        </tr>
                         <tr>
                            <td>  <label for="exampleInputPassword1">ปลายทาง</label></td>
                            <td>
                            
      
    <select name="post[end_province]" class="form-control">
      <?php $arr_province =array("กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา" ,"ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา" ,"นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี" ,"พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน" ,"ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา" ,"สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี" ,"สุรินทร์","หนองคาย","หนองบัวลำภู","อยุธยา","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี");
  
    for($i = 0 ; $i < sizeof($arr_province) ; $i ++){
    $element = "";
       if($rs['end_travel'] == $arr_province[$i])$element = "selected";
       ?>
       <option value="<?= $arr_province[$i]?>" <?= $element?> ><?= $arr_province[$i]?></option>
    <?php
    }
 ?>
      
</select>

                            </td>
                        </tr>
                          <tr>
                            <td> <label>เที่ยวเดิน</label></td>
                            <td>
                             
                           <select class="form-control" name="post[travel]">
                            
                            <option <?php if($rs['status_go'] == "0") echo "selected";?> value="0">ขาไป</option>
                            <option <?php if($rs['status_go'] == "1") echo "selected";?> value="1">ขากลับ</option>
     </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="exampleInputPassword1">เวลาออก</label></td>
                            <td>
                                 
                                  <input type="text" class="form-control" maxlength="5" value="<?= $rs['dep_time']?>" name="post[begin_time]" placeholder="ราคาตั๋ว" title="ราคาตั๋ว" required>
                                 
                                 
                               
                            </td>
                        </tr>
                        <tr>
                            <td><label for="exampleInputPassword1">เวลาถึง</label></td>
                            <td> <input type="text" class="form-control" maxlength="5" value="<?= $rs['arr_time']?>" name="post[end_time]" placeholder="ราคาตั๋ว" title="ราคาตั๋ว" required></td>

                        </tr>
                         <tr>
                        
                            <td> <label for="exampleInputPassword1">วันที่ออกเดินทาง</label></td>
                            <td> <p class="red">วันที่ ออกเดินทาง(เก่า) <?= $rs['date_go']?></p> 
                            <div class='input-group date date-picker' id='datepicker-th'>
                
                    <input  type='text' name="post[date_go]"  class="form-control" format="dd-mm-yy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                            
                            </td>
                           
                        </tr>
                        <tr>
                        
                            <td> <label for="exampleInputPassword1">วันที่ถึง</label></td>
                            <td> <p class="red">วันที่ ถึง(เก่า) <?= $rs['date_go']?></p> 
                            <div class='input-group date date-picker' id='datepicker-th'>
                
                    <input  type='text' name="post[date_gone]"  class="form-control" format="dd-mm-yy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                            
                            </td>
                           
                        </tr>
                         <tr>
                         <td>
                            <label for="exampleInputPassword1">ประเภทรถ</label>
                              </td>
                            <td>
                              
                              <select class="form-control" name="post[bustype]">
                                  <?php
                                    $sqlz = "SELECT * FROM bustype";
                                        $result2 = $con->prepare($sqlz);
                                        $result2 -> execute();
                                        if($result2 -> rowCount() > 0){
                                          while($rs2 = $result2-> fetch()){
                                          
                                  ?>
                                        <option <?php if($rs['id_bustype'] == $rs2['bustype_id']) echo "selected";?> value="<?= $rs2['bustype_id']?>"><?= $rs2['bustype_name']?></option>
                                    <?php }
                                  }
                                    else{
                                    ?>
                                    <option value="" >ไม่มีข้อมูล</option>
                                    <?php
                                    }
                                    ?>
                                   </select>

                            </td>

                        </tr>
                         <tr>
                            <td><label for="exampleInputPassword1">ราคาตั๋ว</label></td>
                            <td> 
    <input type="number" class="form-control" name="post[price]" value="<?= $rs['price']?>" placeholder="ราคาตั๋ว" title="ราคาตั๋ว" required></td>
                       </tr>
                         <tr>
                            <td></td>
                            <td>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <input type="submit" class="btn btn-default" value="บันทึกข้อมูล">
                                 &nbsp;
                                 
 <button type="button" class="btn btn-default" onclick="back()">ยกเลิก</button> 

                              
                                                 </td>
                        </tr>
                            </form>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>

  <?php 
  if(isset($_POST['post'])){
    $data = $_POST['post'];
    if($data['date_go'] != "" && $data['date_gone'] != ""){
    $sqls = "UPDATE route SET dep_time='".$data['begin_time']."',arr_time='".$data['end_time']."',price='".$data['price']."',status_go='".$data['travel']."',id_bustype='".$data['bustype']."',begin_travel='".$data['begin_province']."',end_travel='".$data['end_province']."',date_go='".$data['date_go']."',date_gone='".$data['date_gone']."' WHERE rou_id='".$id."'";
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
      }else if($data['date_gone'] != ""){
         $sqls = "UPDATE route SET dep_time='".$data['begin_time']."',arr_time='".$data['end_time']."',price='".$data['price']."',status_go='".$data['travel']."',id_bustype='".$data['bustype']."',begin_travel='".$data['begin_province']."',end_travel='".$data['end_province']."',date_gone='".$data['date_gone']."' WHERE rou_id='".$id."'";
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
      }
      else if($data['date_go'] != ""){
           $sqls = "UPDATE route SET dep_time='".$data['begin_time']."',arr_time='".$data['end_time']."',price='".$data['price']."',status_go='".$data['travel']."',id_bustype='".$data['bustype']."',begin_travel='".$data['begin_province']."',end_travel='".$data['end_province']."',date_go='".$data['date_go']."' WHERE rou_id='".$id."'";
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
      }
  }

  ?>
