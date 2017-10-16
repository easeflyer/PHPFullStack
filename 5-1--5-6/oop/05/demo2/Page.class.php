<?php

/**
 * 分页类
 * @author webbc
 */
class Page {

    private $num; //总的文章数   总记录数
    private $cnt; //每页显示的文章数 每页数据
    private $curr; //当前的页码数
    private $p = 'page'; //分页参数名 get 方式传递的参数
    private $pageCnt = 10; // 页码个数
    private $firstRow; //每页的第一行数据
    private $pageIndex = array(); //分页信息

    /**
     * 构造函数
     * @param int $num 总的文章数
     * @param int $cnt 每页显示的文章数
     */

    public function __construct($num, $cnt = 10) {
        $this->num = $num;
        $this->cnt = $cnt;
        $this->curr = empty($_GET[$this->p]) ? 1 : intval($_GET[$this->p]);
        $this->curr = $this->curr > 0 ? $this->curr : 1;
        $this->firstRow = $this->cnt * ($this->curr - 1);
        $this->getPage();
    }

    /**
     * 分页方法
     */
    private function getPage() {
        $page = ceil($this->num / $this->cnt);                  //总的页数
        $left = max(1, $this->curr - floor($this->pageCnt / 2));   //计算最左边页码
        $right = min($left + $this->pageCnt - 1, $page);        //计算最右边页码
        $left = max(1, $right - ($this->pageCnt - 1));           //当前页码往右靠，需要重新计算左边页面的值
        for ($i = $left; $i <= $right; $i++) {
            if ($i == 1) {
                $index = '第1页';
            } else if ($i == $page) {
                $index = '最后一页';
            } else {
                $index = '第' . $i . '页';
            }
            $_GET['page'] = $i;
            $this->pageIndex[$index] = http_build_query($_GET);
            
        }
    }

    /**
     * 返回分页信息数据
     * @return [type] [description]
     */
    public function show() {
        $pageArr = $this->pageIndex;
        $html = "";
        foreach ($pageArr as $i => $p) {
            $html .= "&nbsp;<a href='page_demo.php?" . $p . "'>" . $i . "</a>";
        }
        return $html;
    }

}

?>