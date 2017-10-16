<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/Images/css1/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="7" height="25">图书列表</th>
    </tr>
    <tr>
      <td class="td_bg" width="14%" height="23" align="center">书名</td>
	  <td class="td_bg" width="14%" height="23" align="center">作者</td>
	  <td class="td_bg" width="14%" height="23" align="center">出版社</td>
	  <td class="td_bg" width="14%" height="23" align="center">类型</td>
	  <td class="td_bg" width="14%" height="23" align="center">封面</td>
	   <td class="td_bg" width="14%" height="23" align="center">市场价/京东价</td>
	  <td class="td_bg" width="16%" height="23" align="center">操作</td>
   </tr>
   <?php if(is_array($rs)): foreach($rs as $key=>$val): ?><tr>
      <td class="td_bg" width="14%" height="23" align="center"><?php echo ($val["bName"]); ?></td>
	  <td class="td_bg" width="14%" height="23" align="center"><?php echo ($val["bAuth"]); ?></td>
	  <td class="td_bg" width="14%" height="23" align="center"><?php echo ($val["pName"]); ?></td>
	  <td class="td_bg" width="14%" height="23" align="center"><?php echo ($val["cn"]); ?>>><?php echo ($val["cn1"]); ?></td>
	  <td class="td_bg" width="14%" height="23" align="center"><img src="__ROOT__/<?php echo ($val["bImg"]); ?>" width="60" height="80"></td>
	   <td class="td_bg" width="14%" height="23" align="center"><?php echo ($val["bMprice"]); ?>/<?php echo ($val["bJDprice"]); ?></td>
	  <td class="td_bg" width="16%" height="23" align="center">
	  删除 
	  | 
	  <a href="__URL__/updateView/bId/<?php echo ($val["bId"]); ?>">修改</a>
	  |
	  <?php if($val["bState"] == 1): ?><a href="__URL__/newBooksConf/bId/<?php echo ($val["bId"]); ?>/bState/<?php echo ($val["bState"]); ?>">新书速递</a>
	  <?php else: ?> 
	  <a href="__URL__/newBooksConf/bId/<?php echo ($val["bId"]); ?>/bState/<?php echo ($val["bState"]); ?>">取消新书速递</a><?php endif; ?>
	  |
	  一种注目推荐
	  </td>
   </tr><?php endforeach; endif; ?>
  <tr>
      <th class="bg_tr" style="font-size:14px;" align="center" colspan="7" height="25">page</th>
   </tr>
  </tbody>
</table>

</body>
</html>