<?php

function uploadfile() {
    import('Org.Net.UploadFile');
    $upload = new UploadFile();
    $upload->maxSize = 2048000;
    $upload->allowExts = array('jpg', 'jpeg', 'gif', 'png', 'jpeg');
    $upload->savePath = './Public/Uploads/';
    $upload->autoSub = true;
    $upload->subType = 'date';
    $upload->dateFormat = 'Y/m/d';
    $upload->saveRule = 'uniqid';
    $ret = array();
    if (!$upload->upload()) {// 上传错误提示错误信息
        $ret['errno'] = 1;
        $ret['errormsg'] = $upload->getErrorMsg();
    } else {// 上传成功 获取上传文件信息
        $ret['errno'] = 0;
        $ret['info'] = $upload->getUploadFileInfo();
    }
    return $ret;
}

// 缩略图保存
/**
 *  负责根据参数 创建缩略图
 * 
 * @param string $filename  
 * @param type $width
 * @param type $height
 */
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