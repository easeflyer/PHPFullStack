<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <style type="text/css">
        body{
            font-size:12px;
            margin:0px;
            padding:0px;
        }
        #dv{
            background: #ffaa33;
            width: 500px;

        }
        ul{list-style: none;height: 120px;}
        ul li{
            float: left;
            width: 150px;
            line-height: 25px;
        }
        .showmore{
            background: #00aaFF;
            margin: auto;
            text-align: center;
            width: 120px;
            line-height:25px;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            var $category = $("ul li:gt(5):not(:last)"); //category:种类，品牌， 获得索引值大于5的品牌集合对象(除最后一条)
            $category.hide();
            var $toggleBtn = $("div.showmore>a");
            $toggleBtn.click(function () {
                if ($category.is(":visible")) {
                    $category.hide(); //  隐藏$category
                    $(".showmore a span").text("更多");
                }else{
                    $category.show();
                    $(".showmore a span").text("收起");
                }
            });


        });
    </script>
    <body>
        <div id="dv">
            <ul>
                <li>草莓</li>
                <li>葡萄</li>
                <li>红提</li>
                <li>马奶子</li>
                <li>蜜柑</li>
                <li>甜橙</li>
                <li>西柚</li>
                <li>柠檬</li>
                <li>蟠桃</li>
                <li>水蜜桃</li>
                <li>李子</li>
                <li>樱桃</li>
                <li>荔枝</li>
                <li>哈密瓜</li>
                <li>其他水果</li>


            </ul>
            <div class="showmore">
                <a href="#"><span>更多</span></a>

            </div>

        </div>
    </body>
</html>