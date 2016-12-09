<html>
    <script type="text/javascript" src="ajax.js"></script>
    <body>

        <script>
            //alert(33333333);
            window.onload = function () {
                //alert(3333);
                var bt1 = document.getElementById("bt1");
                var st1 = document.getElementById("st1");
                var dv1 = document.getElementById("dv1");

                bt1.onclick = function () {
                    var st = st1.value;
                    //alert(st);
                    ajax({
                        type: "POST",
                        url: "getJsonDiv.php?rd="+Math.random(),
                        data: "style="+st,
                        success: function (data) {
                            //alert(data);
                            json = JSON.parse(data);
                            dv1.innerHTML = "<" + json.tag + " style='" + json.style + "'>" + json.text + "</" + json.tag + ">";
                        }
                    });
                };
            };
        </script>



        <input type="text"   id="st1" name="style" />
        <input type="button" id="bt1" value="确定" />
        <br />
        <div id="dv1">渲染这里</div>
        
        <p>
        <pre>
            案例要求：
                1 在输入框输入数字 1 / 2 / 3  输入框下面 插入 不同风格的 div 。
                2 要求使用 ajax 实现。
                3 获取数据网址：http://192.168.0.50:8081/10/js/16/ease/getJsonDiv.php
                4 发送参数：style=1 / 2 /3
                5 返回数据为json 格式：{"tag":"div","style":"样式","text":"文本"}
                
           编码要求：
                1 首先实现 index.php 如本页功能。
                2 自己编写 getJsonDiv.php 。使得 index.php 调用本地数据。

           开发思路：
                1 ajax 尝试获得数据 并且 alert 确认。
                2 用 json 解析 获得的数据  还原对象。
                3 利用 对象的 各个属性 拼接成一个 div
                4 innerHTML 插入已有的 div 中
                5 通过事件 获取 text 的 value 然后替换 url 的 style 动态获得 json 数据
        </pre>
    </body>
</html>