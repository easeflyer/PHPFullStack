<<<<<<< HEAD
<?php
$handle = fopen("a.txt","a+");
$str = fread($handle, filesize("a.txt"));
$arr = unserialize($str);
=======
<?php
$handle = fopen("a.txt","a+");
$str = fread($handle, filesize("a.txt"));
$arr = unserialize($str);
>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
print_r($arr);