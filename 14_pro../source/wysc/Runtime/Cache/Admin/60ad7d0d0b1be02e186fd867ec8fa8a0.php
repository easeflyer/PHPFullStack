<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>节点管理</title>
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
            function getstatus(_v, _r) {
                return _v == 0 ? '是' : '否';
            }
            function getshow(_v, _r) {
                return _v == 0 ? '否' : '是';
            }
            function getop(_v, _r) {
                return "<a href='index.php?g=admin&m=Rbac&a=editnode&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-note_edit\"'>编辑</a><a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-note_delete\"'>删除</a>";
            }
            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({plain: true});
            }
            function confirmdel(_catid) {
                $.messager.confirm('确认删除', '是否确认删除该菜单', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Rbac&a=delnode&id=' + _catid;
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel" data-options="
             title:'节点管理',
             border:false,
             iconCls:'icon-note'
             ">
            <table class="easyui-treegrid" data-options="
                   border:false,
                   fitColumns:true,
                   toolbar:'#toolbar',
                   url:'<?php echo U('Rbac/treegridjson');?>',
                   idField:'id',
                   treeField:'title',
                   animate:false,
                   onLoadSuccess:renderbutton
                   ">
                <thead>

                    <th data-options="
                        field:'id',
                        width:20">id</th>
                    <th data-options="
                        field:'title',
                        width:70">分类名称</th>
                    <th data-options="
                        field:'name',
                        width:70">英文名称</th>
                    <th data-options="field:'status',
                        width:20, formatter:getstatus">禁用</th>
                    <th data-options="field:'is_show',
                        width:20, formatter:getshow">显示</th>
                    <th data-options="field:'opration',
                        width:150, formatter:getop">操作</th>
                </thead>    
            </table>
            <!--echo "isshow:::::"<?php echo (session('is_show')); ?>-->

            <div id="toolbar">
                <a href="<?php echo U('Rbac/nodeadd');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-note_add'">添加节点</a>
            </div>
            </form>
        </div>
    </body>

</html>