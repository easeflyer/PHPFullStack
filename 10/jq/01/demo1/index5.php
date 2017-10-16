<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script>
        $(function(){
            //$(":input").css("border","1px solid #ff0000");
            //$(":password").css("border","1px solid #0000ff");
            //$(":disabled").css("border","1px solid #00ff00");
            
            //$(":checked").css("margin-left","20px");
            //alert( $(":checked")[1].value );
        });
        </script>
    </head>
    <body>
        
        <form action="#" method="post" id="frm1">
            姓名<input type="text" id="uname" value="名字在这里输入"  disabled="disabled"><br />
                密码<input type="password" id="up" /><br />
                性别<input type="radio" value="1" disabled="disabled" />男
                <input type="radio" value="2" />女<br />
                爱好
                <input type="checkbox" value="0" />读书
                <input type="checkbox" value="1" checked="checked" />读书1
                <input type="checkbox" value="2" checked="checked" />读书2
                <input type="checkbox" value="3" />读书<br />
                省份<select id="sel">
                    <option value="1">北京</option>
                    <option value="2">上海</option>
                    <option value="3">天津</option>
                    <option value="4">大连</option>
                </select>	</br>
                个人介绍<textarea rows="8" cols="60"></textarea><br />
                <input type="submit" value="提交" />
        </form>        
    </body>
</html>
