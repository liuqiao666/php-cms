<?php
error_reporting(0);
session_start();
$id=$_GET['id'];
include("top.php");
?>
<?php
//1.连接数据库
include("Connections/myconn.php");
//2.选择数据库
mysql_select_db("cms",$myconn);
//3.写sql
$sql="select * from article where id='".$id."'";
//4.执行sql
$result=mysql_query($sql);
//5.处理结果
$row=mysql_fetch_array($result);
?>
        <div class="page-wrapper">
            <div class="row page-titles m-b-0">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">修改文章信息</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">内容管理系统</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">文章管理</a></li>
                        <li class="breadcrumb-item active">修改文章信息</li>
                    </ol>
                </div>
            </div>

            <div class="page-wrapper" style="padding-top: 0px;">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="m-t-40" novalidate action="#" method="post" enctype="multipart/form-data">
                                	<div class="form-group">
                                        <h5>文章标题：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $row['title'];?>" type="text" name="title" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                	<div class="form-group">
                                        <h5>文章略缩图：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        	<img src="./images/<?php echo $row['cover'];?>" width="200px" hight="200px">
                                        	<br><br>
                                        	<input type="file" name="myfile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>文章标签：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $row['tag'];?>" type="text" name="tag" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>文章内容：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="<?php echo $row['content'];?>" type="text" name="content" class="form-control" required data-validation-required-message="This field is required"> </div>
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
	$title=$_POST['title'];
	$tag=$_POST['tag'];		
	$content=$_POST['content'];	
	
		//1.上传头像图片
 	if($_FILES['myfile']['type']=="image/jpeg"||$_FILES['myfile']['type']=="image/png"||$_FILES['myfile']['type']=="image/pjpeg")//判断文件格式是否为JPEG
	{
 		if($_FILES['myfile']['error']>0)				//判断上传是否出错
			echo "错误：".$_FILES['myfile']['error'];		//输出错误信息
 		else
 		{
			$tmp_filename=$_FILES['myfile']['tmp_name'];		//临时文件名
			$filename=$_FILES['myfile']['name'];			//上传的文件名
			$dir=$_SERVER['DOCUMENT_ROOT']."/cms/admin/images/";		//上传后文件的位置
			if(is_uploaded_file($tmp_filename))			//判断是否通过HTTP POST上传
			{
				//上传并移动文件
				if(move_uploaded_file($tmp_filename, $dir.$filename))
				{
					 	$sql="update article set title='".$title."',cover='".$filename."',tag='".$tag."',content='".$content."' where id='".$id."'";
					 	$result=mysql_query($sql);
					 	if($result)
					 	{
							echo "<script>alert('文章信息已成功修改，谢谢!');location.href='articlelist.php';</script>;";
					    }
					 	else
					     	echo "<script>alert('文章信息修改失败!');location.href='articlelist.php';</script>;";	
				}	
			}
		}
	}
}
?>