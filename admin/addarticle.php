<?php
error_reporting(0);
session_start();
$time = time();
$day = date("Y-m-d H:i:s",$time);
include("top.php");
?>
<link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
<link href="../assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
        <div class="page-wrapper">
            <div class="row page-titles m-b-0">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">添加文章</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">内容管理系统</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">文章管理</a></li>
                        <li class="breadcrumb-item active">添加文章</li>
                    </ol>
                </div>
            </div>

            <div class="page-wrapper" style="padding-top: 0px;">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="m-t-40" novalidate action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <h5>文章标题：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    	</div>
                                    <div class="form-group">
                                        <h5>文章所属标签：<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="tag" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                    	<h5>文章略缩图：<span class="text-danger">*</span></h5>
				                        <div class="card">
				                            <div class="card-body">
				                                <input type="file" name="myfile" class="dropify" />
				                            </div>
				                        </div>
				                    </div>
                                    <div class="form-group">
                                    	<h5>请输入你要发表的文章信息：<span class="text-danger">*</span></h5>
				                      <div class="col-12">
				                        <div class="card">
				                            <div class="card-body">
				                                <div class="summernote">
				                                	<textarea id="content" name="content" style="width:980px;height:300px;" class="textArea"></textarea>
				                                </div>
				                            </div>
				                        </div>
				                      </div>
				                    </div>
				                    <div class="text-xs-right">
                                        <button type="submit" name="submit" class="btn btn-info">提 交</button>
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
    <script src="../assets/plugins/summernote/dist/summernote.min.js"></script>
    <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
	<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<?php	
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$tag=$_POST['tag'];
	$content=$_POST['content'];
	$time=$day;
		
	include "Connections/myconn.php";
 	mysql_select_db("cms",$myconn);

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
					 	$sql="insert into article (title,tag,cover,content,time) values('".$title."','".$tag."','".$filename."','".$content."','".$time."')";
					 	$result=mysql_query($sql);
					 	if($result)
					 	{
					 		$sql="insert into tag (content) values('".$tag."')";
							$result=mysql_query($sql);
							if($result)
							{
				     			echo "<script>alert('文章上传成功，谢谢！');location.href='articlelist.php';</script>;";
							}
							else
					     		echo "<script>alert('标签信息未插入，文章上传失败!');location.href='articlelist.php';</script>;";	
				        }
				     	else
					     	echo "<script>alert('文章上传失败!');location.href='articlelist.php';</script>;";	
				}
				else
					echo "<script>alert('文章缩略图上传失败');</script>;";
			}
		}
	}
	else
	{
		echo "<script>alert('文件格式非图片');</script>;";
	}								    	        
}
?>
    
