<?php
error_reporting(0);
session_start();
$email=$_SESSION['email'];
?>
 <?php
 include("../Connections/myconn.php");
 mysql_select_db("cms");
 mysql_query('set names utf8');
if($_SESSION['email'] =="")
	echo "<script type='text/javascript'>alert('您还未登录，请登录!');location.href='login.php';</script>";
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

<body class="fix-header card-no-border logo-center">
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item dropdown">
							<h3 class="m-b-0" style="color: #FFFFFF;padding-top: 14px;">内容管理系统</h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            	<?php echo $row['username'];?>&nbsp;&nbsp;你好^-^
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                               <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                            	<p>用户名：<?php echo $row['username'];?></p>
                                                <p>邮箱号：<?php echo $_SESSION['email'];?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="loginout.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;退 出</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

            <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                        	<a class="waves-effect" href="index.php" style="background-color: #FFFFFF;">
                        	<i class="mdi mdi-gauge"></i><span>系统首页</span>
                        </a>
                        </li>
                        <li> 
                        	<a class="waves-effect" href="articlelist.php" style="background-color: #FFFFFF;">
                        	<i class="mdi mdi-bullseye"></i><span>文章管理</span>           	
                        	</a>
                        	<ul style="width: 120px;">
                        		<li>
	                        		<a href="addarticle.php">
	                        			添加文章        	
	                        		</a>
                        		</li>
                        	</ul>
                        </li>
                        <li> 
                        	<a class="waves-effect" href="taglist.php" style="background-color: #FFFFFF;">
                        	<i class="mdi mdi-chart-bubble"></i><span>标签管理</span>           	
                        </a>
                        </li>
                        <li> 
                        	<a class="waves-effect" href="userlist.php" style="background-color: #FFFFFF;">
                        	<i class="mdi mdi-book-open-variant"></i><span>用户管理</span>           	
                        </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>