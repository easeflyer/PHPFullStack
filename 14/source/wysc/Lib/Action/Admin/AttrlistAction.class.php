<?php

class AttrlistAction extends Action {

    /**
     * 用于给某个模型添加一个新的属性。
     * 由管理属性列表 manageattrlist 点击“添加商品属性” 访问本方法。并且传递 模型id attrid ( goodattr 的 id)
     */
    function addattrlist() {
        // 如果有提交 则添加这个模型的 新增属性
        if ($_POST) {
            $model = new AttrlistModel();
            if (!$model->create()) {
                $message = $model->getError();
                $this->error($message);
            } else {
                if ($model->add()) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            }
        // 如果没有提交 就显示 表单，由manageattrlist 方法 传递来了 属性模型的 id
        // 表单 对应 attrlist 各字段
        } else {
            $attrid = (int) $_GET['attrid'];
            $this->assign('attrid', $attrid);
            $this->display();
        }
    }

    /**
     * 函数说明：
     * m=Goodattr&a=managegoodattr 中点击 管理属性列表，传递模型id （goodattr 表的id）
     * manageattrlist()本函数接收 模型id  输出模型 所有属性列表
     * 利用 createinput 构建了 preview 列用于预览输出，其他列正常输出即可
     * 
     */
    function manageattrlist() {
        $attrid = (int) $_GET['id'];  // 属性模型id  图书，服装，数码
        $this->assign('attrid', $attrid);
        
        $model = M('Goodattr');     // 实例化属性模型表
        $data = $model->find($attrid); // 属性模型 数据
        $attrname = $data[attrname]; // 类型名称：图书，服装，数码等
        
        $attrlistmodel = new AttrlistModel();
        $attrlist1 = $attrlistmodel->where("goodattr_id='$attrid'")->select();  // 通过 attrid  获得这个属性模型的所有属性 (每个属性 对应一个输入控件)
        $attrlist = array(); // 多一个 preview 列而已 由 createinput 构建
        
        // 循环的过程就是给 每个 $val 增加一个 preview 列，然后重新赋值给新的array attrlist
        foreach ($attrlist1 as $val) {
            // 增加了一个 preview 列 由 createinput 构建，其他数据另存到 attrlist 数组
            $val[preview] = $this->createinput($val[id], $val[inputname]);  
            $attrlist[] = $val;
        }
        $this->assign('attrlist', $attrlist);  // 属性列表
        $this->assign('attrname', $attrname);  //属性类型名称
        $this->display();
        //-------------
    }
    /**
     *  用于创建 属性录入的 表单 控件。 根据 属性控件的id $attrlistid 以及  inputtype 渲染控件 用参数 $val 填充值 $name 填充 控件的 name 属性
     *  html表单控件的 name属性 =  此方法的 $name参数
     *  在 getlist 方法中 $name = attrlist[' . $value[id] . '] 也就是 属性[n] 因为一个属性 可能会有多选值。 ？？？
     * 
     * @param type $attrlistid 属性名称
     * @param type $name
     * @param type $val
     * @return string
     */
    function createinput($attrlistid, $name = '', $val = '') {
        /**
         *  input 当前属性row
         *  $optionlist 如果是 可选值 则读取可选值列表
         * inputtype = 1 输入框
         * inputtype = 2 单选
         * inputtype = 3 多选
         * 
         */
        
        // 首先获得 某个具体的属性 根据 $attrlistid 一个属性 对应一个 html控件类型 因此可以用本函数渲染成具体的 html 控件
        $attrlistmodel = new AttrlistModel();
        $input = $attrlistmodel->find($attrlistid);
        
        // 然后根据 inputtype 渲染成 具体的 html 控件，如果有传递进来 $val 则控件同时显示 属性的值
        if ($input[inputtype] == 1) {
            return '<input type="text" name="' . $name . '" class="ipt" value=' . $val . '>';
        }
        // 如果是 单选框 则遍历 optionlist 渲染单选框
        if ($input[inputtype] == 2) {

            $optionlist = $input[optionlist];
            //在linux中文本的换行符为\r，而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist); // 把列表 变为数组
            $ret = '';
            $i = 0;
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if ($val == '') {
                    if ($i == 0) { // 默认选中第一个
                        $ret.="<input type='radio' name='$name' value='$option' checked=true>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    } else {
                        $ret.="<input type='radio' name='$name' value='$option'>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    }
                } else {
                    if ($val == $option) { // 如果有 val 那么根据情况选中
                        $ret.="<input type='radio' name='$name' value='$option' checked=true>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    } else {
                        $ret.="<input type='radio' name='$name' value='$option'>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                    }
                }
                $i++;
            }
            return $ret;
        }
        // 如果是 单选框 则遍历 optionlist 渲染单选框
        if ($input[inputtype] == 3) { // 如果是多选则 使用 checkbox 构建 preview
            $optionlist = $input[optionlist];
            //在linux中文本的换行符为\r，而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist);
            $ret = '';
            $val = json_decode($val);
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if (in_array($option, $val)) {
                    // 注意后面的[] 因为是多选框因此 post 出去的参数应该是一个数组
                    $ret.="<input type='checkbox' name='" . $name . "[]' value='$option' checked>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                } else {
                    $ret.="<input type='checkbox' name='" . $name . "[]' value='$option'>&nbsp;&nbsp;$option&nbsp;&nbsp;";
                }
            }
            return $ret;
        }
    }

    function edit() {
        $attrlistmodel = new AttrlistModel();
        if ($_POST) {
            if (!$attrlistmodel->create()) {
                $message = $attrlistmodel->getError();
                $this->error($message);
            } else {
                if ($attrlistmodel->save()) {
                    $this->success('编辑成功');
                } else {
                    $this->error('编辑失败');
                }
            }
        } else {
            $id = (int) $_GET[id];
            $data = $attrlistmodel->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function del() {
        $id = (int) $_GET[id];
        $model = new AttrlistModel();
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }
    /**
     *  goods 模块的 add.html 模板 getattrlist js 函数通过 ajax 调用本方法
     *  然后 通过 appendTo 添加到 表单中。
     */
    function getlist() {
        $attr_id = (int) $_GET['attr_id'];
        $model = new AttrlistModel();
        $data = $model->where("goodattr_id='$attr_id'")->select();
        $inputlist = array();
        foreach ($data as $value) {
            // 注意第二个参数是 html 控件的 name 属性 下标 $value[id] 是 attrlist 表的id
            $input[0] = $this->createinput($value[id], 'attrlist[' . $value[id] . ']');
            $input[1] = $value;
            $inputlist[] = $input;
        }
        echo json_encode($inputlist);
    }

}

?>
