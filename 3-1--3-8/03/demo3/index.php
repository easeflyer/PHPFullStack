<<<<<<< HEAD
<?php
header("content-type:text/html;charset=utf-8");
echo "<br />------------if--------------------<br />";
$wea = "雨天";
if($wea=="晴天"){
	echo "睡觉";
}else if($wea=="雨天"){
	echo "逛街";
}else if($wea=="雪天"){
	echo "兜风";
}else{
	echo "打球";
}

echo "<br />------------switch--------------------<br />";
$wea1 = "雪天";
switch($wea1){
	case "晴天":echo "睡觉";break;
	case "雨天":echo "逛街";break;
	case "雪天":echo "兜风";break;
	default:echo "打球";break;	
}











=======
<?php
header("content-type:text/html;charset=utf-8");
echo "<br />------------if--------------------<br />";
$wea = "雨天";
if($wea=="晴天"){
	echo "睡觉";
}else if($wea=="雨天"){
	echo "逛街";
}else if($wea=="雪天"){
	echo "兜风";
}else{
	echo "打球";
}

echo "<br />------------switch--------------------<br />";
$wea1 = "雪天";
switch($wea1){
	case "晴天":echo "睡觉";break;
	case "雨天":echo "逛街";break;
	case "雪天":echo "兜风";break;
	default:echo "打球";break;	
}











>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
