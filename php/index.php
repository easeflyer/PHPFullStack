<?php
header("Content-Type: text/html; charset=UTF-8");
//---------------------------------------------------------------
// 函数1：根据 $name 计算人品数字
//---------------------------------------------------------------

// strlen(参数) 系统函数 返回字符串的长度
// ord() 函数返回字符串的首个字符的 ASCII 值。（系统内部编码）
function rp($name){
  $a = 0;// 用于 对 $name 的每个字符 累加 ascii 值。
  for($i = 0;$i < strlen($name); $i++){
    $a = $a + ord($name[$i]);
  }
  $a = ($a * 47 + 70) % 100; // 为得到一个肯定大于100的数字 然后取余数。
  return $a;
}


//---------------------------------------------------------------
// 函数2： 根据 人品数字 $shuzi 显示 对应的评语。
//---------------------------------------------------------------

function getValue($shuzi){
  if ($shuzi== 0) {
    return "你一定不是人吧？怎么一点人品都没有？！";
  } else if ( $shuzi > 0  && $shuzi <= 5 ) {
    return  "算了，跟你没什么人品好谈的...";
  } else if ( $shuzi > 5 && $shuzi <= 10 ) {
    return "是我不好...不应该跟你谈人品问题的...";
  } else if ( $shuzi > 10 && $shuzi <= 15 ) {
    return "杀过人没有?放过火没有?你应该无恶不做吧?";
  } else if ( $shuzi > 15 && $shuzi <= 20 ) {
    return "你貌似应该三岁就偷隔壁大妈家的鸡蛋吧...";
  } else if ( $shuzi > 20 && $shuzi <= 25 ) {
    return "你的人品之低下实在让人惊讶啊...";
  } else if ( $shuzi > 25 && $shuzi <= 30 ) {
    return "你的人品太差了。你应该有干坏事的嗜好吧?";
  } else if ( $shuzi > 30 && $shuzi <= 35 ) {
    return "你的人品真差!肯定经常做偷鸡摸狗的事...";
  } else if ( $shuzi > 35 && $shuzi <= 40 ) {
    return "你拥有如此差的人品请经常祈求佛祖保佑你吧...";
  } else if ( $shuzi > 40 && $shuzi <= 45 ) {
    return "老实交待..那些论坛上面经常出现的偷拍照是不是你的杰作?";
  } else if ( $shuzi > 45 && $shuzi <= 50 ) {
    return "你随地大小便之类的事没少干吧?";
  } else if ( $shuzi > 50 && $shuzi <= 55 ) {
    return "你的人品太差了..稍不小心就会去干坏事了吧?";
  } else if ( $shuzi > 55 && $shuzi <= 60 ) {
    return "你的人品很差了..要时刻克制住做坏事的冲动哦..";
  } else if ( $shuzi > 60 && $shuzi <= 65 ) {
    return "你的人品比较差了..要好好的约束自己啊..";
  } else if ( $shuzi > 65 && $shuzi <= 70 ) {
    return "你的人品勉勉强强..要自己好自为之..";
  } else if ( $shuzi > 70 && $shuzi <= 75 ) {
    return "有你这样的人品算是不错了..";
  } else if ( $shuzi > 75 && $shuzi <= 80 ) {
    return "你有较好的人品..继续保持..";
  } else if ( $shuzi > 80 && $shuzi <= 85 ) {
    return "你的人品不错..应该一表人才吧?";
  } else if ( $shuzi > 85 && $shuzi <= 90 ) {
    return "你的人品真好..做好事应该是你的爱好吧..";
  } else if ( $shuzi > 90 && $shuzi <= 95 ) {
    return "你的人品太好了..你就是当代活雷锋啊...";
  } else if ( $shuzi > 95 && $shuzi <= 99 ) {
    return "你是世人的榜样！";
  } else if ( $shuzi == 100 ) {
    return "天啦！你不是人！你是神！！！";
  } else {
    return "你的人品竟然负溢出了...我对你无语..";
  }
}

//---------------------------------------------------------------
// 函数3：接收用户输入，发送响应结果 
//---------------------------------------------------------------
function js(){

  // 接收用户的输入

  $name = $_GET['name']; 

  if($name=="高富帅"){    //此处可以换上你的名字~你懂得~O(∩_∩)O~
    $rp = 100;
  }else{
    $rp = rp( $name );
  }

  // 发送响应结果

  echo "你的大名是：<font color=red>" . $name . "</font><br />";
  echo $name . "的得分是：<font color=blue>" . $rp . "</font><br />";
  echo "<h2>". getValue($rp) . "</h2>";

}

//---------------------------------------------------------------
// 以下为 HTML 表单部分，用于提供用户输入页面的结构。
//---------------------------------------------------------------
?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>算算你的人品BY普弘</title>
  <style type="text/css">
     /* css 层叠样式表 用于设置页面显示样式 */
    .btn{background:#fff; color:#005681;border-width:1px;padding-left:15px;padding-right:15px;vertical-align:middle}
    .input{border:solid 1px #B6D9E3;padding:2px 0px 2px 1px;font-size:1.0em;vertical-align:middle}
    form{text-align: center}
    body{text-align: center;line-height: 24px}
    div{border:1px solid #FFAABB;background-color:#FFEEEE;padding:20px;width:500px;height:400px;}
    h2{color:blue;line-height: 36px}

  </style>
</head>

<body>

  <div>

      <form method="get" action="">
      输入你的姓名来算算你的人品：<br />
      <input type="text" name="name" maxlength="12" class="input" />
      <input type="submit" name="submit" value="我来看看" class="btn" />
      <input type="reset" name="reset" value="还是算了" class="btn" />
    </form>

    <p>程序制作：普弘学员：某某 </p>
------------------------------------------------------------<br />
    <?php if(  isset($_GET['name']) ) js(); ?>

  </div>
</body>
</html>





















