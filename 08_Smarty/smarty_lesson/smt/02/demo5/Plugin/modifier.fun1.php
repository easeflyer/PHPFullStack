<?php
//字符的大写
function smarty_modifier_fun1($var){ //var 模板中的字符串
	return strtoupper($var);
}