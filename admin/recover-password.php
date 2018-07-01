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
                <form class="form-horizontal form-material" id="loginform" action="" method="post">
                    <h3 class="box-title m-b-20">重置密码页面</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="pw" class="form-control" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="pw2" class="form-control" type="password" required="" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button name="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">OK</button>
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
    include "Connections/myconn.php";
 	mysql_select_db("cms",$myconn);
	if($_POST['pw']==$_POST['pw2'])
	{
		$sql="update user set password ='".$_POST['pw']."' where email='".$_GET['email']."'";
		$result=mysql_query($sql);
		if($result){	
		  echo "<script>alert('密码重置成功！');location.href='login.php';</script>;";
		}
		else
		{
			echo "<script>alert('密码重置失败！');location.href='login.php';</script>;";
		}
	}
	else
	{
		echo "<script>alert('密码前后不一致，请您重新输入，谢谢！');</script>;";
	}
}
?>