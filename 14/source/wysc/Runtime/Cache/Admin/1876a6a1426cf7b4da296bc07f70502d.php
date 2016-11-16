<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>用户级别管理</title>
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
            function createop1(_v, _r) { // 原来的函数，管理该级别用户 链接错误
                return "<a href='index.php?g=admin&m=attrlist&a=manageattrlist&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-chart_organisation\"'>管理该级别用户</a>\n\
                                        <a href='index.php?g=admin&m=Userrank&a=edit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-vcard_edit\"'>编辑</a>\n\
                                        <a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-vcard_edit\"'>删除</a>";
            }
            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=Users&a=manage&rank_id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-chart_organisation\"'>管理该级别用户</a>\n\
                                        <a href='index.php?g=admin&m=Userrank&a=edit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-vcard_edit\"'>编辑</a>\n\
                                        <a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-vcard_edit\"'>删除</a>";
            }
            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }



            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该级别', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Userrank&a=del&id=' + _id;
                    }
                });
            }
        </script>
    </head>

    <body>
        <div class="easyui-panel" data-options="
             title:'用户级别管理',
             border:false,
             iconCls:'icon-vcard'
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
                        field:'rankname',
                        width:100">模型名称</th>
                    <th data-options="
                        field:'minpoint',
                        width:100">最小积分</th>
                    <th data-options="
                        field:'maxpoint',
                        width:100">最大积分</th>
                    <th data-options="
                        field:'discount',
                        width:100">折扣</th>
                    <th data-options="field:'opration',
                        width:150,
                        formatter:createop
                        ">操作</th>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($val['id']); ?></td>

                            <td><?php echo ($val['rankname']); ?></td>
                            <td><?php echo ($val['minpoint']); ?></td>
                            <td><?php echo ($val['maxpoint']); ?></td>
                            <td><?php echo ($val['discount']); ?>%</td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

            <div id="toolbar">
                <a href="<?php echo U('Userrank/add');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-vcard_add'">添加用户级别</a>
            </div>
        </div>
    </body>

</html>