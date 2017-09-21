<?php
header("content_type:text/html;charset=utf-8");
class BooksAction extends Action{
    public function index(){
        //抓取出版社数据  pub
        $pub=new Model("pub");
        $rs=$pub->select();
        $this->assign("rs",$rs);
        //抓取图书的类型
        $cat=new Model("cat");
        $rs_1=$cat->where("cPid=0")->select();
        $this->assign("rs_1",$rs_1);
        $this->display();
    }
    function selSon(){
        //选择子类的方法
       
        $bFid=$_GET["bFid"];//要根据bFid找出子类
        $cat=new Model("cat");//cPid要等于主类Fid
        $rs=$cat->where("cPid={$bFid}")->select();
        $str="";
        $str.="<option value='-1'>请选择子类型</option>";
        foreach($rs as $key=>$val){
            $str.="<option value='".$val["cId"]."'>".$val["cName"]."</option>";
        }
        echo $str;//选出来后把它加到bSid里（子类）
        
      
    }//图书页面的添加
    function addAction(){
        import('ORG.Net.UploadFile');//导入文件上传类包
        //接收值
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
        
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  'Public/Uploads/books/';// 设置附件上传目录
                             //从根目录下的相对路径
             //保存图片
             if(!$upload->upload()) {// 上传错误提示错误信息
                 $this->error($upload->getErrorMsg());//$this->error:是用来报错的
                 //echo "111";
             }else{// 上传成功 获取上传文件信息
              $info =  $upload->getUploadFileInfo();
             $filePath=$upload->savePath.$info[0]['savename']; //上传路径
             }
        
        //都读出来了就需要入库
        $bo=new Model("books");
        $sql="insert into think_books( ";
        $sql.="bCode, bName, bAuth, bTrabs, pId, bISBN, bDate, bPcount, bPages, bStyle, "
        . "bSize, bFid, bSid, bMprice, bJDprice, bImg, bEditor, bCon, bTree, bState) ";
        $sql.="values( ";
        $sql.="'{$bCode}', '{$bName}', '{$bAuth}', '{$bTrabs}', {$pId}, '{$bISBN}', '{$bDate}', {$bPcount}, {$bPages}, '{$bStyle}', "
        . "{$bSize}, {$bFid},{$bSid}, '{$bMprice}', '{$bJDprice}', '{$filePath}', '{$bEditor}', '{$bCon}', '{$bTree}', {$bState}) ";
        $bo->execute($sql);
        
    }//图书列表
    function booksList(){
        $bo=new Model("books");//因为涉及到了俩个表的字段，所以需要连表查询
        $sql="select tb.bId,tb.bName,tb.bAuth,tb.bImg,tb.bMprice,tb.bJDprice,tb.bState,tp.pName,tc.cName as cn,tc1.cName as cn1 from think_books as tb ";
        $sql.="left join think_pub as tp on tb.pId=tp.pId ";
        $sql.="left join think_cat as tc on tb.bFid=tc.cId ";//第一次是主类型
        $sql.="left join think_cat as tc1 on tb.bSid=tc1.cId ";//子类
        $rs=$bo->query($sql);
        $this->assign("rs",$rs);
         $this->display();
    }
    //改   修改需要一个中间的过渡页
    function updataView(){
        //接收前面的信息  就是接收前面的Id
        $bId=$_GET["bId"];
        $books=M("books");
        $sql="select * from think_books where bId={$bId}";
        $rs=$books->query($sql);
        //print_r($rs);exit;//获取当前要修改的所有信息，是一个二维数组
        $this->assign("rs",$rs);//放到模板中

        $cat=M("cat");
        $sql_1 = "select * from think_cat where cPid=0";
        $rs_1 = $cat->query($sql_1);
         $this->assign("rs_1",$rs_1);
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
//新书速递推荐
function newBooksConf(){//因为推荐state字段的默认不推荐值是1 所以就是1<->2,2<->1;1改2,2改1
    $books=M("books");
    //接收推荐书籍的bId值
    $bId=$_GET["bId"];//如果 id=3
    //查找bId=3的书，如果state=1就改成state=2；那么就需要连库，为了节约空间就把查找state一起写到列表那
    $bState=$_GET["bState"];
    if($bState==1){
        //更新bId=3的字段$bState
        $sql="update think_books set bState=2 where bId={$bId}";//原来不推荐的改为2，让他推荐
    }else{
        $sql="update think_books set bState=1 where bId={$bId}";
    }
    $books->execute($sql);
}
//一种注目推荐和这个一样，先建一个字段
//删
    function del(){
        $bId=$_GET["bId"];
        //echo $uId;
        //得到Id删除文件  图片是根据路径来删除的
        $books=M("books");
        $sql="select bImg from think_books where bId={$bId}";
        $rs=$books->query($sql);
        //print_r($rs);
        //判断文件是否存在
        if(is_file($rs[0]["bImg"])){
           //unlink:函数功能：删除一个文件的目录项并减少它的链接数，若成功则返回0，否则返回-1
            unlink($rs[0]["bImg"]);
            
        }else{
            //echo "文件不存在"; 
        }
        $sql_1="delete from think_books where bId={$bId}";
        $books->execute($sql_1);//大家都知道，thinkphp中execute()和query()方法都可以在参数里直接输入sql语句。但是不同的是execute()通常用来执行insert或update等sql语句，而query常用来执行select等语句。 
                                //execute()方法将返回影响的记录数，如果执行sql的select语句的话，返回的结果将是表的总记录数：
    }
   
    
}
