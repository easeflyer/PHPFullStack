<?php


$link = @mysql_connect("localhost","root","") or die("连接失败:".mysql_error());
mysql_select_db("pro",$link);
mysql_query("set names utf8");




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<LINK href="imgs/Style.css" type=text/css rel=stylesheet>
<LINK href="imgs/Manage.css" type=text/css rel=stylesheet>
</head>

<body>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
  <TR>
    <TD width=15><IMG src="imgs/new_019.jpg" border=0></TD>
    <TD width="100%" background=imgs/new_020.jpg height=20></TD>
    <TD width=15><IMG src="imgs/new_021.jpg" 
  border=0></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
  <TR>
    <TD width=15 background=imgs/new_022.jpg><IMG 
      src="imgs/new_022.jpg" border=0> </TD>
    <TD vAlign=top width="100%" bgColor=#ffffff>
      <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
        <TR>
          <TD class=manageHead>当前位置：会员管理 &gt;会员列表</TD></TR>
        <TR>
          <TD height=2></TD></TR></TABLE>
      <TABLE borderColor=#cccccc cellSpacing=0 cellPadding=0 width="100%" 
      align=center border=0>
        <TBODY>
        
        <TR>
          <TD>
            <TABLE id=grid 
            style="BORDER-TOP-WIDTH: 0px; FONT-WEIGHT: normal; BORDER-LEFT-WIDTH: 0px; BORDER-LEFT-COLOR: #cccccc; BORDER-BOTTOM-WIDTH: 0px; BORDER-BOTTOM-COLOR: #cccccc; WIDTH: 100%; BORDER-TOP-COLOR: #cccccc; FONT-STYLE: normal; BACKGROUND-COLOR: #cccccc; BORDER-RIGHT-WIDTH: 0px; TEXT-DECORATION: none; BORDER-RIGHT-COLOR: #cccccc" 
            cellSpacing=1 cellPadding=2 rules=all border=0>
              <TBODY>
              <TR style=" line-height:30px;text-align:center;FONT-WEIGHT: bold; FONT-STYLE: normal; BACKGROUND-COLOR: #eeeeee; TEXT-DECORATION: none">
                <TD>用户名</TD>
                <TD>密码</TD>
                <TD>性别</TD>
                <TD>电话</TD>
                <TD>邮箱</TD>
                <TD>操作</TD>
			</TR>


			<?php
			//分页内容:

			// 统计 总记录数
			$sql_0 = "select * from users";
			$result_0 = mysql_query($sql_0);
			$count = mysql_num_rows($result_0);

			//每页多少条记录
			$pageSize = 2;

			//计算总页数：进位取整
			$totalPage = ceil($count/$pageSize);

			//确定当前页:
			if(isset($_GET["page"])){  //点上一页 或页码 或下一页 都能得到page，并且 page 不会超过 totalPage
				$page = $_GET["page"];
				if($page>$totalPage){ $page = $totalPage;}
			}else{
				$page = 1; //刚刷新页面的时候 得不到page
			}
			// page  和 显示的起始位置之间的关系的公式:   当前要显示等5页数据，则起始记录是 4*$pageSize 也就是第5页第一条数据。 从0开始算起
			$start = ($page-1)*$pageSize;
			
			//查找所有会员 组成列表limit m,n m 是起始记录的 index, n 是记录条数。
			$sql = "select * from users limit {$start},{$pageSize}";
			$result = mysql_query($sql);




			// 循环输出 每一行 数据。
			while($rs = mysql_fetch_assoc($result)){
				if($rs["uSex"]==1){
					$uSex = "男";
				}else{
					$uSex="女";
				}
			?>


              <TR style="text-align:center;line-height:30px;FONT-WEIGHT: normal; FONT-STYLE: normal; BACKGROUND-COLOR: white; TEXT-DECORATION: none">

                <TD><?php echo $rs["uName"]?>--<?php echo $rs["id"]?></TD>
                <TD><?php echo $rs["uPwd"]?></TD>
                <TD><?php echo $uSex?></TD>
                <TD><?php echo $rs["uTel"]?></TD>
                <TD><?php echo $rs["uEmail"]?></TD>
                
                <TD>
				<a href="userAction.php?act=delete&id=<?php echo $rs["id"]?>">删除</a> 
				| 
				<a href="userUpdateView.php?id=<?php echo $rs["id"]?>">修改 </a>
				</TD>
				
				</TR>
			

			<?php
			}
			?>




              </TBODY></TABLE></TD></TR>
        
        <TR>
          <TD>



          <!--  分页部分
			$count  总记录数
          -->
          <SPAN id=pagelink>
            <DIV style="LINE-HEIGHT: 20px; HEIGHT: 20px; TEXT-ALIGN: right">
			
			[<B> 总共： <?php echo $count;?>	</B>]条记录


            [当前第：<?php echo $page;?>]页 

			<a href="userList.php?page=1">首页</a>
			|
			<a href="userList.php?page=<?php echo $page-1?>">上一页</a>
			|
			<?php
			/**
			 * 页码部分的处理逻辑
			 
				如果当前页小于等于5
					页码：从1-10，不超过$totalPage
				如果当前页 大于 5，比如是8
					页码从：8-4 开始 到 8+5结束，但是不超过$totalPage
					也就是说：到快接近尾页的时候。只会显示到尾页。

				总页码个数保持是10个。


			 */

			// 如果当前页 小于 5 
			if($page<=5){

				for($i=1;$i<=10;$i++){  // 超过10页 就显示 10个页码， 不到10页就显示到 totalPage 结束退出

						if($i==$totalPage){  // 如果 总页数 就4页 ，但是 $i 1循环10  就需要 $i==$totalPage 不在输出页码
							?>
							<a href="userList.php?page=<?php echo $i;?>">[<?php echo $i;?>]</a>
							<?php
							break;  // 退出循环 后面的代码不再执行
						}	
			?>
					<a href="userList.php?page=<?php echo $i;?>">[<?php echo $i;?>]</a>
			<?php

				}

			}else{ // $page 大于5的情况

				for($i=($page-4);$i<=($page+5);$i++){
						if($i==$totalPage){  // 如果 总页数 就4页 ，但是 $i 1循环10  就需要 $i==$totalPage 不在输出页码
							?>
							<a href="userList.php?page=<?php echo $i;?>">[<?php echo $i;?>]</a>
							<?php
							break;
						}	
			?>
					<a href="userList.php?page=<?php echo $i;?>">[<?php echo $i;?>]</a>
			<?php
				}
			}
			?>
			|
			<a href="userList.php?page=<?php echo $page+1?>">下一页</a>
			|
			<a href="userList.php?page=<?php echo $totalPage?>">尾页</a>
			</DIV>
			</SPAN>

			

			</TD></TR></TBODY></TABLE></TD>
    <TD width=15 background=imgs/new_023.jpg><IMG 
      src="imgs/new_023.jpg" border=0> </TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
  <TR>
    <TD width=15><IMG src="imgs/new_024.jpg" border=0></TD>
    <TD align=middle width="100%" background=imgs/new_025.jpg 
    height=15></TD>
    <TD width=15><IMG src="imgs/new_026.jpg" 
  border=0></TD></TR></TBODY></TABLE>

</body>
</html>
