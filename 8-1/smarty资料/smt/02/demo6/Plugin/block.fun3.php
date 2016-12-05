<?php
//arr 标记属性的数组
//content 标记的内容
//smarty 函数内部可以使用 smarty中函数或方法  $smarty->assign();
//&$repeat  第一次调用 repeat true  第二次调用 repeat false
function smarty_block_fun3($arr,$content,$smarty,&$repeat){
	//reapeat  true==》!true  false 
	if(!$repeat){ //没到用过 调用if中代码。
		$html = "<div style='color:".$arr["color"].";font-size:".$arr["size"]."px'>".$content."</div>";
		return $html;
	}
}