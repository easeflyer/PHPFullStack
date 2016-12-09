<<<<<<< HEAD
<?php
$handle = fopen("a.html","a+");
$str = "<div style='color:#ff0000'>zhangsan</div>";
fwrite($handle, $str);
=======
<?php
$handle = fopen("a.html","a+");
$str = "<div style='color:#ff0000'>zhangsan</div>";
fwrite($handle, $str);
>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
fclose($handle);