<?php
//arr 标记属性为下标的数组
//content 双标签之间的内容
//smarty 函数内部可以使用 smarty中函数或方法  $smarty->assign();
//&$repeat  第一次调用 repeat true  第二次调用 repeat false 双标记 第一个标记出现时调用一次。第二个标记出现时调用第二次
function smarty_block_fun3($arr,$content,$smarty,&$repeat){
	//reapeat  true==》!true  false 
	if(!$repeat){ //没到用过 调用if中代码。
                $smarty->assign("a1","smarty_a1"); // $smarty 就是 smarty 对象
            
		$html = "<div style='color:".$arr["color"].";font-size:".$arr["size"]."px'>".$content."</div>";
		return $html;
	}
}