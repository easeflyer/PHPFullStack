<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/Images/css1/left_css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="16ACFF">

<table width="91%" border="0" cellpadding="0" cellspacing="0" background="__PUBLIC__/Images/tablemde.jpg">
  <tr>
    <td height="5" background="__PUBLIC__/Images/tableline_top.jpg" bgcolor="#16ACFF"></td>
  </tr>
 <?php if($menuId == 1 ): ?><tr>
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
                  <TD height=23><A href="__APP__/Users/index" target="rightFrame">会员添加</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Users/usersList" target="rightFrame">会员列表</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE>
	
	</td>
  </tr>
<?php elseif($menuId == 2): ?>
	  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(4); 
    height=25>类型管理系统</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu4 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Cat/index" target="rightFrame">类型添加</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Cat/catList" target="rightFrame">类型列表</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE>
	
	</td>
  </tr>
<?php elseif($menuId == 3): ?>
	  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(4); 
    height=25>出版社管理系统</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu4 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Pub/index" target="rightFrame">出版社添加</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Pub/pubList" target="rightFrame">出版社列表</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE>
	
	</td>
  </tr>
<?php elseif($menuId == 4): ?>
	  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(__PUBLIC__/Images/left_tt.gif) no-repeat"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(4); 
    height=25>图书管理系统</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu4 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="2%"><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Books/index" target="rightFrame">图书添加</A> </TD>
                </TR>
                <TR>
                  <TD><IMG src="__PUBLIC__/Images/closed.gif"></TD>
                  <TD height=23><A href="__APP__/Books/booksList" target="rightFrame">图书列表</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE>
	
	</td>
  </tr>

<?php else: endif; ?>

  
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
      height=105><span class="STYLE2"><IMG src="__PUBLIC__/Images/closed.gif">版权所有：www.awt.net<br>
              <IMG src="__PUBLIC__/Images/closed.gif">设计制作：demo.net<br>
              <IMG src="__PUBLIC__/Images/closed.gif">技术支持：<a href="#" target="_blank">demo</a><br>
              <IMG src="__PUBLIC__/Images/closed.gif">帮助中心：<a href="#" target="_blank">demo</a><br>
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