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
                    $this->success('添加失败');
                }
            }
        } else {
            $attrid = (int) $_GET['attrid'];
            $this->assign('attrid', $attrid);
            $this->display();
        }
    }

    function manageattrlist() {
        $attrid = (int) $_GET['id'];
        $this->assign('attrid', $attrid);
        $model = M('Goodsattr');
        $data = $model->find($attrid);
        $attrname = $data[attrname];
        $attrlistmodel = new AttrlistModel();
        $attrlist1 = $attrlistmodel->where("goodsattr_id='$attrid'")->select();
        $attrlist = array();
        foreach ($attrlist1 as $val) {
            $val[preview] = $this->createinput($val[id], $val[inputname]);
            $attrlist[] = $val;
        }
        $this->assign('attrlist', $attrlist);
        $this->assign('attrname', $attrname);
        $this->display();
    }

    function createinput($attrlistid, $name = '', $val = '') {
        $attrlistmodel = new AttrlistModel();
        $input = $attrlistmodel->find($attrlistid);
        if ($input[inputtype] == 1) {
            return '<input type="text" name="' . $name . '" class="ipt" value=' . $val . '>';
        }
        if ($input[inputtype] == 2) {
            $optionlist = $input[optionlist];
            //在linux中文本的换行符行为\r,而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist);
            $ret = '';
            $i = 0;
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if ($val == '') {
                    if ($i == 0) {
                        $ret.="<input type='radio' name='$name' value='$option' checked=true>&nbsp;$option&nbsp;";
                    } else {
                        $ret.="<input type='radio' name='$name' value='$option'>&nbsp;$option&nbsp;";
                    }
                } else {
                    if ($val == $option) {
                        $ret.="<input type='radio' name='$name' value='$option' checked=true>&nbsp;$option&nbsp;";
                    } else {
                        $ret.="<input type='radio' name='$name' value='$option'>&nbsp;$option&nbsp;";
                    }
                }
                $i++;
            }
            return $ret;
        }
        if ($input[inputtype] == 3) {
            $optionlist = $input[optionlist];
            //在linux中文本的换行符行为\r,而在windows中为\r\n要考虑兼容情况
            $optionarr1 = preg_split('/\r/', $optionlist);
            $ret = '';
            $val=  json_decode($val);
            foreach ($optionarr1 as $option) {
                $option = trim($option);
                if (in_array($option, $val)) {
                    $ret.="<input type='checkbox' name='" . $name . "[]' value='$option' checked>&nbsp;$option&nbsp;";
                } else {
                    $ret.="<input type='checkbox' name='" . $name . "[]' value='$option'>&nbsp;$option&nbsp;";
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
                    $this->success('编辑失败');
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
        $id = (int) $_GET['id'];
        $model = new AttrlistModel();
        if ($model->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    function getlist() {
        $attr_id = (int) $_GET['attr_id'];
        $model = new AttrlistModel();
        $data = $model->where("goodsattr_id='$attr_id'")->select();
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