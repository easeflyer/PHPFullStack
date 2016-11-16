<?php
// 本类由系统自动生成，仅供测试用途
class CatAction extends Action {
    public function index(){
    	header("content-type:text/html;charset=utf-8");
		
    	$this->display();
    }
  	function addAction(){
  		$cat = new Model("cat");
  		$cName = $_POST["cName"];
  		//主类型pid=0
  		$sql = "insert into think_cat(cPid,cName,cLevel) values(0,'{$cName}',0)";
  		$cat->query($sql);
  	}
  	function catList(){
  		import('ORG.Util.Page');
  		$cat = new Model("cat");
  		$count = $cat->where("cPid=0")->count();  //求记录数
  		$Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
   		$show = $Page->show(); //页码 上一页 下一页
  		//读取住类型
  		$rs = $cat->where("cPid=0")->limit($Page->firstRow.','.$Page->listRows)->select(); 
  		//由于主类型和子类型将要列到一张页面。对于复杂的表格，建议在action拼接
  		$str = "";
  		foreach($rs as $key=>$val){
  			$str.="<tr>";
		    $str.="  <td class='td_bg' width='14%' height='23' align='center'>".$val["cName"]."</td>";
			$str.="  <td class='td_bg' width='14%' height='23' align='center'>
			<a href='__URL__/del/cId/".$val["cId"]."'>删除</a> | 
			<a href='__URL__/up/cId/".$val["cId"]."'>修改</a> |
			<a href='__URL__/sonAdd/cId/".$val["cId"]."'>子类添加</a>
			</td>";		    
			$str.="  <td class='td_bg' width='14%' height='23' align='center'>";
			//----------------每一主类型，可能都有多个子类型，根据主类型id，找出对应的子类------------------------
			$sql_1 = "select * from think_cat where cPid=".$val["cId"];
			$rs_1 = $cat->query($sql_1);
			
			$str.="  	<table align='center' border='1' cellpadding='0' cellspacing='0' width='100%'>";
			if(count($rs_1)>0){	
					foreach($rs_1 as $k_1 => $v_1){
							$str.="  		<tr>";
							$str.="  				<td width='120'>".$v_1["cName"]."</td>";
							$str.="  				<td>
												<a href='__URL__/sonDel/cId/".$v_1["cId"]."'>删除</a>
												 |
												  <a href='__URL__/sonUp/cId/".$v_1["cId"]."'>修改 </a>
												 </td>";
							$str.="  		</tr>";
						}
			}
			else{
				$str.="<tr><td colspan='2' align='center'>没有子类型</td></tr>";
			}
			$str.="  	</table>";
			//--------------------------------------
			$str.="</td>";					    
		   $str.="</tr>";
  		}
  		$this->assign("str",$str);
  		$this->assign("show",$show);
  		$this->display();
  	}
   function del(){
   		$cId = $_GET["cId"];
   		$cat = new Model("cat");
   		$cat->where("cId={$cId}")->delete();
   }
   function up(){
   		$cId = $_GET["cId"];
   		$cat = new Model("cat");
   		$rs = $cat->field("cName")->where("cId={$cId}")->find();
   		$this->assign("cName",$rs["cName"]);
   		$this->assign("cId",$cId);
   		$this->display();
   }
   function upAction(){
   		$cat = new Model("cat");
   		$cId = $_GET["cId"];
   		
   		$cName = $_POST["cName"];
   		
   		$sql = "update think_cat set cName='{$cName}' where cId={$cId}";
   		
   		$cat->execute($sql);
   		
   }
   function sonAdd(){
   		$cId = $_GET["cId"];
   		$this->assign("cId",$cId);
   		$this->display();
   }
   function sonAddAction(){
   		$cId = $_GET["cId"]; //主类型id
   		$cName = $_POST["cName"];//子类型名称
   		$cat = new Model("cat");
   		$sql = "insert into think_cat(cPid,cName,cLevel) values({$cId},'{$cName}',1)";
   		$cat->execute($sql);
   }
  	
  	
  	
  	
  	
  	
  	
  	
  	
   
}