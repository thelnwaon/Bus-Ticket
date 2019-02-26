<?php 
// การเข้าสู่ระบบ

  require 'config.php';
        if(isset($_POST['in'])){
          $data = $_POST['in'];

            try{
                $user = htmlspecialchars($data['user']);
                $pass = htmlspecialchars($data['pass']);
                $sql  = "SELECT * FROM user WHERE user_username=:user AND user_pid=:pass";
                $result = $con->prepare($sql);
                $result->execute(array('user'=>$user,
                						'pass'=>$pass
                	));

                $authen = $result->rowCount();
                if($authen > 0 ){
                    // มีข้อมูลอยู่จริง

                   $rs = $result->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['name']     = $rs['user_name'];
                     
                        $_SESSION['user_id'] = $rs['user_id'];
                        $_SESSION['status'] = "member";
                    
                  
                    	
                    	  echo '<script> alert("ยินดีต้อนรับคุณ '.$_SESSION["name"].' เข้าสู่ระบบค่ะ."); window.location.href = "index.php?p=home";</script>';
                          

                }else{

                    $sql = "SELECT * FROM employee WHERE username='".$user."' AND password='".$pass."'";
                    $result = $con->prepare($sql);
                    $result -> execute();
                    if($result -> rowCount() > 0){
                        $rs = $result->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['name']     = $rs['emp_name'];
                     
                        $_SESSION['user_id'] = $rs['emp_id'];
                        $_SESSION['status'] = "employee";
                    
                  
                        
                          echo '<script> alert("ยินดีต้อนรับคุณ '.$_SESSION["name"].' เข้าสู่ระบบค่ะ."); window.location.href = "index.php?p=home";</script>';
                    }
                    else {
                        $sql = "SELECT * FROM admin WHERE username='".$user."' AND password= '".$pass."'";
                        $result2 = $con->prepare($sql);
                        $result2 -> execute();
                        if($result2 -> rowCount() > 0){
                        $rs = $result2->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['name']     = "admin";
                        $_SESSION['user_id'] = $rs['id_admin'];
                        $_SESSION['status'] = "admin";
                    
                  
                        
                          echo '<script> alert("ยินดีต้อนรับคุณ '.$_SESSION["name"].' เข้าสู่ระบบค่ะ."); window.location.href = "index.php?p=home";</script>';
                        }else{
                            echo '<script> alert("Username หรือ Password ผิดพลาด.");</script>';
                            echo "<script>window.history.back()</script>";
                        }
                    }
                    
                }

            }catch(Exception $e){
                echo 'รูปแบบการใช้งานผิดพลาด ' . $e;
            }
        }
?>