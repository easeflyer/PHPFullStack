<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>角色管理</title>
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


            function createop(_v, _r) {
                return "\
        <a href='index.php?g=admin&m=rbac&a=roleedit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-group_edit\"'>编辑</a>\n\
                                                <a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-group_delete\"'>删除</a>\n\
                                                <a href='index.php?g=admin&m=rbac&a=manageroleuser&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-group_edit\"'>管理成员</a>\n\
                                                <a href='index.php?g=admin&m=rbac&a=access&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-key\"'>配置权限</a>";
            }

            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }

            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该角色', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=rbac&a=roledel&id=' + _id;
                    }
                });
            }




        </script>
    </head>

    <body>
        <div class="easyui-panel" data-options="
             title:'角色管理',
             border:false,
             iconCls:'icon-group'
             ">
            <form name="f1" method="post" action="" id="f1">
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
                            field:'name',width:50">角色名称</th>
                        <th data-options="field:'status',
                            align:'center', 
                            width:20">是否禁用</th>
                        <th data-options="field:'remark',
                            align:'center', 
                            width:150">说明</th>
                        <th data-options="field:'opration',

                            formatter:createop,width:100
                            ">操作</th>
                    </thead>
                    <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($val[id]); ?></td>
                                <td><?php echo ($val[name]); ?></td>
                                <td>
                                    <?php if($val[status] == 0): ?>否
                                        <?php else: ?>
                                        是<?php endif; ?> 
                                </td>
                                <td><?php echo ($val[remark]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>


                <div id="toolbar">
                    <a href="<?php echo U('Rbac/roleadd');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-group_add'">添加角色</a>
                </div>
            </form>
        </div>
    </body>

</html>