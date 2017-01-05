<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<LINK href="imgs/Style.css" type=text/css rel=stylesheet>
<LINK href="imgs/Manage.css" type=text/css rel=stylesheet>
</head>

<!--
		这个页面中的 所有 js 都不用理会。 只需要关注 表单。 以及 userAction.php 即可。

-->
<SCRIPT language=javascript src="imgs/FrameDiv.js"></SCRIPT>

<SCRIPT language=javascript src="imgs/Common.js"></SCRIPT>

<SCRIPT language=javascript>
        function selectallbox()
        {
            var list = document.getElementsByName('setlist');
            var listAllValue='';
             if(document.getElementById('checkAll').checked)
             {
                  for(var i=0;i<list.length;i++)
                  {
                    list[i].checked = true;
                    if(listAllValue=='')
                        listAllValue=list[i].value;
                    else
                        listAllValue = listAllValue + ',' + list[i].value;
                  }
                  document.getElementById('boxListValue').value=listAllValue;
             }
             else 
             {
                  for(var i=0;i<list.length;i++)
                  {
                    list[i].checked = false;
                  }
                  document.getElementById('boxListValue').value='';
             }
         } 
    </SCRIPT>

<body>
<SCRIPT type=text/javascript>
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</SCRIPT>

<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
  		<TR>
			<TD width=15><IMG src="imgs/new_019.jpg" border=0></TD>
			<TD width="100%" background=imgs/new_020.jpg height=20></TD>
			<TD width=15><IMG src="imgs/new_021.jpg" border=0></TD>
		</TR>
	</TBODY>
</TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
	  <TR height="400">
			<TD width=15 background=imgs/new_022.jpg><IMG  src="imgs/new_022.jpg" border=0> </TD>
			<TD vAlign=top width="100%" bgColor=#ffffff>
					  <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
						<TR>
						  <TD class=manageHead>当前位置：会员管理 &gt; 会员添加</TD>
						</TR>
						<TR>
						  <TD height=2></TD>
						</TR>
					</TABLE>

					<!--
						表单：最重要的就是向 userAction 发送数据 通过 post 方式
					-->


					<form action="userAction.php?act=add" method="post">
					<table align="center" border="1" cellpadding="0" cellspacing="0" width="80%">
						<tr height="35">
							<td align="right">用户名</td>
							<td><input type="text" name="uName"></td>
						</tr>
						<tr height="35">
							<td align="right">密码</td>
							<td><input type="password" name="uPwd"></td>
						</tr>
						<tr height="35">
							<td align="right">性别</td>
							<td>
								<input type="radio" name="uSex" checked="checked" value="1">男
								<input type="radio" name="uSex" value="2">女
							</td>
						</tr>
						<tr height="35">
							<td align="right">电话</td>
							<td><input type="text" name="uTel"></td>
						</tr>
						<tr height="35">
							<td align="right">邮箱</td>
							<td><input type="text" name="uEmail"></td>
						</tr>
						<tr height="35">
							<td colspan="2" align="center"><input type="submit" value="添加会员"></td>
						</tr>
					</table>
					</form>


			 </TD>
			<TD width=15 background=imgs/new_023.jpg><IMG  src="imgs/new_023.jpg" border=0> </TD>
		</TR>
	</TBODY>
</TABLE>

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
