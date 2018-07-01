<?php
error_reporting(0);
session_start();
$content=$_GET['content'];
include("top.php");
?>
        <div class="page-wrapper">
            <div class="row page-titles m-b-0">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">修改标签信息</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">内容管理系统</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">用户管理</a></li>
                        <li class="breadcrumb-item active">修改标签信息</li>
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
                                        <h5>标签内容：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $content;?>" type="text" name="content" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
				                    <div class="text-xs-right">
                                        <button name="submit" type="submit" class="btn btn-info">提 交</button>
                                        <button type="reset" class="btn btn-inverse">取 消</button>
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
	$tag=$_POST['content'];		
 	$sql="update tag set content='".$tag."' where content='".$content."'";
 	$result=mysql_query($sql);
 	if($result)
 	{
 		$sql="update article set tag='".$tag."' where tag='".$content."'";
 		$result=mysql_query($sql);
		if($result)
 		{
			echo "<script>alert('标签信息已成功修改，谢谢！');location.href='taglist.php';</script>;";    
		}
		else
     		echo "<script>alert('文章标签信息更新失败!');location.href='taglist.php';</script>;";	
	}
 	else
     	echo "<script>alert('标签信息修改失败!');location.href='taglist.php';</script>;";	
}	
?>
