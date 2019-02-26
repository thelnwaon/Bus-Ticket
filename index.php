<!DOCTYPE html>
<html lang="">
<head>
<?php session_start(); include 'function.php'; date_default_timezone_set("Asia/Bangkok");?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">

<script src="bootstrap/js/bootstrap.min.js"></script>
    <title>ระบบจองตั๋วรถทัวร์ออนไลน์</title>
</head>

<body>
    	<nav id="hide" class="navbar navbar-default none-radius ">
      <!-- <nav class="navbar navbar-default"> -->
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
           
              <a class="navbar-brand acolor"  href="#">ระบบจองตั๋วรถทัวร์ออนไลน์</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                 <?php $status = ""; if(isset($_SESSION['status'])) $status = $_SESSION['status']; ?>
                
              <li  <?php  if(isset($_GET['p'])) { $p = $_GET['p'];if($p == "home")echo "class='activity'"; }?>  ><a href="?p=home"  >หน้าแรก</a></li>
              
               
                <li  <?php  if(isset($_GET['p'])) { $p = $_GET['p'];if($p == "travel_bus")echo "class='activity'"; }?>  > <a href="?p=travel_bus">เที่ยวรถ<span class="sr-only">(current)</span></a></li>
              <?php if($status == "admin" || $status == "employee"){?>
                 
                 <?php if($status == "employee"){ ?>

               <li  <?php  if(isset($_GET['p'])) { $p = $_GET['p'];if($p == "see_booking_member")echo "class='activity'"; }?>  > <a href="?p=see_booking_member">การจองเที่ยวรถ<span class="sr-only">(current)</span></a></li> 
               
                 <li  <?php  if(isset($_GET['p'])) { $p = $_GET['p'];if($p == "all_price")echo "class='activity'"; }?>  > <a href="?p=all_price">ดูการชำระตั๋วทั้งหมด<span class="sr-only">(current)</span></a></li> 
               <?php }?>

              <?php  if($status == "admin"){ ?>
                <li  <?php  if(isset($_GET['p'])) { $p = $_GET['p'];if($p == "employee")echo "class='activity'"; }?>  > <a href="?p=employee">พนักงาน<span class="sr-only">(current)</span></a></li>
                <?php } ?>  

             

                 <?php 
                        }?>
                   <?php if($status == "member"){?>
                  <li  <?php  if(isset($_GET['p'])) { $p = $_GET['p'];if($p == "booking_data_member")echo "class='activity'"; }?>  > <a href="?p=booking_data_member">ข้อมูลการจองตั๋ว<span class="sr-only">(current)</span></a></li>

                  <?php }?>
              </ul>
           
              <ul class="nav navbar-nav navbar-right">
               <?php if(!isset($_SESSION['status'])) {?>
               <li data-toggle="modal" data-target="#myModal"><a href="#">สมัครสมาชิก</a></li>
               <?php }?>
               <?php if(isset($_SESSION['status'])) {?>
                <li onclick="logout()" ><a href="#">ออกจากระบบ</a></li>
              <?php }else{ ?>
              <li data-toggle="modal" data-target="#modal2"><a href="#">เข้าสู่ระบบ</a></li>
              <?php }?>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>


        <!--
	░░░░░░░░░░░░░░░░░░▒▓▓█████████████▓▓▒░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░▒████▓▓▒▒░▒▒▒░▒▒▒▒▒▒▓▓████▓▒░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░▒███▓░░░░░░░░░░░░░░░░░░░░░░▒███████▓▓▒░░░░░░░░░░░
