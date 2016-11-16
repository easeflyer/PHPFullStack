<?php

class AttrlistAction extends Action {

    function addattrlist() {
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
        } else {
            $attrid = (int) $_GET['attrid'];
            $this->assign('attrid', $attrid);
            $this->display();
        }
    }

    /**
     * 
     */
    function manageattrlist() {
        $attrid = (int) $_GET['id'];
        $this->assign('attrid', $attrid);
        $model = M('Goodattr');
        $data = $model->find($attrid);
        $attrname = $data[attrname]; // 类型名称
        $attrlistmodel = new AttrlistModel();
        $attrlist1 = $attrlistmodel->where("goodattr_id='$attrid'")->select();
        $attrlist = array();
        foreach ($attrlist1 as $val) {
            // 增加了一个 preview 列 又 createinput 构建
            $val[preview] = $this->createinput($val[id], $val[inputname]);
            $attrlist[] = $val;
        }
        $this->assign('attrlist', $attrlist);  // 属性列表
        $this->assign('attrname', $attrname);  //属性类型名称
        $this->display();
    }
    /**
     *  用于创建 属性录入的 表单 控件。
     *  表单控件的 name =  $name
     *  在 getlist 方法中 $name = attrlist[' . $value[id] . '] 也就是 属性[n] 因为一个属性 可能会有多选值。
     * 
     * @param type $attrlistid
     * @param type $name
     * @param type $val
     * @return string
     */
    function createinput($attrlistid, $name = '', $val = '') {
        /**
         *  input 当前属性row
         *  $optionlist 如果是 可选值 则读取可选值列表
         */
        $attrlistmodel = new AttrlistModel();
        $input = $attrlistmodel->find($attrlistid);
        if ($input[inputtype] == 1) {
            return '<input type="text" name="' . $name . '" class="ipt" value=' . $val . '>';
        }
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
        if ($input[inputtype] == 3) { // 如果是多选则 使用 checkbox 构建 preview
            $optionlist = $input[optionlist];
            //在linux中文本的换行符为\r，而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist);
            $ret = '';
            $val = json_decode($val);
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if (in_array($option, $val)) {
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
            $input[0] = $this->createinput($value[id], 'attrlist[' . $value[id] . ']');
            $input[1] = $value;
            $inputlist[] = $input;
        }
        echo json_encode($inputlist);
    }

}

?>
