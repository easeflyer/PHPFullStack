<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<a href="__URL__/demo/uName/zhangsan">baidu</a>
<br />-------------------------------------<br />
<?php echo ($a+$b); ?>
<br />-------------------------------------<br />
在模板中使用循环<br />
<?php $__FOR_START_1093723988__=0;$__FOR_END_1093723988__=10;for($t=$__FOR_START_1093723988__;$t < $__FOR_END_1093723988__;$t+=1){ echo ($t); ?><br /><?php } ?>
</body>
</html>