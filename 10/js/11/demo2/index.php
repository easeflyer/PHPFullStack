<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <script type="text/javascript">
        // 为什么是 onload 执行。因为事件绑定 依赖页面元素加载完毕。
        window.onload = function () {
            var bt = document.getElementById("bt");
            bt.onclick = function () {
                //getElementById
                var ds = document.getElementsByClassName("ds"); // 获得所有符合的元素集合。
                //document.write("ds[0]:"+ds[0].innerHTML);
                alert(ds.length);
                var ns = document.getElementsByName("aa"); // 获得集合
                var dv1 = document.getElementById("dv1");
                document.write(dv1.innerHTML); //打印dv1中的内容
                

            }
            //innerHTML 
            var bt1 = document.getElementById("bt1");
            bt1.onclick = function () {
                // 这里也是直接调用的。
                dv1.innerHTML = "我是在dv1插入的内容";
                dv2.innerHTML = "333";
            }
            //getElementsByTagName
            var bt2 = document.getElementById("bt2");
            bt2.onclick = function () {
                var dvs = document.getElementsByTagName("div"); //获取页面上所有的div 下标从0开始
                for (var i = 0; i < dvs.length; i++) {
                    alert(dvs[i].innerHTML);
                }
            }
        }
    </script>
    <body>
        
        <input type="button" value="bt" id="bt" />
        <input type="button" value="bt1" id="bt1" />
        <input type="button" value="bt2" id="bt2" />
        <div id="dv1" class="ds">dv1:aaaaaaaaaaaa</div>
        <div id="dv2" class="ds">dv2:bbbbbbbbbbbb</div>
        <div id="dv3" class="ds">dv3:cccccccc</div>
        <input type="text" name="aa" />
        <input type="text" name="aa" />
        <input type="text" name="aa" />
        <input type="text" name="aa" />
        
    </body>
</html>
