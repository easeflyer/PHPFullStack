<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>订单管理</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <script type="text/javascript">
            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=Shippingtype&a=edit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-car\"'>编辑</a><a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-car_delete\"'>删除</a>";
            }

            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }
            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该状态', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Shippingtype&a=del&id=' + _id;
                    }
                });
            }
            function gotopage(_page, _pagesize) {
                window.location.href = 'index.php?g=admin&m=Users&a=manage&page=' + _page;
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel"  data-options="
             title:'配送方式管理',
             border:false,
             iconCls:'icon-car'
             ">  
            <table class="easyui-datagrid"  data-options="
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
                        field:'shipname',
                        width:50, align:'left', ">名称</th>
                    <th data-options="
                        field:'shipdesc',
                        width:200, align:'left', ">说明</th>
                    <th data-options="
                        field:'extramoeny',
                        width:50, align:'left', ">费用</th>
                    <th data-options="
                        field:'opration',
                        width:300, align:'center', formatter:createop">操作</th>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($val['id']); ?></td>
                            <td><?php echo ($val['shipname']); ?></td>
                            <td><?php echo ($val['shipdesc']); ?></td>
                            <td><?php echo ($val['extramoney']); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <!--<div class="easyui-pagination" data-options="
                 border:true,
                 total:'<?php echo ($total); ?>',
                 pageSize:'<?php echo C('PAGE_SIZE');?>',
                 pageNumber:<?php echo ($page); ?>,
                 pageList:[<?php echo C('PAGE_SIZE');?>],
                 onSelectPage:gotopage
                 "></div>-->
            <div id="toolbar">
                <a href="<?php echo U('Shippingtype/add');?>"  class="easyui-linkbutton"  data-options="plain:true,iconCls:'icon-car_add'">添加配送方式</a>
            </div>
        </div>
    </body>
</html>