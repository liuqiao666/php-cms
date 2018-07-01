<?php
error_reporting(0);
session_start();
$email=$_GET['email'];
include("top.php");
?>
<?php
//1.连接数据库
include("Connections/myconn.php");
//2.选择数据库
mysql_select_db("cms",$myconn);
//3.写sql
$sql="select * from user where email='".$email."'";
//4.执行sql
$result=mysql_query($sql);
//5.处理结果
$row=mysql_fetch_array($result);
?>
        <div class="page-wrapper">
            <div class="row page-titles m-b-0">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">修改用户信息</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">内容管理系统</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">用户管理</a></li>
                        <li class="breadcrumb-item active">修改用户信息</li>
                    </ol>
                </div>
            </div>

            <div class="page-wrapper" style="padding-top: 0px;">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="m-t-40" novalidate action="" method="post">
                                    <div class="form-group">
                                        <h5>用户名：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $row['username'];?>" type="text" name="username" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>邮箱账号：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $row['email'];?>" type="text" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>用户密码：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $row['password'];?>" type="text" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
				                    <div class="text-xs-right">
                                        <button name="submit" type="submit" class="btn btn-info">提 交</button>
                                        <a href="userlist.php" class="btn btn-inverse">取 消</a>
                                    </div>
						        </form>
						    </div>
    					</div>
					</div>
				</div>
        	</div>
    	</div>
<footer class="footer">
 © 2018 电子科技大学成都学院计算机系版权所有
</footer>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/waves.js"></script>
<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="js/custom.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{	
	$name=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];			
 	$sql="update user set username='".$name."',password='".$password."',email='".$email."' where email='".$email."'";
 	$result=mysql_query($sql);
 	if($result)
 	{
		echo "<script>alert('您的信息已成功修改，请重新登陆，谢谢！');location.href='loginout.php';</script>;";
    }
 	else
     	echo "<script>alert('用户信息修改失败!');location.href='userlist.php';</script>;";	
}	
?>
