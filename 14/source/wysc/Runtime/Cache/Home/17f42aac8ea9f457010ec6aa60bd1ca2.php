<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>用户登录注册-3C商城</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>

        <link rel="stylesheet" type="text/css" href="__SKIN__css/register.css" />
        <script type="text/javascript">
            // 做登录 验证，在相邻的 td span 标签内，提示输入问题。
            function checkvalue(_obj, _regex, _message) {
                if (_regex == 'require') {
                    if (_obj.value == '') {
                        console.log($(_obj).parent().next('td'));
                        $(_obj).parent().next('td').find('span').html(_message).css('display', 'block'); // 显示错误提示。
                        return false;
                    } else {
                        $(_obj).parent().next('td').find('span').html('').css('display', 'none');
                        return true;
                    }
                } else {
                    // 利用正则 对 输入的数据进行验证。test 是 js 正则表达式的 内部函数见 js
                    if (!_regex.test(_obj.value)) {
                        $(_obj).parent().next('td').find('span').html(_message).css('display', 'block');
                        return false;
                    } else {
                        $(_obj).parent().next('td').find('span').html('').css('display', 'none');
                        return true;
                    }
                }
            }
            // checkvalue _username 是一个用户对象
            function checklogin() {
                var _username = document.getElementById('username');
                var _pwd = document.getElementById('pwd');
                if (checkvalue(_username, 'require', '用户名不能为空') && checkvalue(_pwd, /^.{8,}$/, '密码错误')) {
                    return true;
                } else {
                    return false;
                }
            }
            function checkrepwd(_obj1, _obj2id, _message) {
                var _obj2 = document.getElementById(_obj2id);
                console.log(_obj1.value);
                console.log(_obj2.value);
                if (_obj1.value != _obj2.value) {
                    $(_obj1).parent().next('td').find('span').html(_message).css('display', 'block');
                    return false;
                } else {

                    $(_obj1).parent().next('td').find('span').html('').css('display', 'none');
                    return true;
                }
            }
            function checknull(_obj, _regex, _message) {
                if (_obj.value == '') {
                    return true;
                }
                return checkvalue(_obj, _regex, _message);
            }
            function checkregister() {
                var _username = document.getElementById('username1');
                var _pwd = document.getElementById('pwd1');
                var _confirmpwd = document.getElementById('confirmpwd1');
                var _email = document.getElementById('email');
                var _qq = document.getElementById('qq');
                var _phone = document.getElementById('phone');
                //if (checkvalue(_username, /^.{8,}$/, '密码至少8位') && checkvalue(_pwd, /^.{8,}$/, '密码至少8位') && checkrepwd(_confirmpwd, 'pwd1', '密码与确认密码必须一致') && checkvalue(_email, /^\w+@\w+\.\w+$/, '邮箱格式不正确') && checknull(_qq, /^\d{6,}$/, 'qq格式不正确') && checknull(_phone, /^\d{11}$/, '手机格式不正确')) {
                if (checkvalue(_pwd, /^.{8,}$/, '密码至少8位') && checkrepwd(_confirmpwd, 'pwd1', '密码与确认密码必须一致') && checkvalue(_email, /^\w+@\w+\.\w+$/, '邮箱格式不正确') && checknull(_qq, /^\d{6,}$/, 'qq格式不正确') && checknull(_phone, /^\d{11}$/, '手机格式不正确')) {
                    return true;
                } else {
                    return false;
                }
            }
            var _interval;
            /**
                        *  获取手机验证码
                        *  参数 obj 是 按钮控件对象 用于显示倒计时
                        * @returns {undefined}
                        */
            function getcode(obj) {
                var _url = "<?php echo U('User/getcode');?>";
                var _phone = $('#phone').val();
                if (_phone == '') {
                    alert('请输入手机号');
                    return;
                }
                // 如果 getcode 方法执行成功 则 提示注意查收，并且倒计时60秒
                $.get(_url, {phone: _phone}, function (data) {
                    if (data == 0) { // 发送成功 getcode 方法 返回0
                        alert('短信发送成功,请留意接受');
                        obj.disabled = true;
                        obj.value = "60";
                        _interval = setInterval(changes, 1000); // 倒计时 重新获取
                    }

                })
            }
            // 修改 倒计时 无需关注
            function changes() {
                var _val = $('#btn').val();

                $('#btn').val(_val - 1);
                if ((_val - 1) <= 0) {
                    clearInterval(_interval);
                    $('#btn').val('重新获取');
                    $('#btn').attr('disabled', false);
                }

            }

        </script>
        <style type="text/css">

        </style>
    </head>

    <body>
        <link type="text/css" rel="stylesheet" href="__SKIN__css/reset.css" />