░░░░░░░░░▒██▓░░░░▒▒███▓▓▒░░░░░░░░░░░░░▓▓▒▒▒▒▒▓██████▓░░░░░░░
░░░░░░░▒██▓░░░▓███▓▒░░░░░░░░▒▒▒▒▒▒▒▒▒▒░░░░░░▒▓▓███▓████▒▒░░░
░░░░░░██▓░░▒▓██▓░░▒▓██████▓░░░░░░░▒░░░░░░▒██▓▒░░░▓███▒▓▒░░░░
░░░░░██░░▓███▒░░▒██▒░░░░▒▒██▓░░░░░░░░░░░██▒░░░░▒████▒█░░░░░░
░░░░██░▒▓▒▓▓░░░██░░░░░░░░░░░█▓░░░░░░░░░██░░░░░░▒███░░█▒░░░░░
░░░▓█░░░░░░░░░██░░░░░░░░░░░░▓█░░░░░░░░██░░░░░░░░░░░░░█▒░░░░░
░░░█▓░░░░░░░░░█▒░░████░░░░░░░█▒░░░░░░░██░░░░░░░░░░░░███░░░░░
░░▒█░░░░░░░▒▓▒█▓░▓████▓░░░░░▒█░░░░░░░░▒█▒░░░░░░░░░░██░█▒░░░░
░░██░░░░░▒▓▒▓▒██▒▒▓▓▓░░░░░░░██░░░░░░░░░▒████▓███████▓░█▒░░░░
░░█▓░░░░░▒░░░▒░▒██▓▒░░░░░▒██▓░░░░░░░░░░░░░░██▓░░░░░░▒██▓░░░░
░░█░░░░░░░░░▓▒░░░░▒▓██████▓░░░░░░░░░░░░░░▒██░░░▓█▓▓▒░░░██░░░
░▒█░░░░░░░░░░░░░░░░░░░░░░░░░░▓▒▓▒▒▒▒▒▓▓▓▓██░░▓█▓░▒▒██▒░░██░░
░▓█░░░░░░░░░░░░░░░░░░░░░░░░░░▒▒▒▒▒▒▓▓▒░░██░░██▓░▒░▒░██░░▒█░░
░██░░░░░░░░░░░░░░░░░░░░░░░▒▓▒▒▒▒▒▒▒▒░░░██░░▓█░█▓░█▒█▓█▓░░█░░
░██░░░░░░░░░░░░░░░░░░░░░░░░░▒▒▒▒▒░▒▒░░▓█▓░░██░█▒▒█▒█▒▓█░░█░░
░██░░░░░░░░░░░░░░░░░░░░░░░░▒░░░░░░░░░░▓█░░░█▒░░░░▒▒░░▒█░▓█░░
░▒█░░░░░░░░░░░░░░░░░░░░░░░░▒▒▒▒▒▒▒▒▒▒░░█▒░░█▒░░░░░░░░▓█░█▓░░
░░█▓░▒▒░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓█░░█▒░░░░░░░░█░▒█░░░
░░▓█░░▒░░▒▒░░▒░░░░░░░░░░░░░░░░░░░░░░░░░░█░░█▒░░░░░░░█▓░█▓░░░
░░░█▒░░▒░░▒░░▒▒░░░░░░░░░░░░░░░░░░░░░░░░░█░░█▒░░░░░░▓█░░█░░░░
░░░██░░░▒░▒░░░▒▒░░░░░░░░░░░░░░░░░░░░░░░░█░░█▒░░░░░░██░░█░░░░
░░░░█▓░░░▒░▒░░░░▒▒░░░░░▒▒▒▒▒▒░░░░░░░░░░▒█░▒█░░░░░░░█▒░░█▓░░░
░░░░▓█░░░░▒▒░░░░░▒▒░░░░░░▒▒▒▓▓▓▒░░░░░░░██░██░░░░░░░██░░▓█░░░
░░░░░██░░░▒░▒░░░░░▒░░░░░░░░▒░▒▒▓█▒░░░░▒█░░█▓▒▓▓▓▒░░▓█░░░█▒░░
░░░░░▒█▒░░░▒▒▒░░░░▒░░░░░░░░░░▒▒▒░▒▓░░░██░▒█░░░░▒▓▓░░██░░█▒░░
░░░░░░▒█▒░░░▒░▒░░░▒░░░░░░▒▒▒░░░░▒▒░░░▒█░░██░░░░░░░█░▒█░░█▒░░
░░░░░░░▓█░░░▒░▒░░░░▒▒░░░░▓▒▒▓▓▓▒░░▓▒░██░░██▒▒▒▒▓▒▓▓███░░█▒░░
░░░░░░░░██░░░▒░▒░░░░░▒▒░░░░░░░░▓█▓░░░█▓░░██░▓█░█░█░░█▒░░█▒░░
░░░░░░░░░██░░░░▒▒░░░░░░▒▒░░░░░░░░▒█▓░█▓░░▓█▒▒█▒█░█▒██░░▒█░░░
░░░░░░░░░░██▒░░░░▒░░░▒░░░▒▒░░░░░░░░▒▓██░░░██░░░░▒▒██░░░██░░░
░░░░░░░░░░░▓██░░░░░░░░▒▒░░░▒░░░░░░░░░▓█░░░░▓███▓▓██░░░██░░░░
░░░░░░░░░░░░░▓██▒░░░░░░▒▒▒▒▒░░░░░░░░░░██░░░░░░▒▒▒░░░░██░░░░░
░░░░░░░░░░░░░░░▓███▒░░░░░░░▒▒▒▒▒▒▒▒░░░░▓██▒░░░░░░░▒███░░░░░░
░░░░░░░░░░░░░░░░░▒▓███▓▒░░░░░░░▒░░▒▒▒▒░░░▒██▓██████▓░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░▒████▓▒▒░░░░░░░░░░░░░░░▓██▒░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░▒▓████▓░░░░░░░▓█████▒░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▒█████████▒░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▒▒▒░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 

		special thanks to
		http://textart4u.blogspot.com/2012/05/lol-meme-face-ascii-text-art.html
		for this LOL meme ascii <article></article>
	-->
    <div  class="modal fade bs-example-modal-sm" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div id="hide" class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
     <form action="?p=check_login" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ</h4>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" class="form-control" name="in[user]" maxlength="13" placeholder="Username">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="in[pass]" placeholder="รหัสบัตรประชาชน หรือ รหัสผ่าน" title="Password" required>
  </div>
  </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        
      </div>
      </form>

    </div>

  </div>
