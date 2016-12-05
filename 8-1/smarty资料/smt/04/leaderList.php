<?php
include 'config.php';

$sql = "select * from com_leader";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
$pageSize = 10;
$totalPage = ceil($count/$pageSize);


if($_GET["page"]){
	$page = $_GET["page"];
	if($page>$totalPage){$page=$totalPage;}
}else{
	$page=1;
}

$start = ($page-1)*$pageSize;
$sql_1 = "select * from com_leader limit {$start },$pageSize";

$result_1 = mysql_query($sql_1);

$rows = array();
while($rs = mysql_fetch_assoc($result_1)){
	$rows[] = $rs;
}
$st->assign("rows",$rows);
$html= "<a href='leaderList.php?page=1'>首页 </a>";
$html.=" | ";
$html.= "<a href='leaderList.php?page=".($page-1)."'>上一页 </a>";
$html.=" | ";
//前5页 1---10
if($page<=5){	
  for($i=1;$i<=10;$i++){
  	if($i==$totalPage){
  		$html.="<a href='leaderList.php?page={$i}'>[".$i."]</a>";
  		break;
  	}
  	$html.="<a href='leaderList.php?page={$i}'>[".$i."]</a>";
  }
}else{ //>5页面之后的页码
	for($i=$page-4;$i<=$page+5;$i++){
		//注意 如果到最后 仍然要求 10
		/*
		 * if($totlaPage-10 <$i){
		 * 	列出最后10页面
		 * }
		 * 
		 * 
		 * */
			if($i==$totalPage){
		  		$html.="<a href='leaderList.php?page={$i}'>[".$i."]</a>";
		  		break;
		  	}
		$html.="<a href='leaderList.php?page={$i}'>[".$i."]</a>";
	}
}
$html.=" | ";
$html.="<a href='leaderList.php?page=".($page+1)."'>下一页</a>";
$html.=" | ";
$html.="<a href='leaderList.php?page=".($totalPage)."'>尾页</a>";
$st->assign("html",$html);
$st->display("leaderList.html");