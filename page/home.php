
          <div class="panel panel-success ">
            <div class="panel-padding">
            <div class="page-header">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;ค้นหาเที่ยวรถ</h4>
</div>
          <div class="panel-body ">
          <div class="col-md-7">
          <form action="?p=booking_travel" method="post">
        			
               <div class="thumbnail ">
               <div class="margin-table">
               <table>
                  <tr>
                  <td width="70px"><label>เดินทาง</label></td>
                  <td width="40px"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เที่ยวเดียว  <input  id="check_oneway" value="0" name="in[check]" type="radio" ></td>
                      
                      <td width="120px"></td>
                      <td width="60px">ไป-กลับ&nbsp;</td>
                       <td>
                      <input id="check_twoway" value="1" name="in[check]" type="radio" >
                      </td>

                  </tr> 
                  <tr height="10px;"></tr>
                  <tr>

                      <td>ต้นทาง</td>
                      <td></td>
                      <td colspan="2"><select class="form-control" name="in[begin_travel]">
                      <option value="" selected>----กรุณาเลือก----</option>
                          <?php require 'config.php';
                          $sql = "SELECT DISTINCT begin_travel FROM route ORDER BY begin_travel ASC";
                          $result = $con->prepare($sql);
                          $result -> execute();
                        if($result-> rowCount() > 0){
                        $i = 1;
                          while($rs = $result-> fetch()){
                          ?>
                          <option value="<?= $rs['begin_travel']?>"><?= $rs['begin_travel']?></option>
                         <?php }}else{ ?>
                         <option>ไม่มีรอบเดินทาง</option>
                        <?php } ?>

                      </select></td>
                      
                    

                  </tr>
                  <tr height="10px;"></tr>
                  <tr>
                <td>ปลายทาง</td>
                      <td></td>
                  
                      
                       <td colspan="2">

                      <select class="form-control" name="in[end_travel]">
                       <option value="" selected="">----กรุณาเลือก----</option>
                        <?php require 'config.php';
                          $sql2 = "SELECT DISTINCT end_travel FROM route ORDER BY end_travel ASC";
                          $result2 = $con->prepare($sql2);
                          $result2 -> execute();
                        if($result2-> rowCount() > 0){
                        $i = 1;
                          while($rs2 = $result2-> fetch()){
                          ?>
                          <option value="<?= $rs2['end_travel']?>"><?= $rs2['end_travel']?></option>
                         <?php }}else{ ?>
                         <option>ไม่มีรอบเดินทาง</option>
                        <?php } ?>

                      </select>

                      </td>
                  </tr>
                  <tr height="10px;"></tr>
                  <tr>
                      <td>ออกเดินทาง</td>
                      <td></td>
                      <td colspan="3"> <div class='input-group date date-picker' id='datepicker-th'>
                
                    <input  type='text' name="in[dep_time]" class="form-control" format="dd-mm-yy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div></td>

                  </tr>
                   <tr height="10px;"></tr>
                   <tr id="twoway">
                      <td>เดินทางกลับ</td>
                      <td></td>
                      <td colspan="3"> <div class='input-group date date-picker' id='datepicker-th'>
                
                    <input  type='text' name="in[arr_time]" class="form-control" format="dd-mm-yy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div></td>

                  </tr>

                   <tr height="10px;"></tr>
                  <tr>
                      <td>จำนวนผู้เดินทาง</td>
                      <td></td>
                       <td><select class="form-control" name="in[cout_people]" id="sel1">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>

                       </select></td>
                  </tr>
                  <tr height="10px"></tr>
                   <tr height="10px"></tr>
                  <tr><td colspan="2"></td>
                  
                      <td colspan="3">
                      <p class="red">หมายเหตุ</p>
                           <div class="thumbnail">
                           <br>
                          <ul>
                             <li> สามารถจองตั๋วเที่ยวเวลาเร็วที่สุดได้     12ชม.    ก่อนถึงรถออก</li>
                              <li>ต้องชำระเงินภายใน 3ชม. หลังจากได้รหัสจองแล้ว</li>
                              <li>จองได้สูงสุด 5  ที่นั่งต่อรายการ(กรณีจองตั๋ว)</li>
                          </ul>
                          <center><button class="btn btn-primary btn-padding" type="submit">จองตั๋ว</button></center>
                          </div>
                      </td>
                      

                  </tr>


               </table>
               </div>
        		
            </div>
        		
            </form>
            </div>
            <div class="col-md-3">
            <img src="img/buss.jpg" width="390px">
            <img src="img/p2.jpg" width="390px">
            </div>
            </div>
            </div>
            </div>
