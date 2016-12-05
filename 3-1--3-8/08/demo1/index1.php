<<<<<<< HEAD
<?php
$fileName = "a.txt";
$handle = fopen($fileName,"a+");
//$str = fread($handle, 6);
$num = filesize($fileName);
$str = fread($handle, $num);
echo $str;
fclose($handle);
=======
<?php
$fileName = "a.txt";
$handle = fopen($fileName,"a+");
//$str = fread($handle, 6);
$num = filesize($fileName);
$str = fread($handle, $num);
echo $str;
fclose($handle);
>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
