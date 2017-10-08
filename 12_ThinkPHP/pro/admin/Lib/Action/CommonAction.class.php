<?php
// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
	function verify(){
                // 注意 ORG 全部大写
 		import('ORG.Util.Image');
 		Image::buildImageVerify(4,3);	
 	}
}