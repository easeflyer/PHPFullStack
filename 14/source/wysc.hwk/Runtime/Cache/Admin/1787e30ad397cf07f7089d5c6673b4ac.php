<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <script>
            function getshow(_v, _r) {
                return _v == 0 ? '否' : '是';
            }
            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=Attrlist&a=edit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a><a href='Javascript:void(0)' onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton' data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }
            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({plain: true});
            }
            function gotopage(_page, _pagesize) {
                window.location.href = 'index.php?g=admin&m=Brand&a=managebrand&page=' + _page;
            }
            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该属性', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Attrlist&a=del&id=' + _id;
                    }
                });
            }
        </script>
        <title>管理属性列表</title>
    </head>
    <body>
        <div class="easyui-panel" data-options="title:'管理商品属性列表',
             border:false,
             iconCls:'icon-chart_organisation'
             ">
            <table class="easyui-datagrid" data-options="border:false,
                   fitColumns:true,
                   toolbar:'#toolbar',
                   onLoadSuccess:renderbutton
                   ">
                <thead>   
                    <th data-options="field:'id',align:'center',width:20">id</th>    
                    <th data-options="field:'name',width:50">属性名称</th>   
                    <th data-options="field:'inputname',width:50">控件名称</th> 
                    <th data-options="field:'inputtype',width:50">输入类型</th>   
                    <th data-options="field:'attrname',align:'center',width:50">所属类型</th>
                    <th data-options="field:'preview',align:'center',width:150">预览</th>
                    <th data-options="field:'opration',
                        width:100,
                        formatter:createop
                        ">操作</th>
                </thead>
                <tbody>
                    <?php if(is_array($attrlist)): $i = 0; $__LIST__ = $attrlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($val['id']); ?></td>
                            <td>
                                <?php echo ($val['name']); ?>
                            </td>
                            <td>
                                <?php echo ($val['inputname']); ?>
                            </td>
                            <td>
                                <?php if($val['inputtype'] == 1): ?>文本框
                                    <?php elseif($val['inputtype'] == 2): ?>
                                    单选框
                                    <?php elseif($val['inputtype'] == 3): ?>
                                    多选框<?php endif; ?>
                            </td>
                            <td><?php echo ($attrname); ?></td>
                            <td><?php echo ($val[preview]); ?></td>
                            <td></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div id="toolbar">
                <a href="<?php echo U('Attrlist/addattrlist',array(attrid=>$attrid));?>" class="easyui-linkbutton"data-options="plain:true,
                   iconCls:'icon-chart_organisation_add'
                   ">添加商品属性</a>
                <a href="<?php echo U('Goodsattr/managegoodsattr');?>" class="easyui-linkbutton"data-options="plain:true,
                   iconCls:'icon-page_white_go'
                   ">返回模型列表</a>
            </div>
        </div>
    </body>
</html>