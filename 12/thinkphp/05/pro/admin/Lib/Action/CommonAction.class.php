<?php

// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {

    function verify() {
        import('ORG.Util.Image');
        Image::buildImageVerify(4, 3); //此方法 默认生成 session("verify");
    }


}
