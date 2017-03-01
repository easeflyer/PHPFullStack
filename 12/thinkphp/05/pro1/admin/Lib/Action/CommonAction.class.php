<?php

/**
 * Description of CommonAction
 *
 * @author Administrator
 */
class CommonAction {
    //put your code here
    function verify(){
        import('ORG.Util.Image');
        //此 tp 提供的生成 验证码的方法内部 生成了一个 session("verify")
        Image::buildImageVerify(4, 3);
    }
}
