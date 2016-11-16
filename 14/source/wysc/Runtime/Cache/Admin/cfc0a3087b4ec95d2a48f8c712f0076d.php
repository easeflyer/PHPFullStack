<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>新闻管理</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>
        <script type="text/javascript">
            var oldorder;
            var goodname = '<?php echo ($goodname); ?>';
            var catid = '<?php echo ($catid); ?>';
            var brand = '<?php echo ($brand); ?>';
            var module = '<?php echo ($moudle); ?>';

            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=news&a=newsedit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a>\n\
        <a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }

            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }

            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该新闻', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=news&a=newsdel&id=' + _id;
                    }
                });
            }

            function gotopage(_page, _pagesize) {
                console.log(_page);
                var _searchstr = '';
                if (goodname)
                    _searchstr += '&goodname=' + goodname;
                if (catid)
                    _searchstr += '&catid=' + catid;
                if (brand != 0)
                    _searchstr += '&brand=' + brand;
                if (module != 0)
                    _searchstr += '&module=' + module;
                window.location.href = 'index.php?g=admin&m=Goods&a=manage&' + _searchstr + '&page=' + _page;
            }



        </script>
    </head>

    <body>
        <div class="easyui-panel" data-options="
             title:'新闻管理',
             border:false,
             iconCls:'icon-page'
             ">
            <form name="f1" method="post" action="<?php echo U('Goods/listorder');?>" id="f1">
                <!--datagrid 参数参见easyui手册--> 
                <table id="datagrid" class="easyui-datagrid" data-options="
                       border:false,
                       fitColumns:true,
                       toolbar:'#toolbar',
                       onLoadSuccess:renderbutton,
                       striped:true,
                       rownumbers:true,
                       singleSelect:false,
                       checkOnSelect:false,
                       selectOnCheck:false
                       " style="display:none">
                    <thead>
                        <th data-options="
                            field:'id',
                            align:'center', 
                            width:20">id</th>
                        <th data-options="
                            field:'title',width:150">标题</th>
                        <th data-options="field:'categoryname',
                            align:'center', 
                            width:100">所属分类</th>
                        <th data-options="field:'opration',

                            formatter:createop,width:100
                            ">操作</th>
                    </thead>
                    <tbody>
                        <!--循环输出 新闻数据-->
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($val[id]); ?></td>
                                <td><?php echo ($val[title]); ?>
                                    <!--如果存在缩略图则显示一个小图标-->
                                    <?php if($val[thumb] != ''): ?><img src="__SKIN__/plugin/ui/themes/icons/image.png" style="margin-right: 10px;
                                             float: right;"><?php endif; ?>
                                </td>
                                <td><?php echo ($val[catname]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="easyui-pagination" data-options="
                     border:true,
                     total:'<?php echo ($total); ?>',
                     pageSize:'<?php echo C('PAGE_SIZE');?>',
                     pageNumber:<?php echo ($page); ?>,
                     pageList:[<?php echo C('PAGE_SIZE');?>],
                     onSelectPage:gotopage
                     "></div>
                <div id="toolbar">
                    <a href="<?php echo U('News/newsadd');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-page_add'">添加新闻</a>
                </div>
            </form>
        </div>
    </body>

</html>