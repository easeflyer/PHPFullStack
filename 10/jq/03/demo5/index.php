<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <style type="text/css">
        div,a{margin:0px;padding:0px;}
        img{border:0px;}
        .imgsBox{
            border:1px solid #ff0000;  /* 红色边框 */
            width:282px;
            height:175px;
            overflow:hidden;   /* 溢出内容处理方式为：隐藏 */
            
        }
        .img a{
            /*display:block;*/
            width:282px;
            height:164px;
        }
        .clickButton{
            background:#999999;
            width:282px;
            height: 11px;
            position:relative;  /* 相对定位 收到文档流顺序的影响，不会漂浮出来 */
            top:-1px;           /* 相对自己的位置 向上移动1个像素 */
        }
        .clickButton div{ float:right;} /* 按钮全部浮动到右侧 */
        .clickButton a{                 /* 数字按钮的样式 */
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
            //1  图片数组 用于切换
            var arryImgs = new Array(
                    "images/01.jpg",
                    "images/02.jpg",
                    "images/03.jpg",
                    "images/04.jpg",
                    "images/05.jpg"
                    );
            //定义一个图片变化的计数器  数组的下标 = times -1
            var times = 1;  // 注意变量的作用域范围
            function changeImage() {  // 修改图片
                if (times == 6) {
                    times = 1;
                }
                $(".clickButton a").removeClass("active"); //删掉所有超链接的active样式		
                //$(".clickButton a:nth-child(" + times + ")").addClass("active");  // 参考 css 手册 了解 a:nth-child() a:eq() 的区别
                $(".clickButton a:eq(" + (times-1) + ")").addClass("active");   // :nth-child从1开始的，而:eq()是从0算起的！
                $(".imgs img").attr("src", arryImgs[times - 1]);
                times++;
            }
            // 保存 interval 用于停止 定时器
            var interval = window.setInterval(function () {   // 参考 js 章节。  参数1 被重复执行的方法， 参数2 间隔时间
                changeImage();
            }, 1500);
            
            
            //实现的是鼠标的悬停效果 遍历所有 a 对象，添加 hover 事件处理。
            $(".clickButton a").each(function (index) {  //each 遍历选中的所有对象 执行 callback 函数。  index 是所有元素的索引
                $(this).hover(function () {
                    $(".clickButton a").removeClass("active");  // 其他a对象都取消 active 
                    $(this).addClass("active");            // 当前事件a对象 增加 active
                    //终止动画
                    clearInterval(interval);
                    $(".imgs img").attr("src", arryImgs[index]);
                    times = index + 1;
                    //alert(times);
                }, function () {                        // 鼠标离开 继续自由切换 图片
                    interval = window.setInterval(function () {
                        changeImage();
                    }, 1500);
                })
            })
        })
    </script>
    <body>
        <div class="imgsBox">
            <!-- 图片部分 -->
            <div class="imgs">
                <a href="#">
                    <img id="pic" src="images/01.jpg" width="282" height="164">
                </a>
            </div>
            <!-- 数字按钮部分 -->
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
