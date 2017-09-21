<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <style type="text/css">
        /* 定义轮播框个元素的样式 和位置*/
        div,a{margin:0px;padding:0px;}   /* 内外边距都去掉 */
        img{border:0px;}                 /* 图片边框去掉 */
        /* 最外层 div */
        .imgsBox{                     
            border:1px solid #ff0000;
            width:282px;
            height:175px;
            overflow:hidden; /* 溢出部分隐藏 避免因为图片大小带来的问题 */
        }
        .imgs a{        /* 貌似可以去掉 */
            display:block;
            width:282px;
            height:164px;
            
        }
        /* 包含了几个数字按钮 */
        .clickButton{
            background:#999999;
            width:282px;
            height: 11px;
            position:relative;
            top:-1px;
            _top:-5px;  /* 暂存了一个替代值，没有其他用途 */
        }
        /* 几个数字按钮移动到了右侧 */
        .clickButton div{ float:right;}
        .clickButton a{
            background-color: #666666;
            border-left:1px solid #cccccc;
            line-height:11px;
            height:11px;
            font-size:10px;
            float:left;
            padding:0 10px;
            color:#FFFFFF;
            text-decoration:none;
        }
        /*.clickButton a.active 预定义的样式，后边会根据图片 的变化，样式添加到不同的 数字上。*/
        .clickButton a.active, .clickButton a:hover{background-color:#FF0000;}
    </style>
    <script type="text/javascript">
        $(function () {
            //1  图片数组  数组的个数 和 按钮的个数应该一致
            var arryImgs = new Array(
                    "images/01.jpg",
                    "images/02.jpg",
                    "images/03.jpg",
                    "images/04.jpg",
                    "images/05.jpg"
                    );
            //定义一个图片变化的计数器  数组的下标 = times -1

            var times = 1;
            function changeImage() {  // 负责切换图片和 切换数字按钮。
                if (times == 6) {  // 最大值5 times 为什么是从 1-5 因为用的是：nth-child（）选择器：作为第几个孩子 :nth-child从1开始的，而:eq()是从0算起的！
                    times = 1;
                }
                // 切换按钮，切换图片
                $(".clickButton a").removeClass("active"); //初始化：删掉所有超链接的active样式; (".clickButton a") 数字按钮
                $(".clickButton a:nth-child(" + times + ")").addClass("active"); // 注意这里是 times
                // 通过图片数组切换图片
                $(".imgs img").attr("src", arryImgs[times - 1]);                 // 而数字下标是 times-1
                times++;
            }
            
            
            // 注意定时器 interval 定义为全局变量            
            var interval = window.setInterval(function () {  // 每隔1.5秒，调用changeImage(); 不停
                changeImage();
            }, 1500);
            
            
            //实现的是鼠标的悬停效果
            //each 以每一个匹配的元素作为上下文来执行一个函数。
            $(".clickButton a").each(function (index) {  //each 遍历选择其中的所有对象的。 index 是所有元素的索引
                $(this).hover(function () { // 这里的this 就是每一个遍历的对象。
                    $(".clickButton a").removeClass("active");  // 所有的去掉红色
                    $(this).addClass("active");            // 事件对象增加红色 active 定义的
                    //鼠标在按钮上，则终止动画，鼠标移开，动画继续
                    clearInterval(interval);
                    $(".imgs img").attr("src", arryImgs[index]);
                    times = index + 1;
                    //alert(times);
                }, function () { // 鼠标移开 动画继续
                        interval = window.setInterval(function () {
                            changeImage();
                        }, 1500);
                })
            })
            
             // 实现方案2： each 遍历选择其中的所有对象的。 index 是所有元素的索引
             /*
                $(".clickButton a").hover(function () {
                    index = $(this).text() - 1;
                    
                    $(".clickButton a").removeClass("active");  // 所有的去掉红色
                    $(this).addClass("active");            // 事件对象增加红色 active 定义的
                    //鼠标在按钮上，则终止动画，鼠标移开，动画继续
                    clearInterval(interval);
                    $(".imgs img").attr("src", arryImgs[index]);
                    times = index + 1;
                    //alert(times);
                }, function () { // 鼠标移开 动画继续
                    interval = window.setInterval(function () {
                        changeImage();
                    }, 1500);
                })
           */
           
        })
    </script>
    <body>
        
        
        <div class="imgsBox">
            
            
            <!--  滚动图片部分--------------------------------->
            <div class="imgs">
                <a href="#">
                    <img id="pic" src="images/01.jpg" width="282" height="164">
                </a>
            </div>
            
            
            
            <!--  数字按钮部分--------------------------------->
            <div class="clickButton">
                <div>
                    <a class="active" href="">1</a>
                    <a class="" href="">2</a>
                    <a class="" href="">3</a>
                    <a class="" href="">4</a>
                    <a class="" href="">5</a>
                </div>
            </div>
            

        </div>
        
        
    </body>
</html>
