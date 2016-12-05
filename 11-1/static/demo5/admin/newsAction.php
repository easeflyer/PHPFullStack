<?php 
header("content-type:text/html;charset=utf-8");
// 接受前一个页面传来的数据，进行处理
$link = mysql_connect("localhost","root","root");
mysql_query("set names utf8");
mysql_select_db("news",$link);
$action = $_GET["action"];
if($action=="insert"){
	// 接受 所有的数据:
	$aTitle = $_POST["aTitle"];
	$aImg = $_FILES["aImg"];
	$aSource = $_POST["aSource"];
	$aContent = $_POST["aContent"];
	$aDate = date("Y-m-d H:i:s");
	
	//执行图片上传
	$aImg = $_FILES["aImg"];
	$extName = end(explode(".", $aImg["name"]));
	//判断文件类型
	if($extName!="jpg" && $extName!="gif"){
		echo "文件类型不对";
		exit;
	}
	//判断图片 大小
	if($aImg["size"]>2000000){
		echo "请调整后上传";
		exit;
	}
	$filePath = "upload/";
	if(!is_dir($filePath)){
		mkdir($filePath);
	}
	$filePath = $filePath.date("Ymd")."/";
	if(!is_dir($filePath)){
		mkdir($filePath);
	}
	$fileName = $filePath.time().rand(1000,9999).".".$extName;	
	 move_uploaded_file($aImg["tmp_name"],$fileName);
	
	 //用php文件操作函数 来实现静态页面的生成了
	 //1读取模板页面  string file_get_contents(url);
	 $str = file_get_contents("tpl/channel-art-details.html");
	$str = str_replace("<!--{aTitle}-->", $aTitle, $str); // 用自己添加的标题 替换掉，模板中标题的表示。
	$str =str_replace("<!--{aDate}-->",$aDate,$str);
	$str =str_replace("<!--{aSource}-->",$aSource,$str);
	$str =str_replace("<!--{aContent}-->",$aContent,$str);
	 $str =str_replace("<!--{aImg}-->",$fileName,$str);
	 
	$html = "html/";
	if(!is_dir($html)){
		mkdir($html);
	}
	$htmlDate = $html.date("Ymd")."/";
	if(!is_dir($htmlDate)){
		mkdir($htmlDate);
	}
	 
	 $staticFileName = $htmlDate.time().rand(10000,99999).".html";
	file_put_contents($staticFileName, $str);
	
	//执行添加的动作 
	$sql ="insert into article(aTitle, aImg, aDate, aContent, aSource,aFilePath) values('{$aTitle}', '{$fileName}', '{$aDate}', '{$aContent}', '{$aSource}','{$staticFileName}')";
	
	mysql_query($sql);
	
	
	
}elseif($action=="delete"){
	
}elseif($action=="update"){
	
}
?>