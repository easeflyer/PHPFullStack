<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
    // 菜单的展开和收起效果
        $(function () {
            // .parent 行 点击事件处理
            $("tr.parent").click(function () {
                //alert($(this).attr("id"));
                var $cr = "child_" + $(this).attr("id");  // 拼接出 子节点的 class
                if ($("." + $cr).is(":visible")) {	    // 判断子节点的 显示状态
                    $("." + $cr).hide();
                } else {
                    $("." + $cr).show();
                }
            })
        })
    </script>
    <body>
        <!-- 注意表格 行id 之间的关系 -->
        <table align="center" border="1" cellpadding="0" cellspacing="0" width="70">

            <tr class="parent" id="row_01">
                <td align="center">小说</td>
            </tr>

            <tr class="child_row_01">
                <td align="right">武侠</td>
            </tr>
            <tr class="child_row_01">
                <td align="right">军事</td>
            </tr>



            <tr class="parent" id="row_02">
                <td align="center">青春</td>
            </tr>

            <tr class="child_row_02">
                <td align="right">幽默</td>
            </tr>
            <tr class="child_row_02">
                <td align="right">搞笑</td>
            </tr>
        </table>
    </body>
</html>
