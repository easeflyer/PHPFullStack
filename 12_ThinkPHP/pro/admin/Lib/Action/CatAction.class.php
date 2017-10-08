<?php

// 本类由系统自动生成，仅供测试用途
class CatAction extends Action {

    public function index() {
        header("content-type:text/html;charset=utf-8");

        $this->display(); //显示添加表单.
    }

    function addAction() {
        $cat = new Model("cat");
        $cName = $_POST["cName"];
        //主类型pid=0  大家首先用 sql 的方法去实现,如果有时间,可以参考手册用 orm的方法实现
        $sql = "insert into think_cat(cPid,cName,cLevel) values(0,'{$cName}',0)";
        $cat->query($sql);
    }

    /**
     *  在 catList 里面 根据主类型数据。 渲染了多行。然后在模板中 直接显示即可。
     *  子类型，用嵌套循环查询出来 渲染成一个单独的表格。
     */
    
    function catList() {
        import('ORG.Util.Page'); // 分页类
        $cat = new Model("cat");
        $count = $cat->where("cPid=0")->count();  //求记录数 cPid=0 一级分类
        $Page = new Page($count, 2); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); //页码 上一页 下一页
        //读取住类型 一级分类
        $rs = $cat->where("cPid=0")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        //由于主类型和子类型将要列到一张页面。对于复杂的表格，建议在action拼接
        $str = ""; // 用于构造 列表表格
        foreach ($rs as $key => $val) {
            $str.="<tr>";
            $str.="  <td class='td_bg' width='14%' height='23' align='center'>" . $val["cName"] . "</td>";
            $str.="  <td class='td_bg' width='14%' height='23' align='center'>
			<a href='__URL__/del/cId/" . $val["cId"] . "'>删除</a> | 
			<a href='__URL__/up/cId/" . $val["cId"] . "'>修改</a> |
			<a href='__URL__/sonAdd/cId/" . $val["cId"] . "'>子类添加</a>
			</td>";
            $str.="  <td class='td_bg' width='14%' height='23' align='center'>";
            
            
            //----------------每一主类型，可能都有多个子类型，根据主类型id，找出对应的子类------------------------
            // ease: 这里 进行了若干循环查询,如果分类复杂,将大大降低效率,尤其是修改分类后.修改前有缓存
            
            
            $sql_1 = "select * from think_cat where cPid=" . $val["cId"];  // $val['cId'] 主类型
            $rs_1 = $cat->query($sql_1);

            $str.="<table align='center' border='1' cellpadding='0' cellspacing='0' width='100%'>";
            if (count($rs_1) > 0) {
                foreach ($rs_1 as $k_1 => $v_1) {
                    $str.="<tr>";
                    $str.="<td width='120'>" . $v_1["cName"] . "</td>";
                    // 下面 修改以前使用的是 sonUp 修改为 up 因为 cat 模块只有 up 方法
                    $str.="<td><!--下面可以暂时留空-->
				<a href='__URL__/sonDel/cId/" . $v_1["cId"] . "'>删除</a>
				 |
				  <a href='__URL__/up/cId/" . $v_1["cId"] . "'>修改 </a>
				</td>";
                    $str.="</tr>";
                }
            } else {
                $str.="<tr><td colspan='2' align='center'>没有子类型</td></tr>";
            }
            $str.="</table>";
            //--------------------------------------
            $str.="</td>";
            $str.="</tr>";
            
        }
        $this->assign("str", $str);
        $this->assign("show", $show);
        $this->display();
    }

    function del() {
        $cId = $_GET["cId"];
        $cat = new Model("cat");
        $cat->where("cId={$cId}")->delete();
    }
    /**
     * 修改 主类，子类
     */
    function up() {
        $cId = $_GET["cId"];
        $cat = new Model("cat");
        $rs = $cat->field("cName")->where("cId={$cId}")->find();
        $this->assign("cName", $rs["cName"]);
        $this->assign("cId", $cId);
        $this->display();
    }

    function upAction() {
        $cat = new Model("cat");
        $cId = $_GET["cId"];

        $cName = $_POST["cName"];

        $sql = "update think_cat set cName='{$cName}' where cId={$cId}";

        $cat->execute($sql);
    }
    /**
     * 点击链接：__URL__/sonAdd/cId/5  访问本方法
     */
    function sonAdd() {
        $cId = $_GET["cId"];
        $this->assign("cId", $cId);
        $this->display();
    }
    /**
     * 根据 主类id 和 子类名称，新建子类
     */
    function sonAddAction() {
        $cId = $_GET["cId"]; //主类型id
        $cName = $_POST["cName"]; //子类型名称
        $cat = new Model("cat");
        $sql = "insert into think_cat(cPid,cName,cLevel) values({$cId},'{$cName}',1)";
        $cat->execute($sql);
    }

}
