<?php
error_reporting(0);
$content=$_GET['content'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除标签信息</title>
</head>
<body>
</body>
</html>
<?php
	//1.连接数据库
	include("Connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("cms");
	$sql="delete from tag where content='".$content."'";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功！');";
		echo "location.href='taglist.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误,删除失败！');";
		echo "location.href='taglist.php'"; 
		echo "</script>";
	}
?>