<?php

header("content-type:text/html;charset=utf-8");
//连接 数据库
//注册 添加会员的过程
$uName = trim($_POST["uName"]);
// 用户名要求 6-18个字符
$modeun = "/^\w{6,18}$/";   // 匹配6-18 个字符 \w 任意字符
if (preg_match($modeun, $uName, $arr)) {
    
} else {
    echo "用户名格式不正确<br />";
}


$uPwd = $_POST["uPwd"];
echo $uPwd;
$uEmail = $_POST["uEmail"];   // aa@aa.com
// 邮箱要符合格式 [a-zA-Z0-9_]{1,} 至少1个字符 @ 至少2个字符 .
$modeue = "/^[a-zA-Z0-9_]{1,}@[a-zA-Z0-9_]{2,}\\.(com|net|cn|org)$/";   // \\. 和 \. 都是可以的 因为 字符串本身 能识别 \ 为转义
if (preg_match($modeue, $uEmail, $arr)) {
    echo "ok";
} else {
    echo "邮箱格式不正确<br />";
}
$uTel = $_POST["uTel"];
$modeut = "/^\d{11}$/"; //电话  11个数字
if (preg_match($modeut, $uTel, $arr)) {
    echo "ok";
} else {
    echo "手机格式不正确<br />";
}
$uCard = $_POST["uCard"];  // 17位数字 并且以 x 或者 数字结尾 总共18位
$modeut = "/^\d{17}(x|\d)$/"; //身份证

if (preg_match($modeut, $uCard, $arr)) {
    echo "ok";
} else {
    echo "身份证格式不正确<br />";
}
/*
echo $uName;
$uCard = $_POST["uCard"];
echo $uCard;
*/

