<?php
/**
 * GET POST 传递数据
 * isset 判断变量是否有定义
 * print_r 遍历输出一个变量
 */
if(isset($_GET)){
    print_r($_GET);
}
echo "处理方法：[" . $_GET["act"] . "]";

if(isset($_POST)){
    print_r($_POST);
}

//echo "用户名：".$_POST["userName"];
//echo "城市：".$_POST["city"];
echo "<hr />";
print_r($_REQUEST);

?>





