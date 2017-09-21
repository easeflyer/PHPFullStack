<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>商标管理</title>
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

            function getshow(_v, _r) {
                return _v == 0 ? '否' : '是';
            }

            function createop(_v, _r) {
                return "<a href='' class='easyui-linkbutton' data-options='iconCls:\"icon-zoom\"'>查看商品</a><a href='index.php?g=admin&m=Brand&a=editbrand&brandid=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a><a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }

            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }

            function gotopage(_page, _pagesize) {
                window.location.href = 'index.php?g=admin&m=Brand&a=managebrand&page=' + _page;
            }

            function confirmdel(_brandid) {
                $.messager.confirm('确认删除', '是否确认删除该商标', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Brand&a=delbrand&brandid=' + _brandid;
                    }
                });
            }
        </script>
    </head>

    <body>
        <div class="easyui-panel" data-options="
             title:'商标管理',
             border:false,
             iconCls:'icon-application_view_gallery'
             ">
            <table class="easyui-datagrid" data-options="
                   border:false,
                   fitColumns:true,
                   toolbar:'#toolbar',
                   onLoadSuccess:renderbutton
                   ">
                <thead>
                    <th data-options="
                        field:'id',
                        align:'center', 
                        width:20">id</th>
                    <th data-options="
                        field:'image',
                        align:'center', 
                        width:70">图片</th>
                    <th data-options="
                        field:'brandname',
                        width:100">商标名称</th>
                    <th data-options="
                        field:'url',
                        width:100">url</th>
                    <th data-options="field:'is_show',
                        align:'center', 
                        width:20, formatter:getshow">显示</th>
                    <th data-options="field:'opration',
                        width:150,
                        formatter:createop
                        ">操作</th>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($val['id']); ?></td>
                            <td>
                                <?php if($val['image'] == ''): ?><img style="margin:5px" src="__SKIN__/images/nopic.png" width="70" height="70" alt="" />
                                    <?php else: ?>
                                    <img style="margin:5px" src="__APPURL__/Public/Uploads/<?php echo ($val['image']); ?>" width="70" height="70" alt="" /><?php endif; ?>
                            </td>
                            <td><?php echo ($val['brandname']); ?></td>
                            <td><?php echo ($val['url']); ?></td>
                            <td><?php echo ($val['is_show']); ?></td>
                            <td></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <!--            
            <div class="easyui-pagination" data-options="
                 border:true,   
                 total:'<?php echo ($total); ?>', 数据总数
                 pageSize:'<?php echo C('PAGE_SIZE');?>',  每页几条,参考手册模板引擎模板中使用函数
                 pageNumber:<?php echo ($page); ?>,  当前页
                 pageList:[<?php echo C('PAGE_SIZE');?>],
                 onSelectPage:gotopage   参考 EasyUI手册 分页组件回调函数可以获得页数等参数
                 ">

            </div>
            -->

            <!--div class="easyui-pagination" data-options="
                 border:true,
                 total:'3',
                 pageSize:'1',
                 pageNumber:1,
                 pageList:[1],
                 onSelectPage:gotopage
                 ">

            </div-->
            
            <div class="easyui-pagination" data-options="
                 border:true,
                 total:'<?php echo ($total); ?>',
                 pageSize:'<?php echo C('PAGE_SIZE');?>',
                 pageNumber:<?php echo ($page); ?>,
                 pageList:[<?php echo C('PAGE_SIZE');?>],
                 onSelectPage:gotopage
                 ">

            </div>            
            <div id="toolbar">
                <a href="<?php echo U('Brand/addbrand');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-application_add'">添加商标</a>
            </div>
        </div>
    </body>

</html>