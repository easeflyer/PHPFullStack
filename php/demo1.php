<?php
header("Content-Type: text/html; charset=UTF-8");
// 直接返回的响应结果

echo "<h1>你好，这是服务器返回的响应数据。</h1>";



// 下面是增加了简单的处理逻辑，接收 ?msg=你好吗 参数，返回响应。

if (  isset($_GET['msg'])  &&  $_GET['msg'] == "你好吗"  ){
	echo "<h1 style='color:red'>东风 阿帕奇 工作正常，PHP执行正常，我感觉非常好！</h1>";
}


?>


<!--
这部分内容位于 php 标记范围以外。不会被 php 解析器执行。
echo "333";
-->