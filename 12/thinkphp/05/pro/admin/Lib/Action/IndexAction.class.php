<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        $this->display();
    }

    function checkLogin() {
        header("content-type:text/html;charset=utf-8");
        //验证码:
        $ckNum = $_POST["ckNum"];
        // 验证码错误则 返回 index
        if (md5($ckNum) !== session("verify")) {
            //$this->error("验证码不正确"); 一句即可. 页面可定制 见手册.
            ?>
            <script type="text/javascript">
                alert("验证码不正确");
                window.location = 'index';
            </script>
            <?php

            exit;
        }
        // 取出密码比较
        $ad = new Model("admin");
        $aName = $_POST["aName"];
        $aPwd = $_POST["aPwd"];
        $rs = $ad->where("aName='{$aName}'")->find();
        if (count($rs) > 0) {
            //比较密码
            if ($aPwd == $rs["aPwd"]) {
                session("aName", $rs["aName"]);
                session("aId", $rs["aId"]);
                //$this->success("登陆成功","main"); 即可. 可以定制本页面.
                ?>
                <script type="text/javascript">
                    alert("登陆成功");
                    window.location = 'main';
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

    function exitLogin() {
        header("content-type:text/html;charset=utf-8");
        session(null);//清除session 见手册
        ?>
        <script type="text/javascript">
            alert("退出成功");
            window.location = 'index';
        </script>
        <?php

    }

    function main() {
        $this->display();
    }

    function top() {
        $this->display();
    }

    function left() {
        if ($_GET["menuId"]) {
            $menuId = $_GET["menuId"];
        } else {
            $menuId = 1;
        }
        $this->assign("menuId", $menuId);
        $this->display();
    }

    function right() {
        $this->display();
    }

}