</div>



	<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div id="hide" class="modal-dialog" role="document">
    <div class="modal-content">
     <form action="?p=inmem" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">สมัครสมาชิก</h4>
      </div>
      <div class="modal-body">
       
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
    <input type="text" class="form-control" name="in[name]"  pattern=".{8,20}" title="username ควรมีความยาว 8-20 อักษร" required placeholder="ชื่อ-นามสกุล">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" class="form-control" pattern=".{8,20}" name="in[user]" title="username ควรมีความยาว 8-20 อักษร"  placeholder="username ควรมีความยาว 8-20 อักษร">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">รหัสบัตรประชาชน</label>
    <input type="text" class="form-control"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  placeholder="รหัสบัตรประชาชน" pattern=".{13,13}" maxlength="13"  title="รหัสบัตรประชาชนควรมี 13 หลัก" required  name="in[pid]" placeholder="รหัสบัตรประชาชน">
  </div>
   
  <div class="form-group">
    <label for="exampleInputPassword1">E-Mail</label>
    <input type="email" class="form-control" name="in[email]" required placeholder="E-Mail">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">เบอร์โทรศัพท์</label>
    <input type="number" class="form-control" name="in[tel]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" pattern=".{10,10}" required placeholder="เบอร์โทรศัพท์">
</div>
  <div class="form-group">
    <div class="radio">
  <label><input type="radio" name="in[sex]" value="0">ชาย</label>&nbsp;&nbsp;&nbsp;&nbsp;
   <label><input type="radio" name="in[sex]" value="1">หญิง</label>
</div>
  </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        
      </div>
      </form>
    </div>

  </div>
</div>
        <div class="container">
        <div class="col-md-12">
       
          <?php
            if(isset($_GET['p'])){
              $page = $_GET['p'];
              if($page == "home"){
                include 'page/home.php';
              }
              else if($page == "check_login"){
                include 'process/check_login.php';
              }
              else if($page == "logout"){
                include 'process/logout.php';
              }
              else if($page == "inmem"){
                include 'process/insert_member.php';
              }
              else if($page == "show_history_booking"){
                include 'page/show_history_booking.php';
              }
              else if($page == "history_gone"){
                include 'page/history_gone.php';
              }
              else if($page == "in_user_booking"){
                include 'process/in_user_booking.php';

              }
              else if($page == "print_booking"){
                include 'page/print_booking.php';

              }
              else if($page == "booking_data_member"){
                include 'page/booking_data_member.php';
              }
              else if($page == "del_booking"){
                include 'process/del_booking.php';
              }
              else if($page == "pass_booking"){
                include 'process/pass_booking.php';
              }
              else if($page == "member"){
                include 'page/member.php';
              }
              else if($page == "all_price"){
                include 'page/all_price.php';
              }
              else if($page == "employee"){
                include 'page/employee.php';
              }
              else if($page == "travel_bus"){
                include 'page/travel_bus.php';
              }
              else if($page == "cancel_booking"){
                include 'process/cancel_booking.php';
              }
              else if($page == "edit"){
                include 'page/edit_mem.php';
              }
              else if($page == "edit_bustype"){
                include 'page/edit_bustype.php';
              }
              else if($page == "see_booking_member"){
                include 'page/see_booking_member.php';
              }
              else if($page == "savedit"){
                include 'process/save_edit_mem.php';
              }
              else if($page == "booking_travel2"){
                include 'page/booking_travel_2.php';
              }
              else if($page == "booking_travel3"){
                include 'page/booking_travel_3.php';
              }
              else if($page == "booking_travel"){
                include 'page/booking_travel.php';
              }
              else if($page == "edit_travel"){
                include 'page/edit_travel.php';
              }
              else if($page == "del"){
                include 'process/del_mem.php';
              }
              else if($page == "addmem"){
                include 'page/add_mem.php';
              }
              else if($page == "add"){
                include 'process/save_add_mem.php';
              }
              else{

                include 'page/home.php';
              }
            }
            else{

                include 'page/home.php';
              }
          ?>
        </div>
        </div>
        </div>
        </div> 
        
        </div>



    	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/script.js"></script>
      <script src="bootstrap-datepicker/bootstrap-datepicker-thai.js"></script>
    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.th.js"></script>
   
</body>
</html>
