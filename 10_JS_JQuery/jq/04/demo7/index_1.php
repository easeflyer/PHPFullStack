<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        // 三级联动菜单

        $(function () {
            // 当 1级 菜单 改变时 ajax 调用数据 修改 2级菜单内容
            $("#one").change(function () {
                $.ajax({
                    type: "get",
                    url: "getTwo_1.php?rad=" + Math.random() + "&key=" + $(this).val(), // this 就是 option 记住即可。
                    dataType: "html",
                    success: function (data) {
                        $("#two").html(data);  // 修改二级菜单内容
                    }
                })

            })
            // 当 2级 菜单 改变时 ajax 调用数据 修改 3级菜单内容
            $("#two").change(function () {
                var $key = $("#one").val();
                //console.log($key);
                //console.log( $(this).val() );
                $.ajax({
                    type: "get",
                    // 文件名.php?变量=值&变量1=值&变量3=值
                    url: "getThree_1.php?rad=" + Math.random() + "&key=" + $key + "&key1=" + $(this).val(),
                    dataType: "html",
                    success: function (data) {
                        // 获得的数据是 html option 插入到 select 中
                        $("#three").html(data);
                    }
                })

            })

        })
    </script>
    <body>
        <?php
        $arr = array("key"=>"value");
        
        
        
$class = array(
    "精品男装"=>array(
        "夹克"=>array("七牌","劲霸"),
        "风衣"=>array("红色","绿色")
        ),
    "精品女装"=>array(
        "连衣裙"=>array(),
        "内衣"=>array()),
    "精品童装"=>array(
        "1-3岁"=>array(),
        "4-6岁"=>array()),
    "精品运动装"=>array(
        "上衣"=>array(),
        "下衣"=>array()
        ),
);

        ?>
        
        <select id="one">
            <!-- value = -1 用于 php 后台处理的时候进行判断排除 -->
            <option value="-1">请选择第一级</option>
            <?php
            foreach($class as $key => $value) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                <?php
            }
            ?>
        </select>
        
        
        
        <select id="two">
            <option value="-1">请选择第二级</option>           
        </select>
        
        <select id="three">
            <option value="-1">请选择第三级</option>
        </select>
    </body>
</html>
