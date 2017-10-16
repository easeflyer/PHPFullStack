<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<LINK href="css/admin.css" type="text/css" rel="stylesheet">
</head>
<SCRIPT language=javascript>
	function expand(el)
	{
		childObj = document.getElementById("child" + el);

		if (childObj.style.display == 'none')
		{
			childObj.style.display = 'block';
		}
		else
		{
			childObj.style.display = 'none';
		}
		return;
	}
</SCRIPT>

<body>
<TABLE height="470" cellSpacing=0 cellPadding=0 width=170 
background=images/menu_bg.jpg border=0>
  <TR>
    <TD vAlign=top align=middle>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        
        <TR>
          <TD height=10></TD></TR></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
			<TR height=22>
					  <TD style="PADDING-LEFT: 30px" background=images/menu_bt.jpg>
						<A class=menuParent onclick=expand(1) href="javascript:void(0);">类型管理</A>
					</TD>
			</TR>
			<TR height=4>
				  <TD>
				  </TD>
			 </TR>
		 </TABLE>
      <TABLE id=child1 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
			<TR height=20>
				  <TD align=middle width=30><IMG height=9 src="images/menu_icon.gif" width=9></TD>
				  <TD><A class=menuChild href="cgAdd.php"  target=init>主类添加</A></TD>
			</TR>
			<TR height=20>
				  <TD align=middle width=30><IMG height=9 src="images/menu_icon.gif" width=9></TD>
				  <TD><A class=menuChild href="cgList.php"  target=init>主类列表</A></TD>
			</TR>
			<tr>
			  <TD colSpan=2>
			  </TD>
		  </TR>
	</TABLE>
	
	      <TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
			<TR height=22>
					  <TD style="PADDING-LEFT: 30px" background=images/menu_bt.jpg>
						<A class=menuParent onclick=expand(2) href="javascript:void(0);">文章管理</A>
					</TD>
			</TR>
			<TR height=4>
				  <TD>
				  </TD>
			 </TR>
		 </TABLE>
      <TABLE id=child2 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
			<TR height=20>
				  <TD align=middle width=30><IMG height=9 src="images/menu_icon.gif" width=9></TD>
				  <TD><A class=menuChild href="arAdd.php"  target=init>文章添加</A></TD>
			</TR>
			<TR height=20>
				  <TD align=middle width=30><IMG height=9 src="images/menu_icon.gif" width=9></TD>
				  <TD><A class=menuChild href="arList.php"  target=init>文章列表</A></TD>
			</TR>
			<tr>
			  <TD colSpan=2>
			  </TD>
		  </TR>
	</TABLE>

    
      
      
      </TD>
    <TD width=1 bgColor=#d1e6f7></TD></TR></TABLE>
</body>
</html>
