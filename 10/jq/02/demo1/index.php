<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
/*
 * 首先看下代码的执行结果。
 * 功能是： 点击 append 添加元素，点击 remove 删除元素
 */

        $(document).ready(function () {
            // 添加按钮 点击事件
            $("#ap").click(function () {
                // 定义两列
                var $td1 = $("<td>1111111111</td>");
                var $td2 = $("<td>2222222222</td>");
                // 定义一行
                var $tr = $("<tr></tr>");
                // 添加列
                $tr.append($td1);
                $tr.append($td2);
                // 给表格添加行
                $("#tb1").append($tr);
            })
            // 删除按钮 点击事件
            $("#rm").click(function () {
                //求要删除元素的 索引 下标: 就是所有 tr 数量 - 1，也就是最后一行
                $len = $("#tb1 tr").length - 1;
                $("#tb1 tr:eq(" + $len + ")").remove(); // tr:eq(n) 索引为 n 的 tr 元素
            })
        })
    </script>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" border="1" id="tb1">
            <tr>
                <td><input type="button" value="append" id="ap"></td>
                <td><input type="button" value="romove" id="rm"></td>
            </tr>
            <tr>
                <td>11111</td>
                <td>22222</td>
            </tr>
        </table>
    </body>
</html>
