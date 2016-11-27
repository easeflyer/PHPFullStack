<?php
function js(){
  echo "人品数据";
}
?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>算算你的人品BY我赢职场</title>
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

    <form method="get">
      输入你的姓名来算算你的人品：<br />
      <input type="text" name="name" maxlength="12" class="input" />
      <input type="submit" name="submit" value="我来看看" class="btn" />
      <input type="reset" name="reset" value="还是算了" class="btn" />
    </form>

    <p>程序制作：我赢学员：某某 </p>

    <?php if(  isset($_GET['name']) ) js(); ?>

  </div>
</body>
</html>