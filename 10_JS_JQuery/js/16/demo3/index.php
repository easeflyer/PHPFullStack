<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="ajax1.js"></script>
    </head>
    <script type="text/javascript">
        window.onload = function () {
            var bt1 = document.getElementById("bt1");
            var dv1 = document.getElementById("dv1");
            bt1.onclick = function () {
                //调用ajax包  ajax();  
                var json = {
                    type: "get",
                    url: "a.php?random=" + Math.random(),
                    success: function (data) {  // 回调函数的定义，传递到 ajax() 内部进行处理。
                        alert(data + "***");
                        dv1.innerHTML = data;
                    }
                    /*注意 success 的运行逻辑：
                          function(data) 匿名函数，只是一个函数的定义过程，data 并没有 确定实际内容。和普通参数无异。
                          但是在 ajax() 函数内部，调用了 success(data) 并且把 ajax 返回的数据作为参数传递进去。
                          也就是说 外部定义匿名函数时，我们是知道将来这个函数的用途的。因此函数的设计 就是针对这个用途而设计的。
                        */    
                };
                
                ajax(json);
            };
        };
        
        
        
    </script>
    <body>
        <input type="button" id="bt1" value="测试ajax">
            <div id="dv1">aaaaaaaaa</div>
    </body>
</html>
