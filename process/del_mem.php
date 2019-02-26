<?php 

	  if(isset($_GET['id'])){
                include 'config.php';
                $get = htmlspecialchars($_GET['id']);
                $sql = "DELETE FROM employee WHERE emp_id=:id";
                $result  = $con->prepare($sql);
                $result -> execute(array('id'=>$get));
                if($result){
                		echo '<script> window.history.back();</script>';  
                }
                else{
                	echo '<script> window.history.back();</script>';  
                }

            }
?>