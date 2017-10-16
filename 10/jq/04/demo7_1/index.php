<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        // 三级联动菜单   此案例，还还没有写完。
        $(function () {
            // 当 1级 菜单 改变时 ajax 调用数据 修改 2级菜单内容
            $("#one").change(function () {
                $.ajax({
                    type: "get",
                    url: "getopt.php?rad=" + Math.random() + "&oneId=" + $(this).val(), // this 就是 option 记住即可。
                    dataType: "html",
                    success: function (data) {
                        $("#two").html(data);  // 修改二级菜单内容
                    }
                })

            })
            // 当 2级 菜单 改变时 ajax 调用数据 修改 3级菜单内容
            $("#two").change(function () {
                $.ajax({
                    type: "get",
                    // 文件名.php?变量=值&变量1=值&变量3=值
                    url: "getopt.php?rad=" + Math.random() + "&twoId=" + $(this).val(),
                    dataType: "html",
                    success: function (data) {
                        // 获得的数据是 html option 插入到 select 中
                        $("#three").html(data);
                    }
                })
            });
            $opts = [
                [1,"精品男装"],
                [2,"精品女装"],
                [3,"精品童装"],
                [4,"精品箱包"],
            ];
            for(i=0;i<$opts.length;i++){
                $opt = "<option value=\""+$opts[i][0]+"\">"+$opts[i][1]+"</option>";
                $("#one").append($opt);
            }
            

        })
    </script>
    <body>
        <select id="one">
            <!-- value = -1 用于 php 后台处理的时候进行判断排除 -->
            <option value="-1">请选择第一级</option>
        </select>
        <select id="two">
            <option value="-1">请选择第二级</option>           
        </select>
        <select id="three">
            <option value="-1">请选择第三级</option>
        </select>
    </body>
</html>
