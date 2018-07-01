<?php
error_reporting(0);
session_start();
$_SESSION['email']=$_POST['email'];
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
                        <h3 class="box-title m-b-20">登陆页面</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input name="email" id="email" class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="password" id="password"  class="form-control" type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
       						<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right">
							忘记密码?
       						</a> 
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button name="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">OK</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>没有账号? <a href="register.php" class="text-info m-l-5"><b>注 册</b></a></div>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="#" method="post">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>忘记密码页面</h3>
                                <p class="text-muted">请输入你曾经在网站上注册过的邮箱账号！</p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input name="forgetemail" class="form-control" type="email" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button name="forget" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	//include "email.php";
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($email!="" && $password!=""){
		//1.建立数据库连接
		include "Connections/myconn.php";
		//2.选择数据库
		mysql_select_db("cms",$myconn);	
		//3.写sql语句
		$sql="select * from user where email='".$email."' and password='".$password."'";
		//4.执行sql
		$result=mysql_query($sql);
		//5.读出结果$result做相应的操作
		//通过获取$result的行数来判定用户名和密码是否正确
		$hang=mysql_num_rows($result);
		
		$sql="select *from user where email='".$email."' and password='".$password."' and status='1'";
		$result=mysql_query($sql);
		if($hang==0)
		  echo "<script>alert('邮箱账号或密码错误');</script>";
		else
			{
				$sql="select *from user where email='".$email."' and password='".$password."' and status='1'";
				$result=mysql_query($sql);
				if(mysql_num_rows($result)==0){
					echo "<script>alert('用户未激活！');</script>";
				}
				else{
						$_SESSION['email']=$_POST['email'];
				  		echo "<script>alert('登陆成功，欢迎来到内容管理系统^-^');</script>";
				  		echo "<script> location.href='index.php';</script>"; 
				  }
			}
        }
}
if(isset($_POST['forget']))
{
	$email=$_POST['forgetemail'];
	include "psemail.php";
	echo "<script>alert('找回密码邮件发送成功，请您及时修改密码，谢谢！');</script>;"; 
}
?>