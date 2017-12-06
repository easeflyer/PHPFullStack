<?php
header("Content-type:text/html;charset=utf-8");
echo "count_files:".count($_FILES)."<br />";

if(array_sum($_FILES["f1"]["size"]) > 0 ){
    echo "有文件上传";
}else{
    echo "无文件上传";
}

print_r($_FILES);

/*
foreach($_FILES as $k => $v){
    echo $k . "::" .$v;
}
*/

?>