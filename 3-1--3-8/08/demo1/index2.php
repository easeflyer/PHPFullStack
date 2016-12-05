<?php
$handle = fopen("a.html","a+");
$str = "<div style='color:#ff0000'>zhangsan</div>";
fwrite($handle, $str);
fclose($handle);