<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php if(is_array($arr)): foreach($arr as $key=>$val): echo ($val); ?><br /><?php endforeach; endif; ?>
<br />-------------------<br />
<?php if(is_array($brr)): foreach($brr as $key=>$val1): echo ($val1["age"]); ?><br /><?php endforeach; endif; ?>
<br />---------volist遍历一维----------<br />
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; echo ($val); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
<br />---------volist遍历二维----------<br />
<?php if(is_array($brr)): $i = 0; $__LIST__ = $brr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i; echo ($val2["name"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
下面是php代码的输出结果:<br />
<?php $a = 1; $b = 2; $c = $a + $b; echo $c; ?>












</body>
</html>