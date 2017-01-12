<?php

if ($_POST) {
    session_start();  // 如果有提交就开启 session 然后调取之前保存的验证码。
    if ($_SESSION['verify'] == $_POST['verify']) {
        echo "验证码输入正确！";
    } else {
        echo "验证码输入有误！";
    }
}
?>

<html>
    <body>
        <form action="" method="post">

            <img src="verify.class.php" onclick="this.src='verify.class.php?r='+Math.random()" /><br />
            请输入验证码<input type="text" name="verify" value="" />
            <input type="submit" value="提交" />
            
        </form>
    </body>
</html>
