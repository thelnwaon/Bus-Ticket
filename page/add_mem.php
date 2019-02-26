 <div class="panel panel-success ">
           <!--  <div class="panel-heading" role="tab" id="headingOne">
            <h5>จองสนามฟุตบอล</h5>
            </div> -->
            <div class="panel-padding">
            <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;เพิ่มข้อมูลพนักงาน</h4>
</div>
          <div class="panel-body ">
         <div class="col-md-2">
         </div>
         <div class="col-md-8">
<table class="table table-bordered" >
<?php if(isset($_GET['po'])) $po = $_GET['po'];?>
 <form action="?p=add" method="post">
                         <tr>
                            <td><label for="sel1">ชื่อ-สกุล</label></td>
                            <td>
                              <input name="post[name]" type="text" class="form-control" required placeholder="ชื่อ-สกุล">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sel1">Username</label></td>
                            <td>
                              <input name="post[user]" type="text" class="form-control" placeholder="ใส่ข้อความอย่างน้อย 8-20 ตัวอักษร" pattern=".{8,20}" title="username ควรมีความยาว 8-20 อักษร" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sel1">Password</label></td>
                            <td>
                              <input name="post[pass]" type="password" class="form-control" placeholder="ใส่ข้อความอย่างน้อย 8-20 ตัวอักษร" pattern=".{8,20}" title="password ควรมีความยาว 8-20 อักษร" required>
                            </td>
                        </tr>
                       
                       
                        <tr>
                            <td><label for="sel1">เบอร์โทร</label></td>
                            <td>
                              <input name="post[tel]" type="number" class="form-control" pattern="{10}" maxlength="10" required placeholder="เบอร์โทร">
                            </td>
                        </tr>
                        
                         <tr>
                            <td><label for="sel1">ที่อยู่</label></td>
                            <td>
                              <textarea class="form-control" rows="5" name="post[address]"></textarea>
                            </td>
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
                                <button type="button" onclick="back()" class="btn btn-default">ยกเลิก</button>                             </td>
                        </tr>
                        </form>
                    </table>
                    </div>
</div>
</div>
</div>