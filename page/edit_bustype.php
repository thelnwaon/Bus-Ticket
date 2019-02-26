 <div class="panel panel-success ">
           <!--  <div class="panel-heading" role="tab" id="headingOne">
            <h5>จองสนามฟุตบอล</h5>
            </div> -->
            <div class="panel-padding">
            <div class="page-header">

  <h4>&nbsp;&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลประเภทรถทัวร์</h4>
</div>
          <div class="panel-body ">
    
<?php
    include 'config.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM bustype WHERE bustype_id=:id";
        $result = $con->prepare($sql);
        $result -> execute(array('id'=>$id));
        if($result){
            $rs = $result->fetch(PDO::FETCH_ASSOC);
        }


    }
 
 ?>
 <div class="col-md-3">
         </div>
         <div class="col-md-6">
 <table class="table table-bordered" >
 <form action="?p=edit_bustype&id=<?= $id?>" method="post">  
 <tr><td><label>ประเภทรถ</label></td><td><input type="text" name="type" value="<?= $rs['bustype_name']?>" class="form-control"></td></tr>
  <tr><td><label>จำนวนรถ</label></td><td><input type="number" name="count" value="<?= $rs['carnumber']?>" class="form-control"></td></tr>
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
 require 'config.php';

 if(isset($_POST['type']) && isset($_POST['count'])){
  $sql  = "UPDATE bustype SET bustype_name='".$_POST['type']."',carnumber='".$_POST['count']."' WHERE bustype_id='".$id."'";
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
