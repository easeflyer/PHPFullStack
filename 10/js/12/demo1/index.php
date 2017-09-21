<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <script>
        // JavaScript Document
        function wt(str) {
            document.write("<br />" + str + "<br />");

        }
        window.onload = function () {
            var tb1 = document.getElementById("tb1");
            //alert(tb1.border); //获取 边框的粗细
            tb1.align = "center";  // 位置 居中
            //tb1.width = "500"; // 宽度
            tb1.cellSpacing = "0" // 单元格 间距 
            tb1.setAttribute("width", "1000"); // 重新设置表格宽度。
            alert(tb1.getAttribute("width"));  // 获得表格的宽度
        }
    </script>
    <body>
        <table id="tb1" border="1" width=350>
            <tr>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
            </tr>
            <tr>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
            </tr>
        </table>
    </body>
</html>
