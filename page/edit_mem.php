
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
        $sql = "SELECT * FROM employee WHERE emp_id=:id";
        $result = $con->prepare($sql);
        $result -> execute(array('id'=>$id));
        if($result){
            $rs = $result->fetch(PDO::FETCH_ASSOC);
        }


    }else{
        alert("เกิดข้อผิดพลาด");
        redirec_to("?p=employee");
    }
    if(isset($_GET['po'])){
        $po = $_GET['po'];
    }
 ?>
 <div class="col-md-2">
         </div>
         <div class="col-md-8">
 <table class="table table-bordered" >
 <form action="?p=savedit&po=<?= $po?>" method="post">
                         <tr>
                            <td><label for="sel1">ชื่อ-สกุล</label></td>
                            <td>
                              <input name="post[name]" type="text" class="form-control" value="<?= $rs['emp_name']?>" required placeholder="ชื่อ-สกุล">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sel1">Username</label></td>
                            <td>
                              <input name="post[user]" type="text" value="<?= $rs['username']?>" class="form-control" placeholder="ใส่ข้อความอย่างน้อย 8-20 ตัวอักษร" pattern=".{8,20}" title="username ควรมีความยาว 8-20 อักษร" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sel1">Password</label></td>
                            <td>
                              <input name="post[pass]" type="password" value="<?= $rs['password']?>" class="form-control" placeholder="ใส่ข้อความอย่างน้อย 8-20 ตัวอักษร" pattern=".{8,20}" title="password ควรมีความยาว 8-20 อักษร" required>
                            </td>
                        </tr>
                       
                       
                        <tr>
                            <td><label for="sel1">เบอร์โทร</label></td>
                            <td>
                              <input name="post[tel]" type="number" maxlength="10" value="<?= $rs['emp_tel']?>" class="form-control" pattern="{10}"  required placeholder="เบอร์โทร">
                            </td>
                        </tr>
                         <tr>
                            <td><label for="sel1">ที่อยู่</label></td>
                            <td>
                              <textarea class="form-control" rows="5" name="post[address]"><?= $rs['emp_address']?></textarea>
                                <input type="hidden" name="post[id]" value="<?= $rs['emp_id']?>">
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
                                 
 <button type="button" class="btn btn-default" onclick="back()">ยกเลิก</button> 

                              
                                                 </td>
                        </tr>
                        </form>
                    </table>
                    </div>
</div>
</div>
</div>