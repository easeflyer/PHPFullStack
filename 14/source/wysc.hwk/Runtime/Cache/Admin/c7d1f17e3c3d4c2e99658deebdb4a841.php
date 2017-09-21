<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>组成员管理</title>
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
            function renderbutton(){
            <?php if(is_array($ids)): $i = 0; $__LIST__ = $ids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>$('#datagrid').datagrid('selectRecord', <?php echo ($vo); ?>);<?php endforeach; endif; else: echo "" ;endif; ?>
            }
            function editroleuser(_roleid){
            var _selectdata = $('#datagrid').datagrid('getSelections');
            var ids = '0';
            for (var i = 0; i < _selectdata.length; i++){
            ids += ',' + _selectdata[i].id
            }
            window.location.href = "index.php?g=admin&m=rbac&a=editroleuser&roleid=" + _roleid + "&ids=" + ids;
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel"  data-options="
             title:'组成员管理',
             border:false,
             iconCls:'icon-user'
             ">
            <form name="f1" method="post" action="" id="f1">
                <table id="datagrid" class="easyui-datagrid"  data-options="
                       border:false,
                       fitColumns:true,
                       toolbar:'#toolbar',
                       onLoadSuccess:renderbutton,
                       striped:true,
                       rownumbers:true,
                       singleSelect:false,
                       checkOnSelect:true,
                       selectOnCheck:true,
                       idField:'id'
                       " style="display:none">
                    <thead>
                        <th data-options="
                            field:'checkbox',
                            align:'center',
                            checkbox:'true'"></th>
                        <th data-options="
                            field:'id',
                            align:'center',
                            width:20">id</th>
                        <th data-options="
                            field:'title',
                            width:150">用户名</th>
                        <th data-options="
                            field:'lastlogin',
                            width:100">最后登录时间</th>
                    </thead>
                    <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                <td></td>
                                <td><?php echo ($val[id]); ?></td>
                                <td><?php echo ($val[username]); ?></td>
                                <td><?php echo (date('Y-m-d H:i:s',$val[lastlogin])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div id="toolbar">
                    <a href="<?php echo U('Rbac/managerole');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-group_go'">返回角色管理</a>
                </div>
                <div>
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-group_edit'" onclick="editroleuser(<?php echo ($roleid); ?>)" style="float: right; margin: 20px">确认修改</a>
                </div>
            </form>
        </div>
    </body>
</html>