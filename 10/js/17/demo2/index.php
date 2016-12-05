<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <style type="text/css">
    </style>
    <script type="text/javascript">
        /*
         遮罩层 来实现锁屏效果。只保留弹出框 可用，其他元素都被 遮罩层覆盖。
         
         利用  zIndex 1000  1001 来实现。
         
         */
        function sAlert(str) {
            
            //1 创建了遮罩层
            var bgObj = document.createElement("div");
            bgObj.id = "bgDiv";
            bgObj.style.background = "#777"; // 灰色背景
            // 浏览器拉宽 遮罩层大小收到影响。因此还是使用 screen.width 比较好
            //bgObj.style.width=document.body.offsetWidth+"px";
            bgObj.style.width = screen.width + "px";
            // body.offsetHeight 会因为body内容比较少,而无法占满浏览器。
            //bgObj.style.height=document.body.offsetHeight+"px";
            // screen.height  显示器的高度,确保遮罩大小可以覆盖窗口
            bgObj.style.height = screen.height + "px";
            bgObj.style.opacity = "0.5"; // ie9  ff  灰色透明背景0-1
            //ie 6 7 8  bgObj.style.filter = "progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75)";  
            bgObj.style.position = "absolute"; // 绝对定位 避免被其他元素影响位置。
            bgObj.style.top = "0"; // 位置从 左上角算起。
            bgObj.style.left = "0"; // 定位
            bgObj.style.zIndex = 1000; // 高层级，避免被其他元素遮挡。 不影响其他元素
            document.body.appendChild(bgObj);  // 添加了遮罩层。
            
            //创建消息对话框
            var mObj = document.createElement("div");
            mObj.id = "mDiv";
            mObj.style.background = "#ffffff";
            mObj.style.border = "1px solid #ff0000";
            mObj.style.width = "400px";
            mObj.style.height = "100px";
            mObj.style.position = "absolute";
            mObj.style.top = "35%";
            mObj.style.left = "35%";
            mObj.style.zIndex = 1001;  // 消息框 层级高于遮罩层 因此不被覆盖。
            document.body.appendChild(mObj);

            // 添加标题层 就是 h4 部分
            var title = document.createElement("h4");
            title.id = "msgTItle";
            title.align = "right";
            title.style.margin = "0";
            title.style.background = "#ffffff";
            title.innerHTML = str + "关闭";
            title.style.border = "1px solid #00ff00";
            // 添加 onclick 事件处理
            title.onclick = function () {
                document.body.removeChild(bgObj); // 删除 遮罩层。
                mObj.removeChild(title);          // 删除 自己 消息曾
                document.body.removeChild(mObj); // 删除 对话框
            }
            mObj.appendChild(title);
            //放置元素 对话信息框中添加了元素。
            var pInfo = document.createElement("p");
            pInfo.innerHTML = "<input type='text' name='uName'>screen.height:" + screen.height; //表单内容
            mObj.appendChild(pInfo);
        }

    </script>
    <body>
        <a href="http://www.baidu.com">baidu</a>
        <input type="button" value="点击" onclick="sAlert('测试弹出层并且加上锁屏效果')">
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />
            22222222222<br />

    </body>
</html>
