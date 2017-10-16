<?php

// 本类由系统自动生成，仅供测试用途
class UsersAction extends Action {

    public function index() {
        header("content-type:text/html;charset=utf-8");
        $this->display();
    }
    // 原来有 addAction
    function addAction() {
        header("content-type:text/html;charset=utf-8");
        import('ORG.Net.UploadFile'); //导入文件上传类包

        // 此部分赋值 是否可以简化? 在其他框架比如 yii 一句搞定 下面有修改的代码。
        $users = new Model("users");
        $uName = $_POST["uName"];
        $uPwd = $_POST["uPwd"];
        $uTel = $_POST["uTel"];
        $uEmail = $_POST["uEmail"];
        $uAddress = $_POST["uAddress"];

        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小,避免过大附件
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型,安全
        $upload->savePath = './Public/Uploads/'; // 设置附件上传目录*****        
        if (!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        } else { // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
            print_r($info);
            $filePath = $upload->savePath . $info[0]["savename"];// 存入数据库
        }

        //数据库中需要保存文件名称和路径。
        $sql = "insert into think_users(uName, uPwd, uTel, uEmail, uPic, uAddress)";
        $sql.=" values('{$uName}', '{$uPwd}', '{$uTel}', '{$uEmail}', '{$filePath}', '{$uAddress}')";
        $users->query($sql);
    }
    // 用 $users->create();  orm 方式改造 把 add1 改为 add 即可
    function add1Action() {
        //header("content-type:text/html;charset=utf-8");
        import('ORG.Net.UploadFile'); //导入文件上传类包

        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小,避免过大附件
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型,安全
        $upload->savePath = './Public/Uploads/'; // 设置附件上传目录*****        
        if (!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        } else { // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
            print_r($info);
            $filePath = $upload->savePath . $info[0]["savename"];// 存入数据库
        }
        $users = new Model("users");
        $users->create(); // 获得所有表单数据

        
        $users->uPic = $filePath;
        $users->add();
    }
    
    
    
    
    function usersList() {
        import('ORG.Util.Page');// 分页工具类

        $users = new Model("users");

        $count = $users->count();  //求记录数
        $Page = new Page($count, 2); // 实例化分页类 传入总记录数和每页显示的记录数 接收p参数
        $show = $Page->show(); //页码 上一页 下一页
        //$Page->firstRow 起始位置
        // $Page->listRows  记录长度
        // limit 查询数据量  提问.
        $rs = $users->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign("rs", $rs);// 数据集
        $this->assign("show", $show);// 分页显示
        $this->display();
    }

    
    function del() {
        header("content-type:text/html;charset=utf-8");

        $uId = $_GET["uId"];
        //删除文件 问题:查看手册 写出更简单可读的删除代码.
        $users = new Model("users");
        $sql = "select uPic from think_users where uId={$uId}";
        $rs = $users->query($sql);
        if (is_file($rs[0]["uPic"])) {
            unlink($rs[0]["uPic"]);
        } else {
            //echo "文件不在";
        }
        $sql_1 = "delete from think_users where uId={$uId}";
        $users->execute($sql_1);
        
    }

    function updateView() {
        //接受前面的id  考虑用 orm 改造,不是 特殊情况提倡使用 orm
        $uId = $_GET["uId"];
        $users = new Model("users");
        $sql = "select *  from think_users where uId={$uId}";
        $rs = $users->query($sql);
        $this->assign("rs", $rs);
        $this->display();
    }

    function updateAction() {
        $users = new Model("users");

        $uId = $_GET["uId"];
        $uName = $_POST["uName"];
        $uPwd = $_POST["uPwd"];
        $uTel = $_POST["uTel"];
        $uEmail = $_POST["uEmail"];
        $uAddress = $_POST["uAddress"];
        $uPic = $_FILES["uPic"]; // 接受图片目的 判断图片有没有修改 $_FILE 所有上传的文件信息见手册

        if (strlen($uPic["name"]) > 0) {  //有图片修改
            import('ORG.Net.UploadFile'); //导入文件上传类包
            $upload = new UploadFile(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->savePath = './Public/Uploads/'; // 设置附件上传目录*****
            if (!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            } else { // 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                print_r($info);
                $filePath = $upload->savePath . $info[0]["savename"];
            }
        } else { //没有图片修改  这部分代码也可以考虑简化
            $sql = "select uPic from think_users where uId={$uId}";
            $rs = $users->query($sql);
            $filePath = $rs[0]["uPic"];
        }
        echo $filePath;

        $sql = "update think_users set uName='{$uName}', uPwd='{$uPwd}', uTel='{$uTel}', uEmail='{$uEmail}', uPic='{$filePath}', uAddress='{$uAddress}' where uId={$uId}";
        //echo $sql;
        $users->execute($sql);
    }

}
