<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        //抓取数据类型 书籍分类
        $cat = new Model("cat");
        $rs = $cat->where("cPid=0")->select();
        $this->assign("rs", $rs);
        //读取出版社
        $pub = new Model("pub");
        //读取前4个出版社  四个有图的
        $rs_1 = $pub->limit(0, 4)->select();
        $this->assign("rs_1", $rs_1);
        //读取4个以后的出版社 其余的没有图
        $rs_2 = $pub->limit(4, 10)->select();
        $this->assign("rs_2", $rs_2);
        //读取新书速递中的内容
        // 主类型名称  封面  书名  定价 会员价  书id
        $bo = new Model("books");
        $sql = "select tb.bName,tb.bImg,tb.bMprice,tb.bJDprice,tc.cName from think_books as tb ";
        $sql.= " left join think_cat as tc on tb.bFid=tc.cId and tb.bState=2"; // 状态=2 非推荐  1 是推荐（显示）
        $rs_3 = $bo->query($sql);
        $this->assign("rs_3", $rs_3);
        $this->display();
    }

    function booksList() {

        $cId = $_GET["cId"]; //住类型id
        //读取子类型
        $cat = new Model("cat");
        $rs = $cat->where("cPid={$cId}")->select();
        $this->assign("rs", $rs);
        //该类型对应的书籍也读取出来
        $bo = new Model("books");
        $sql = "select tb.bId,tb.bName,tb.bImg,tb.bAuth,tb.bDate,tb.bMprice,tb.bJDprice,tp.pName from think_books as tb";
        $sql.= " left join think_pub as tp on tb.pId=tp.pId where tb.bFid={$cId}";
        $rs_1 = $bo->query($sql);
        $this->assign("rs_1", $rs_1);
        $this->display();
    }

    function bookDetail() {   //caTmpCode 购物车 产品临时编码
        if ($_COOKIE["caTmpCode"]) {
            $_SESSION["caTmpCode"] = $_COOKIE["caTmpCode"];
        } else {
            setcookie("caTmpCode", time() . rand(1000, 9999), time() + 3 * 24 * 3600);
        }
        // 如果没有cookie 则设置 下面则返回空记录. 购物车为空
        $car = new Model("car");
        $cs = $car->where("caTmpCode='{$_SESSION["caTmpCode"]}'")->count();
        $this->assign("cs", $cs);


        $bId = $_GET["bId"]; // 根据点击的书籍 id  调取书籍详情
        $bo = new Model("books");
        $sql = "select tb.bId,tb.bCode,tb.bName, tb.bAuth, tb.bTrans, tb.bISBN, tb.bDate, 
    				tb.bPcount, tb.bPages, tb.bStyle, tb.bSize,  tb.bMprice, tb.bJDprice, 
    				tb.bImg, tb.bEditor, tb.bCon, tb.bTree,tp.pName,tc.cName as cn,tc1.cName as cn1 from think_books as tb";
        $sql.= " left join think_pub as tp on tb.pId=tp.pId"; //查找出版社
        $sql.= " left join think_cat as tc on tb.bFid=tc.cId"; //查找主类型
        $sql.= " left join think_cat as tc1 on tb.bSid=tc1.cId"; //查找子类型
        $sql.=" where tb.bId={$bId}";
        $rs = $bo->query($sql);
        $this->assign("rs", $rs);

        $this->display();
    }

    function addCar() { //添加到购物车
        //echo $_SESSION["caTmpCode"];
        $car = new Model("car");
        $bId = $_GET["bId"];
        $caCount = $_POST["caCount"]; // 数量
        $sql = "insert into think_car(bId, caCount, caTmpCode) values({$bId},{$caCount},'{$_SESSION["caTmpCode"]}')";
        if ($car->execute($sql)) {
            ?>
            <script type="text/javascript">
                alert("商品已经放入购物车");
                window.history.back(-1);
            </script>
            <?php

            // 成功后回退. 考虑这个步骤应该由 ajax 完成. 避免页面的跳转和刷新.
            exit;
        }
    }

    function myCar() {
        // 有问题. 显示的不是我的购物车.而是购物车所有内容.
        $car = new Model("car");
        $sql = "select tb.bId,tb.bCode,tb.bImg,tb.bName,tb.bJDprice,tca.caCount from think_car as tca";
        $sql.= " left join think_books as tb on tca.bId=tb.bId";
        $sql.= " where tca.caTmpCode={$_SESSION['caTmpCode']}"; //
        //echo $sql;  //ease: 上面修改了 SQL 纠正了 bug 增加了 caTmpCode 的条件.
        $rs = $car->query($sql);
        $this->assign("rs", $rs);
        //计算商品总价格
        $pc = 0;
        foreach ($rs as $key => $val) {
            $pc+= $rs[$key]["bJDprice"] * $rs[$key]["caCount"];
        }

        $this->assign("pc", $pc);
        $this->display();
    }

    function ckLogin() {
        header("content-type:text/html;charset=utf-8");
        //需要你登录了。
        if ($_SESSION["uId"]) {
            //echo "已经登录";  //这是视频原有代码,有误应该修改为跳转
            ?>
            <script type="text/javascript">
                alert("登陆成功");
                window.location = 'editOrderInfo'; //地址和送货信息的填写页面
            </script>
            <?php

        } else {
            ?>
            <script type="text/javascript">
                alert("请登录后结账");
                window.location = "login";
            </script>
            <?php

            exit;
        }
    }

    function login() {
        $this->display();
    }

    function loginCheck() { 
        header("content-type:text/html;charset=utf-8");
        $users = new Model("users");
        $uName = $_POST["uName"];
        $uPwd = $_POST["uPwd"];
        $rs = $users->where("uName='{$uName}'")->find();
        if (count($rs) > 0) {
            //比较密码
            if ($uPwd == $rs["uPwd"]) {
                session("uName", $rs["uName"]);
                session("uId", $rs["uId"]);
                $car = new Model("car");
                $sql = "update think_car set uId=" . $rs["uId"] . " where caTmpCode='{$_SESSION["caTmpCode"]}'";
                $car->execute($sql);
                ?>
                <script type="text/javascript">
                    alert("登陆成功");
                    window.location = 'editOrderInfo'; //地址和送货信息的填写页面
                </script>
                <?php

                exit;
            } else {
                ?>
                <script type="text/javascript">
                    alert("密码不正确");
                    window.location = 'index';
                </script>
                <?php

                exit;
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("用户名不正确");
                window.location = 'index';
            </script>
            <?php

            exit;
        }
    }

    function editOrderInfo() {
        $this->display();
    }

    function state() { //处理中
        //$this->display();
    }

    function success() {
        $fName = $_POST["fName"];
        $fPro = $_POST["fPro"];
        $fCity = $_POST["fCity"];
        $fAddr = $_POST["fAddr"];
        $fTel = $_POST["fTel"];
        $fEmail = $_POST["fEmail"];
        $fPost = $_POST["fPost"];
        $fPay = $_POST["fPay"];
        $uId = $_SESSION["uId"];

        $info = new Model("info");
        $sql = "insert into think_info(fName, fPro, fCity, fAddr, fTel, fEmail, fPost, fPay, uId)";
        $sql.=" values('{$fName}', '{$fPro}', '{$fCity}', '{$fAddr}', '{$fTel}', '{$fEmail}', '{$fPost}', '{$fPay}', {$uId})";
        //$info->execute($sql);
        $orderNum = time() . rand(1000, 9999);
        $this->assign("orderNum", $orderNum);//订单号.
        $this->assign("fPay", $fPay);//付款方式
        $this->display();
    }

}
