<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/stylelogin.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>


    <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>ระบบจองสนามฟุตบอลออนไลน์</strong> </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>เข้าสู่ระบบ</h3>
                            		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <form action="index.php" method="post" class="login-form">
			                    	<div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="user" pattern=".{8,20}" title="username ควรมีความยาว 8-20 อักษร" required class="form-control" placeholder="Username...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="pass" pattern=".{8,20}" title="password ควรมีความยาว 8-20 อักษร" class="form-control" placeholder="**********">
                                    </div>
			                        <button type="submit" class="btn btn-primary">Submit!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
            </div>

        </div>



    	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/script.js"></script>
</body>
</html>