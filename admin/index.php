<?php
error_reporting(0);
session_start();
$email=$_SESSION['email'];
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
                    <h3 class="text-themecolor">系统首页</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">内容管理系统</a></li>
                        <li class="breadcrumb-item active">系统首页</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                	<!-- Column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">技术信息</h4>
                                <ul class="feeds">
                                    <li>
                                                                                本系统为博客系统的后台内容管理系统
                                        <span class="text-muted">搭建于2018.6.14</span>
                                    </li>
                                    <li>
                                                                                页面技术是基于Bootstrap,html,css,javascript......
                                        <span class="text-muted">基于web响应式设计</span>
                                    </li>
                                    <li>
                                                                                用途： 用于web响应式设计结课考核
                                        <span class="text-muted">2018春学期</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                           <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">其他信息</h4>
                                <ul class="feeds">
                                    <li>
                                                                                搭建人：刘巧
                                        <span class="text-muted">1630610109</span>
                                    </li>
                                    <li>
                                                                                学校：电子科技大学成都学院
                                        <span class="text-muted">计算机系计应1班</span>
                                    </li>
                                    <li>
                                                                                博客：http://loveqiao.top
                                        <span class="text-muted">基于github和hexo搭建</span>
                                    </li>
                                    <li>
                                                                                仓库托管地址：https://github.com/liuqiao666
                                        <span class="text-muted">用于平时项目代码的托管</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <!-- Column -->
                        <div class="card"> <img class="card-img-top" src="../assets/images/background/profile-bg.jpg" alt="Card image cap" style="max-height: 165px;">
                            <div class="card-body little-profile text-center">
                                <div class="pro-img"><img src="../assets/images/users/头像.jpg" alt="user" /></div>
                                <h3 class="m-b-0"><?php echo $row['username'];?></h3>
                                <p><?php echo $row['email'];?></p>
                                <a href="edituser.php?email=<?php echo $row['email'];?>" class="m-t-10 waves-effect waves-dark btn btn-info btn-md btn-rounded">修改个人信息</a>
                                <div class="row text-center m-t-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                    	<?php 
									   		include "Connections/myconn.php";
										 	mysql_select_db("cms",$myconn);
											$sql="select *from tag";
											$total = mysql_num_rows(mysql_query($sql)); //记录总条数
									   	?>
                                        <h3 class="m-b-0 font-light"><?php echo $total;?></h3><small>标签总数</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                    	<?php 
									   		include "Connections/myconn.php";
										 	mysql_select_db("cms",$myconn);
											$sql="select *from article";
											$total = mysql_num_rows(mysql_query($sql)); //记录总条数
									   	?>
                                        <h3 class="m-b-0 font-light"><?php echo $total;?></h3><small>文章总数</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
							            <?php 
									   		include "Connections/myconn.php";
										 	mysql_select_db("cms",$myconn);
											$sql="select *from user";
											$total = mysql_num_rows(mysql_query($sql)); //记录总条数
									   	?>
                                        <h3 class="m-b-0 font-light"><?php echo $total;?></h3><small>用户总数</small></div>
                                    <div class="col-md-12 m-b-10"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
            <footer class="footer"> © 2018 电子科技大学成都学院计算机系版权所有</footer>
        </div>
    </div>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>