<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
            // 选中的是第二个儿子，以及每个儿子的第二个孙子  :nth-child(2) 代表的就是第二个孩子，所以只要有这个属性的元素会被选中
            // 中间是 空格分隔 因此 包含儿子和孙子 只要满足 :nth-child(2) 即可
            $("div.one :nth-child(2)").css("background","#ff0000");
            
            //$(".one").css("background");
            
            // 选择 div.one 下面的所有 奇数子元素 同样 中间是 空格 因此包含儿子和孙子
            //$("div.one  :nth-child(odd)").css("background","#ff0000");
            
            //选中的是第一个儿子，以及每个儿子的第一个孙子
            //$("div.one :first-child").css("background","#ff0000");
            
            //选择的是只有唯一的儿子的元素 ，以及 儿子有唯一孙子的元素
            //$("div.one :only-child").css("background", "#00ff00");

            //选择 3的倍数为序号的孩子
            //$("div.one :nth-child(3n)").css("background","#ff0000");
        });
    </script>
    
    <body>
        <div class="one">
            <ul>
                <li>aaaaaaaaaa</li>
                <li>bbbbbbbbb</li>
                <li>bbbbbbbbb</li>
            </ul>
            <ul>
                <li>cccccccc</li>
                <li>ddddddddd</li>
            </ul>
        </div>
        
        <div class="one">
            <ul>
                <li>eeeeeeeeee</li>
                <li>ffffffffff</li>
            </ul>
        </div>
        
        <div class="one">
            <ul>
                <li>aaaaaaaaaa</li>
            </ul>
            <ul>
                <li>cccccccc</li>
                <li>ddddddddd</li>
            </ul>
        </div>
        
    </body>
</html>
