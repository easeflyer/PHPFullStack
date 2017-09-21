<?php

function uploadfile() {
    import('Org.Net.UploadFile');
    $upload = new UploadFile();
    $upload->maxSize = 3145728; // 设置附件上传大小
    $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->savePath = './Public/Uploads/'; // 设置附件上传目录
    $upload->autoSub = true;
    $upload->subType = 'date';
    $upload->dateFormat = 'Y/m/d';
    $upload->saveRule = 'uniqid'; // 上传文件命名规则
    $ret = array();
    if (!$upload->upload()) {// 上传错误提示错误信息
        $ret['errno'] = 1;
        $ret['errnomsg'] = $upload->getErrorMsg();
    } else {// 上传成功 获取上传文件信息
        $ret['errno'] = 0;
        $ret['info'] = $upload->getUploadFileInfo();
    }
    return $ret;
}

function thumb($filename, $width, $height) {
    import('ORG.Util.Image.ThinkImage');
    $filename = './Public/Uploads/' . $filename;
    $img = new ThinkImage(THINKIMAGE_GD, $filename);
    $img = $img->thumb($width, $height, 2);
    $dirname = dirname($filename);
    $basename = basename($filename);
    $img->save($dirname . '/thumb_' . $width . '_' . $height . '_' . $basename, 'jpg');
}

?>
