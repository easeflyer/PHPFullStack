<?php
header("content-type:text/html;charset=utf8");
// 文章执行页面
$link = mysql_connect("localhost","root","root");
mysql_query("set names utf8");
mysql_select_db("news",$link);


$action = $_GET["action"];
if($action=="insert"){

}elseif($action=="delete"){

}elseif($action=="update"){

}elseif($action=="statics"){
	$aId = $_GET["aId"];
	$sql = "select * from article where aId={$aId}";
	$result = mysql_query($sql);
	
	$rs = mysql_fetch_assoc($result); //当前文章的所有信息；
	
	

	ob_start(); //开启php自带的缓存
	//把静态页面中的内容，拼接成一个字符串 ，输出到文件中--》html文件 生成静态页面
			$str ="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
			$str .="<html xmlns='http://www.w3.org/1999/xhtml'>";
			$str .="<head>";
			$str .="<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
			$str .="<title>无标题文档</title>";
			$str .="</head>";
			$str .="<style type='text/css'>";
			$str .=	"#titles{";
			$str .="		font-size:18px;";
			$str .=	"	line-height:30px;";
			$str .="		font-weight:800;";
			$str .="		text-align:center;";
			$str .="	}";
			$str .="</style>";
			$str .="<body>";
			$str .="<table align='center' border='1' cellpadding='0' cellspacing='0' width='800'>";
			$str .=	"<tr>";
			$str .=	"	<td id='titles' colspan='2'>".$rs["aTitle"]."</td>";
			$str .=	"</tr>";
			$str .="	<tr>";
			$str .="		<td  align='left'>发布时间：".$rs["aDate"]."</td>";
			$str .=	"	<td  align='left'>来源：".$rs["aSource"]."</td>";
			$str .="	</tr>";
			$str .=	"<tr>";
			$str .=	"	<td  colspan='2'>".$rs["aContent"]."</td>";
			$str .="	</tr>";
			$str .="</table>";
			$str .="</body>";
			$str .="</html>";
			echo $str;
	
			// 文件名称  news_3.html  //指定一个静态页面存放的路径
			$fileName = "html/news_"	.$aId.".html";
			// 把 $str 从缓存中取出，ob_get_contents(); 写入文件  file_put_contents("文件名称"，$str);
			file_put_contents($fileName,ob_get_contents()); //内存中的内容写入 文件;
			
			$sql = "update article set aFilePath='{$fileName}' where aId={$aId}";
			mysql_query($sql);
	
	
}

