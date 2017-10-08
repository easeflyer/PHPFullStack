<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <script type="text/javascript">
            function dw() {
                // 事件调用 write 则覆盖  body 区域 ，只要是 window.onload 之后就会覆盖。
                document.write("我是 dw 函数写入的内容。");
            }
            function dw1() {
                alert(document.getElementById("dv3").innerHTML);
            }
            function dw2() {
                var dv3 = document.getElementById("dv3");
                dv3.innerHTML = "这是重写的内容";
            }
    </script>
    <body>
        <div id="dv1">
            <div id="dv2">aaaaaa</div>
            <div id="dv3">bbb<i>b</i>bbbb</div>
            fjdasfaafsadfsadfssa
            <br />
            <input type="button" onclick="dw()" value="dw" />
            <input type="button" onclick="dw1()" value="弹出dv3" />
            <input type="button" onclick="dw2()" value="重写dv3" />


            8888
        </div>
    </body>
</html>
