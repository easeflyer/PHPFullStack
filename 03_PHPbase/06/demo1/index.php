<?php
header("content-type:text/html;charset=utf-8");
echo "<br />---------系统常量------------------<br />";
echo PHP_OS ."<br />";
echo PHP_VERSION ."<br />";
echo PHP_SAPI;
echo "<br />---------自定义常量------------------<br />";
define("UNAME","zhangsan");
//define("UNAME","wangwu");
define("ICP","010001");
define("EMAIL","aa@aa.com");
echo UNAME;
?>
<div><?php echo ICP;?></div>
<?php 
echo "<br />---------魔术常量------------------<br />";
echo __FILE__ ."<br />";


echo __LINE__ ."<br />";
echo __DIR__."DIR<br />";

echo dirname(__FILE__);
?>