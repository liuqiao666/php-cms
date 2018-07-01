<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.ico">
    <title>内容管理系统</title>
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>
<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/background.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="#" method="post">
                        <h3 class="box-title m-b-20">注册页面</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="username" name="username" class="form-control" type="text" required="" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" name="email" class="form-control" type="email" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="password" name="password" class="form-control" type="password" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password_confirm" name="password_confirm" class="form-control" type="password" required="" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button name="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">OK</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>已经注册过一个账号? <a href="login.php" class="text-info m-l-5"><b>登陆</b></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{  
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	$email=trim($_POST['email']);
	$password_confirm=trim($_POST['password_confirm']);

	$token = md5($username.$password.$regtime); //创建用于激活识别码 
	$token_exptime = time()+60*60*24;//过期时间为24小时后 
	if($username==""||$password==""||$password_confirm=="")
	{
	   echo "<script>alert('密码或账号不能为空');</script>;";
	}
	else
	{ 		
		//2.将所有信息写入数据库
	 	include "Connections/myconn.php";
	 	mysql_select_db("cms",$myconn);
	 	$sql="select *from user where username='".$username."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0)
		{
			echo "<script>alert('账户已存在！');</script>;";
			exit;
		}
		else
		{
			if(strcmp($password,$password_confirm)!=0)
			{
				echo "<script>alert('密码不一致');</script>;";
			}
		  	else
			{

				$sql="insert into user (username,password,email) values('".$_POST['username']."','".$_POST['password']."','".$_POST['email']."');";
				$result=mysql_query($sql);
				if($result)
				{
					$_SESSION['username']=$username;
					include "email.php"; 
					echo "<script>alert('账号已注册，请验证邮箱后登录！');location.href='login.php';</script>;";
				}
				else
					echo "<script>alert('注册失败');location.href='register.php';</script>;";	
			}	
		}
	}
}
?>