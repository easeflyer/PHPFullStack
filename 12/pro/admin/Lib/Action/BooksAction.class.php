<?php
// 本类由系统自动生成，仅供测试用途
class BooksAction extends Action {
    public function index(){
    	header("content-type:text/html;charset=utf-8");
    	//抓取出版社数据
    	$pub = new Model("pub");
    	$rs = $pub->select();
    	$this->assign("rs",$rs);
    	// 抓取图书的类型
    	$cat = new Model("cat");
    	$rs_1 = $cat->where("cPid=0")->select();
    	$this->assign("rs_1",$rs_1);
    	$this->display();
    }
    function selSon(){
    	//选择子类
    	$bFid = $_GET["bFid"];  //主类型id
    	$cat = new Model("cat");
    	$rs = $cat->where("cPid={$bFid}")->select();
    	$str = "";
    	
    	$str.="<option value='-1'>请选择子类型</option>";
    	foreach($rs as $key=>$val){
    		$str .="<option value='".$val["cId"]."'>".$val["cName"]."</option>";
    	}
    	echo $str;
    }
	function addAction(){
		header("content-type:text/html;charset=utf-8");
		import('ORG.Net.UploadFile');
		$bCode = $_POST["bCode"];
		$bName = $_POST["bName"];
		$bAuth = $_POST["bAuth"];
		$bTrans = $_POST["bTrans"];
		$pId = $_POST["pId"];
		$bISBN = $_POST["bISBN"];
		$bPcount = $_POST["bPcount"];
		$bPages = $_POST["bPages"];
		$bStyle = $_POST["bStyle"];
		$bSize = $_POST["bSize"];
		$bFid = $_POST["bFid"];
		$bSid = $_POST["bSid"];	
		$bMprice = $_POST["bMprice"];
		$bJDprice = $_POST["bJDprice"];
		$bEditor = $_POST["bEditor"];
		$bCon = $_POST["bCon"];
		$bTree = $_POST["bTree"];
		$bEditor = $_POST["bEditor"];
		$bState = 1;
		$bDate = date("Y-m-d");
		
		
		$upload = new UploadFile();// 实例化上传类
	   		$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  'Public/Uploads/books/';// 设置附件上传目录*****
			if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
			}else{	// 上传成功 获取上传文件信息
					$info = $upload->getUploadFileInfo();
					$filePath = $upload->savePath.$info[0]["savename"];
			}
		
		
		$bo = new Model("books");
		$sql = "insert into think_books(";
		$sql.="bCode, bName, bAuth, bTrans, pId, bISBN, bDate, ";
		$sql.="bPcount, bPages, bStyle, bSize, bFid, bSid, bMprice, ";
		$sql.="bJDprice, bImg, bEditor, bCon, bTree, bState)";
		$sql.=" values(";
		$sql.="'{$bCode}','{$bName}', '{$bAuth}', '{$bTrans}', {$pId}, '{$bISBN}', '{$bDate}', ";
		$sql.="{$bPcount}, {$bPages}, '{$bStyle}', {$bSize}, {$bFid}, {$bSid}, '{$bMprice}', ";
		$sql.="'{$bJDprice}', '{$filePath}', '{$bEditor}', '{$bCon}', '{$bTree}', {$bState})";
		$bo->execute($sql);

	}
    function booksList(){
    	$bo = new Model("books");
        // 为什么要左连接？ 应为 books 是主表，其他是从表，数据可以有，可以没有。  cat 被使用了2次，就当两个表处理即可。
    	$sql = "select tb.bId, tb.bName,tb.bAuth,tb.bImg,tb.bMprice,tb.bJDprice,tb.bState,tp.pName,tc.cName as cn,tc1.cName as cn1 from think_books as tb";
    	$sql.=" left join think_pub as tp on tb.pId=tp.pId";
    	$sql.=" left join think_cat as tc on tb.bFid=tc.cId";
    	$sql.=" left join think_cat as tc1 on tb.bSid=tc1.cId";
    	$rs = $bo->query($sql);
    	$this->assign("rs",$rs);    	
    	$this->display();
    }
   function newBooksConf() {  //新书速递 修改 stat字段的值  1==》2    2==》1
        $bo = new Model("books");
        $bId = $_GET["bId"]; //3
        //查找bId =3 书  state  == 1   更新成2     ==2 更新1
        $bState = $_GET["bState"];
        if ($bState == 1) {
            $sql = "update think_books set bState=2 where bId={$bId}";
        } else {
            $sql = "update think_books set bState=1 where bId={$bId}";
        }
        $bo->execute($sql);
    }

    
    // 2017.9.19 补充
    
    function updateView(){
        //接收前面的信息  就是接收前面的Id
        $bId=$_GET["bId"];
        $books=M("books");
        $sql="select * from think_books where bId={$bId}";
        $rs=$books->query($sql);
        //print_r($rs);exit;//获取当前要修改的所有信息，是一个二维数组
        $this->assign("rs",$rs);//放到模板中

        // 所有类型
        $cat=M("cat");
        $sql_1 = "select * from think_cat where cPid=0";
        $rs_1 = $cat->query($sql_1);
         $this->assign("rs_1",$rs_1);
        
        // 子类型
        $sql_3 = "select * from think_cat where cPid=".$rs[0][bFid];
        $rs_3 = $cat->query($sql_3);
        $this->assign("rs_3",$rs_3);
         
         
         
        $pub=M("pub");
        $sql_2="select * from think_pub";
        $rs_2=$pub->query($sql_2);
        $this->assign("rs_2",$rs_2);
        //需要一个模板
        $this->display();
        //接收前面的信息  就是接收前面的Id
         
        
    }
    function updateAction(){
        //实例化   //接收所有值
       $books=M("books");//接收id
       $bId=$_GET["bId"];
       $bCode=$_POST["bCode"];
        $bName=$_POST["bName"];
        $bAuth=$_POST["bAuth"];
        $bTrabs=$_POST["bTrabs"];
        $pId=$_POST["pId"];
        $bISBN=$_POST["bISBN"];
        $bPcount=$_POST["bPcount"];
        $bPages=$_POST["bPages"];
        $bStyle=$_POST["bStyle"];
        $bSize=$_POST["bSize"];
        $bFid=$_POST["bFid"];
        $bSid=$_POST["bSid"];
        
        $bMprice=$_POST["bMprice"];
        $bJDprice=$_POST["bJDprice"];
        $bEditor=$_POST["bEditor"];
        $bCon=$_POST["bCon"];
        $bTree=$_POST["bTree"];
        $bDate=date("Y-m-d");
        $bState=1;
        //接收图片，判断有没有图片去修改
        $bImg = $_FILES["bImg"];
        //echo strlen($uPic["name"]);//strlen:长度   如果图片名字的长度为0 就是没有图片
        if (strlen($bImg["name"]) > 0) {  //有图片修改
            import('ORG.Net.UploadFile'); //导入文件上传类包
            $upload = new UploadFile(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->savePath = './Public/Uploads/books/'; // 设置附件上传目录*****
            if (!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            } else { // 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                //print_r($info);
                $filePath = $upload->savePath . $info[0]["savename"];
            }
        }else{//没有图片修改要把老图的路径拿过来
            $sql = "select bImg from think_books where bId={$bId}";
            $rs = $books->query($sql);
            $filePath = $rs[0]["bImg"];   //$filePath放的是新老图的路径
    }//echo $filePath;
         $sql = "update think_books set ";
         $sql.="bCode='{$bCode}', bName='{$bName}', bAuth='{$bAuth}', bTrabs='{$bTrabs}', pId={$pId}, bISBN='{$bISBN}', bDate='{$bDate}', bPcount={$bPcount}, bPages={$bPages}, bStyle='{$bStyle}', "
        . "bSize={$bSize}, bFid={$bFid},bSid={$bSid}, bMprice='{$bMprice}', bJDprice='{$bJDprice}', bImg='{$filePath}', bEditor='{$bEditor}', bCon='{$bCon}', bTree='{$bTree}', bState={$bState} where bId={$bId} ";
        
    
   $books->execute($sql);
   
}
    
    
    
    
}