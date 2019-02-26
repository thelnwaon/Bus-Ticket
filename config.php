<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bus";
 try{
    $con = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    $con ->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e){ 
    $e->getMessage()."<br>";
    exit();
}
?>