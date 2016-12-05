<?php
echo "<br />------------------------<br />";
$flag = "/^\d{4}-\d{2}-\d{2}$/";  
$strs = "2012-02-03"; 
if(preg_match($flag,$strs,$brr)){
	print_r($brr);
}