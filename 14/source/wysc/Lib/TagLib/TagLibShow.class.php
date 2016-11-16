<?php
class TagLibShow extends TagLib {
	protected $tags=array(
		 'imgInfo' => array('attr' => 'id','close' =>1)
	);
	function _imgInfo($attr,$content){
		$attr = $this->parseXmlAttr($attr);
		return $attr[id];
	}
}
?>