<?php


    if(isset($_POST['post']) && isset($_GET['po'])){
        
        include 'config.php';
        $po = $_GET['po'];
        $p = $_POST['post'];
        
        $pass = $p['pass'];
        
        
        
        if($pass != '' && $pass != ' '){ // เปลี่ยนพาสเวิร์ดด้วย
           $sql  = "UPDATE employee SET username='".$p['user']."',
                                     password='".$pass."',
                                     emp_name='".$p['name']."',
                                     emp_tel='".$p['tel']."',
                                     emp_address='".$p['address']."'
                                     WHERE emp_id=".$p['id'];
            $result = $con->prepare($sql);
            if($result->execute()){

            
            			echo '<script>alert("ทำการแก้ไขข้อมูลสำเร็จ"); window.location.back();</script>'; 
            	
               
            }
             else{
            	echo '<script>alert("เกิดข้อผิดพลาด"); window.location.back();</script>';  
            }
            
        }else if($pass == ''){ // ไม่เปลี่ยนพาส
            $sql  = "UPDATE employee SET username='".$p['user']."',
                                     emp_name='".$p['name']."',
                                     emp_tel='".$p['tel']."',
                                      emp_address='".$p['address']."',
                                     WHERE emp_id=".$p['id'];
            $result = $con->prepare($sql);
            if($result->execute()){
            		echo '<script>alert("ทำการแก้ไขข้อมูลสำเร็จ"); window.location.back();</script>'; 
            	
            }
            else{
            	echo '<script>alert("เกิดข้อผิดพลาด"); window.location.back();</script>';  
            }
            
        }
        
        
        
    }
    
?>