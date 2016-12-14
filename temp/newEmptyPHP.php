<html>
    <head>
        <title>dangdang</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery.js" type="text/javascript"></script>
    </head>
    <style type="text/css">
        *{
            margin:0px; padding:0px;
            font-family:"微软雅黑";
            img{border:0px;};
            overflow:hidden;
        }
        a:link{
            text-decoration:none;
        }
        ul{
            list-style: none;
        }
        #dv3lb{
            width:200px;
            height:458px;
            float:left;
            background:#fafafa;
            position:relative;
        }
        #dv3lb ul{width:198px; height:454px;}
        #dv3lb>ul>li{
            font-size:14px;
            width:198px;
            height:26px;
            padding-left:20px;
            line-height:26px;
            border:2px solid #fafafa;
            /*position: relative;*/
        }
        #dv3lb>ul>li.menu{width:198px; height:26px; border:2px solid red; border-right:none; padding-left:20px; line-height:26px;}
        #dv3lb>ul>li>div.menu_1{ width:1000px; height:600px; position:absolute; top:0px; left:200px; background:#ffffff; z-index:10; border:2px solid red;}
        #test1{ width:1000px; height:600px; position:absolute; background:#ffffff; z-index:100; border:2px solid red;}
        #dv3lb>ul>li .mask{ display:none; width:5px; height:26px; background:#fafafa; float:right; margin-right:-5px; position:relative; z-index:15; }
        #dv3lb>ul>li:hover{
            color:#FF0000;
            background:#ffffff; 
            font-size:16px;
        }
        #dv3lb>ul>li:hover>a{
            color:#FF0000;
        }
        #dv3lb>ul>li:hover .mask{
            color:#FFFFFF;
        }
        #dv3lb>ul>li>a{
            color:#323232;
        }
        #dv3lb>ul>li>a:hover{
            text-decoration:underline;
        }
    </style>
    <!--<script type="text/javascript">
        
        $(document).ready(function(){
            $("#dv3ld>ul>li").hover(
      function () {
        $(this).addClass("hide").find().hide();
        $(this).find(".content").show();
      },
      function () {
        $(this).removeClass("hide");
        $(this).find(".content").hide();
      }
    );
            
            
            
            
        })-->



    <!--  $(function () {
    
          $("#dv3lb>ul.left>li").mouseover(function () {
              //$(".tab>ul.header>li.show").addClass("hide").removeClass("show");
              $("#dv3lb li.show").addClass("hide").removeClass("show"); // 只要选择器 唯一即可
              $(this).addClass("show").removeClass("hide");
    
              $id = $(this).prop("id"); // 获得left列表的 id
              $(".content ul.ulShow").addClass("ulHide").removeClass("ulShow");
              $("#" + $id + "_content").addClass("ulShow").removeClass("ulHide");
    
          });
          /*$("#dv3lb").mouseout(function () {
              //$(".content").hide();
              //$("show").removeClass("show").removeClass("ulShow").removeClass("hide").removeClass("ulHide");
              alert(1111);
          });*/
     })-->
    <script type="text/javascript">
        $(function () {
            $("#dv3lb>ul>li").hover(function () {
                //alert(3333);
                //$("#dv3lb>ul>li").removeClass("menu");
                //$("#dv3lb>ul>li").find(".mask").hide();
                $("#dv3lb>ul>li").find(".menu_1").hide();
                $(this).addClass("menu");
                $(this).find(".mask").show();
                //alert($(this).find(".menu_1").is(":visible"));
                $(this).find(".menu_1").show();
                //alert($(this).find(".menu_1").is(":visible"));

            }, function () {
                $("#dv3lb>ul>li").removeClass("menu").addClass("liStyle");
                $("#dv3lb>ul>li").find(".mask").hide();
                $("#dv3lb>ul>li").find(".menu_1").hide();
            });
        });
    </script>
    <body>
        <div id="dv3lb">
            <ul>
                <li class="liStyle"><a href="">图书</a>、<a href="">电子书</a>、<a href="">童书</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">创意文具</a>、<a href="">艺术品拍卖</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">服饰</a>、<a href="">内衣</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">鞋靴</a>、<a href="">箱包</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">运动户外</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">孕</a>、<a href="">婴</a>、<a href="">童</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">家居</a>、<a href="">家纺</a>、<a href="">汽车</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">家具</a>、<a href="">家装</a>、<a href="">康体</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">美妆</a>、<a href="">个人护理</a>、<a href="">成人</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">食品</a>、<a href="">茶酒</a>、<a href="">生鲜</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">腕表</a>、<a href="">珠宝饰品</a>、<a href="">眼镜</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">手机</a>、<a href="">数码</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">电脑办公</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">家用电器</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
                <li class="liStyle"><a href="">当当礼品卡</a>、<a href="">生活服务</a>
                    <div class="mask"></div>
                    <div class="menu_1">苹果  苹果  苹果111111</div>
                </li>
            </ul>
        </div>
        
        <div id="test"></div>
    </body>
</html>