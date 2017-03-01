<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/Images/css1/left_css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="16ACFF">
<table width="98%" border="0" cellpadding="0" cellspacing="0" background="__PUBLIC__/Images/tablemde.jpg">
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#16ACFF"></td>
  </tr>
  <tr>
    <td><TABLE width="97%" 
border=0 align=right cellPadding=0 cellSpacing=0 class=leftframetable>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(1); height=25>系统设置</TD>
              </tr>
            </table>            </TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu1 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="System_Admin.asp" 
            target=main>用户添加</A></TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="Log_Admin.asp" 
            target=main>用户列表</A></TD>
                </TR>
        
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand" onClick="showsubmenu(2);"><span class="STYLE1">文章系统</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu2" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
                <tr>
                  <td width="2%"><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Article/Article_Add.asp" 
            target="main">添加文章</a>┆<a 
            href="include/Make.asp" 
            target="main">生成文章</a></td>
                </tr>
                <tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Article/Article_Manage.asp?action=ListisAccept" 
            target="main">文章管理</a>┆<a 
            href="Article/SetArticle.asp" 
            target="main">批量设置</a></td>
                </tr>
                <tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Article/Article_Class.asp" 
            target="main">栏目管理</a>┆<a 
            href="Article/Article_Class_Add.asp?ClassID=&amp;Action=add" 
            target="main">栏目添加</a> </td>
                </tr>
                <tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Article/Article_Book.asp" 
            target="main">评论管理</a>┆<a href="Class_Templet.asp?ChannelID=1&Type=2" 
            target="main">模板管理</a>  </td>
                </tr>
				<tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a href="Tags_ACT.asp?ChannelID=1"  target="main">Tags管理</a>┆<a href="Article/Article_Manage.asp?action=sh" target="main">文章审核</a></td>
                </tr>
				<tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a href="Article/Article_Manage.asp?action=MyArticle" target="main">我添加的文章</a></td>
                </tr>
                <tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a href="Module_Admin.asp?Action=CusTom&ChannelID=1" 
            target="main">自定义选择管理</a>             </td>
                </tr>
                <tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Article/Admin_Recyle.asp?Type=New" 
            target="main">回收站管理</a> </td>
                </tr>
                <tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="Module_Admin.asp?Action=Set&amp;ChannelID=1" 
            target="main">系统参数设置</a> </td>
                </tr>
				<tr>
                  <td><img src="__PUBLIC__/Images/closed.gif" /></td>
                  <td height="23"><a 
            href="include/make1.asp?Types=Content&RefreshFlag=New&ChannelID=1&TotalNum=50" 
            target="main">生成最新50篇文章</a> </td>
                </tr>
              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(4); 
    height=25>会员系统</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu4 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="User/Point_Log_ACT.asp" 
            target=main>会员点卷日志</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="User/Edays_User.asp" 
            target=main>会员有效期日志</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="User/Money_User.asp" 
            target=main>会员资金日志</A></TD>
                </TR>
				<TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
				  <TD height=23><A href="User/Card_Act.asp?action=Add" 
            target=main>充值卡添加</A>┆ <A href="User/Card_Act.asp" 
            target=main>管理</A></TD>
				  </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="User/Message_Admin.asp" 
            target=main>用户短信管理</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="User/Group_Admin.asp" 
            target=main>用户组管理</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="User/User_Admin.asp" 
            target=main>注册用户管理</A> </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(5); height=25>标签系统</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu5 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="Label_Admin.asp?Type=1" target=main>系统函数标签</A> </TD>
             </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A   href="Label_Admin.asp?Type=2"  target=main>自定义静态标签 </A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(9); height=25>子系统管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu9 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="Sys_Act/Link/ClassLink_Act.asp" target=main>友情链接系统</A> </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_bottom.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#9BC2ED"></td>
  </tr>
  <tr>
    <td height="8">
	
<TABLE class=leftframetable cellSpacing=1 cellPadding=1 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 height=25>系统信息</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD 
      height=105><span class="STYLE2"><IMG src="__PUBLIC__/Images/closed.gif">版权所有：www.codefans.net<br>
              <IMG src="__PUBLIC__/Images/closed.gif">设计制作：mycodes.net<br>
              <IMG src="__PUBLIC__/Images/closed.gif">技术支持：<a href="http://www.codefans.net" target="_blank">mycodes.net</a><br>
              <IMG src="__PUBLIC__/Images/closed.gif">帮助中心：<a href="http://www.codefans.net" target="_blank">mycodes.net</a><br>
            <IMG src="__PUBLIC__/Images/closed.gif">系统版本：1.0</span></TD>
        </TR>
      </TBODY>
    </TABLE>	</td>
  </tr>
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_bottom.jpg"></td>
  </tr>
</table>
</body></html>