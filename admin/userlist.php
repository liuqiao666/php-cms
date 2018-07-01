<?php
error_reporting(0);
session_start();
$email=$_SESSION['email'];
include("top.php");
?>
<link href="css/list.css" rel="stylesheet" />
<div class="page-wrapper">
    <div class="row page-titles m-b-0">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">用户管理</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">内容管理系统</a></li>
                <li class="breadcrumb-item active">用户管理</li>
            </ol>
        </div>
    </div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="table-responsive">
               <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                <thead>
                    <tr>
                        <th>用户名</th>
                        <th>邮箱账号</th>
                        <th>密码</th>
                    </tr>
                </thead>
                <tbody>
			    <?php  
				//1.连接数据库
				include("Connections/myconn.php");//与右侧文件名一致
				//2.选择数据库
				mysql_select_db("cms");
				
				require_once('page.class.php'); //分页类
				$showrow = 5; //一页显示的行数
				$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
				$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
				//3.写SQL代码
				$sql="select *from user";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
				if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
				$curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
				//获取数据
				$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
				//4.执行SQL代码
				$result=mysql_query($sql);
				//5.处理执行结果
				//$row=mysql_fetch_row($result);//只能读出数据库中的一行。
				while($row=mysql_fetch_array($result))//添加while语句实现循环添加。
				{									   //row与array	
				?>
                    <tr>
                        <td><?php echo $row['username'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['password'];?></td>
                        <td>
                        	<a href="edituser.php?email=<?php echo $row['email'];?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline edit-row-btn" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil text-inverse m-r-10" aria-hidden="true"></i></button></a>
                            <a href="shanuser.php?email=<?php echo $row['email'];?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
	                        <div class="text-right">
							    <?php
							        if ($total > $showrow) {//总记录数大于每页显示数，显示分页
							            $page = new page($total, $showrow, $curpage, $url, 6);
							            echo $page->myde_write();
							    }
							    ?>
	                        </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
          </div>
         </div>
        </div>
    </div>
</div>
<footer class="footer"> © 2018 电子科技大学成都学院计算机系版权所有</footer>
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
    <!-- Footable -->
    <script src="../assets/plugins/footable/js/footable.all.min.js"></script>
    <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="js/footable-init.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
    