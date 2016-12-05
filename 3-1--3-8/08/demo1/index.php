<<<<<<< HEAD
<?php
$fileName = "a.txt";
$handle = fopen($fileName,"w+");  //创建  并且 打开
fwrite($handle,"abcdefghijklmn");
=======
<?php
$fileName = "a.txt";
$handle = fopen($fileName,"w+");  //创建  并且 打开
fwrite($handle,"abcdefghijklmn");
>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
fclose($handle);