<link type="text/css" rel="stylesheet" href="__SKIN__css/header.css" />
<script type="text/javascript" src="__SKIN__js/jquery-1.7.2.min.js"></script>
<div class="mini-nav">
    <div class="mini-main">
        <div class="fast-nav">
        <?php if($_USER[id]): ?><span 
        <?php if($_USER[sex] == 1): ?>class="usericon1"
        <?php elseif($_USER[sex] == 2): ?>
        class="usericon"
        <?php else: endif; ?>
        >欢迎你:<?php echo ($_USER[username]); ?></span>| <a href="<?php echo U('User/logout');?>">退出登录</a>
        <?php else: ?>
        <a href="<?php echo U('User/login');?>">登录</a> | <a href="<?php echo U('User/register');?>">免费注册</a><?php endif; ?>
            
            | <a href="<?php echo U('User/ucenter');?>">会员中心</a> | <a href="<?php echo U('Shoppingflow/step',array('step'=>'shoppingcar'));?>"> 购物车</a> | <a href="">帮助中心</a>
        </div>
        <div class="date">
            <?php echo ($nowtime); ?>
        </div>
    </div>
</div>
<!--顶部导航结束-->
<div class="wrap">
    <!--头部开始-->
    <div class="header">
        <div class="header-top">
            <h1><a href=""><img src="__SKIN__images/index_03.jpg" /></a></h1>
            <div class="searchform">
                <div class="form">
                    <form name="f1" method="get" action="<?php echo U('Index/search');?>">
                        <input type="text" name="keyword" class="keyword" />
                        <input type="submit" name="s1" value="" class="searchbtn" />
                    </form>
                </div>
            </div>
        </div>
        <div class="nav">
            <div class="allcate">
            </div>
            <!--全部分类：主菜单-->
            <ul class="navigator">
                <?php if(is_array($navdata)): $i = 0; $__LIST__ = $navdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="item"><a href="<?php echo U('Index/lists',array('catid'=>$item[id]));?>"><?php echo ($item[catname]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--头部结束-->

        <div class="main">
            <div class="left">
                <form name="f3" action="<?php echo U('User/login');?>" onsubmit="return checklogin()" method="post">
                    <table class="table-form" border="1" width="100%">
                        <caption><h3>用户登录</h3></caption>
                        <tr>
                            <th>用户名</th>
                            <td width="200">
                                <input type="text" id="username" name="username" class="ipt" onblur="checkvalue(this, 'require', '用户名不能为空')">
                            </td>
                            <td><span class="msg"></span></td>  
                        </tr>
                        <tr>
                            <th>密码</th>
                            <td>
                                <input type="password" id="pwd" name="pwd" class="ipt" onblur="checkvalue(this, /^.{8,}$/, '密码错误')">
                            </td>
                            <td><span class="msg"></span></td> 
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="reset" name="r1" value="清除">
                                        </td>
                                        </tr>
                                        </table>
                                        </form>
                                        </div>
                                        <div class="sep">
                                        </div>
                                        <div class="right">
                                            <form name="f2" action="<?php echo U('User/register');?>" method="post" onsubmit="return checkregister()">
                                                <table class="table-form" border="1" width="100%">
                                                    <caption><h3>用户注册</h3></caption>
                                                    <tr>
                                                        <th>用户名</th>
                                                        <td>
                                                            <input type="text" id="username1" name="username" class="ipt" onblur="checkvalue(this, 'require', '用户名不能为空')">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>密码</th>
                                                        <td>
                                                            <input type="password" id="pwd1" name="pwd" class="ipt" onblur="checkvalue(this, /^.{8,}$/, '密码至少8位')">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>确认密码</th>
                                                        <td>
                                                            <input type="password" id="confirmpwd1" name="confirmpwd" class="ipt" onblur="checkrepwd(this, 'pwd1', '密码与确认密码必须一致')">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>

                                                    <tr>
                                                        <th>性别</th>
                                                        <td>
                                                            <input type="radio" name="sex" checked value="1" />男&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="sex" value="2" />女&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="sex" value="3" />保密</td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>邮箱</th>
                                                        <td>
                                                            <input type="text" id="email" name="email" class="ipt" onblur="checkvalue(this, /^\w+@\w+\.\w+$/, '邮箱格式不正确')">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>出生日期</th>
                                                        <td>
                                                            <input type="text" name="birthday" class="easyui-datebox">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>

                                                    <tr>
                                                        <th>qq</th>
                                                        <td>
                                                            <input type="text" id="qq" name="qq" class="ipt" onblur="checknull(this, /^\d{6,}$/, 'qq格式不正确')">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>phone</th>
                                                        <td>
                                                            <input type="text" id="phone" name="phone" class="ipt" onblur="checknull(this, /^\d{11}$/, '手机格式不正确')"><input type="button" value="获取验证码" onclick="getcode(this)" id="btn" />
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>验证码</th>
                                                        <td>
                                                            <input type="text" class="ipt"  name="mycode"/>
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>提示问题</th>
                                                        <td>
                                                            <input type="text" name="question" class="ipt">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>答案</th>
                                                        <td>
                                                            <input type="text" name="answer" class="ipt">
                                                        </td>
                                                        <td><span class="msg"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <td>
                                                            <input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="reset" name="r1" value="清除">
                                                                    </td>
                                                                    </tr>
                                                                    </table>
                                                                    </form>
                                                                    </div>
                                                                    </div>
                                                                    <div class="footer">
<img src="__SKIN__images/index_77.gif" width="1000" height="282" />
</div>
                                                                    <!--商品列表结束-->
                                                                    </div>
                                                                    </body>

                                                                    </html>