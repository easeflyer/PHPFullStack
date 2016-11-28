<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#bt").click(function () {
                var $dv1 = $("#dv1").children();  // 获得所有 #dv1 的儿子元素，
                //console.log($dv1);
                for (var i = 0; i < $dv1.length; i++) {
                    //  jq-->js对象   var obj = $obj[下标]
                    alert($dv1[i].innerHTML); // 弹出所有 儿子元素包含的 html
                }
            })
            $("#bt1").click(function () {
                var $dv1 = $("#dv1").siblings(); // 获得 #dv1 的所有兄弟（同级）元素
                for (var i = 0; i < $dv1.length; i++) {
                    //  jq-->js对象   var obj = $obj[下标]
                    alert($dv1[i].innerHTML);   // 弹出所有同级元素。 统计元素包含两个 input 没有 innerHTML
                }
            })
        })
    </script>
    <body>
        <input type="button" id="bt" value="点点看" />
        <input type="button" id="bt1" value="siblings" />
        
        <div id="dv1">
            <div id="dv2">ssssss</div>
            <p>aaaa</p>
            <ul>
                <li>1111</li>
                <li>2222</li>
                <li>33333</li>
            </ul>
        </div>
        
        <div id="dv3">ttt</div>
    </body>
    
</html>
