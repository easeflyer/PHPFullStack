<?php
//$arr  标记属性构成的数组
// $smarty 函数内部可以使用 smarty中函数或方法  $smarty->assign();
function smarty_function_fun2($arr){
	$html = "<div style='color:".$arr["color"].";font-size:".$arr["size"]."px'>".$arr["content"]."</div>";
	return $html;
}