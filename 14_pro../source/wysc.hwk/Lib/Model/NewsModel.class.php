<?php

class NewsModel extends Model {

    protected $_validate = array(
        array('title', 'require', '文章标题不能为空'),
        array('newscate_id', '/^\d+$/', '文章分类不正确')
    );

}

?>