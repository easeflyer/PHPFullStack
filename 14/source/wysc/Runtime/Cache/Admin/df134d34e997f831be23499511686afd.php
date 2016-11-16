<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台管理</title>
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
            // 构造"显示"列
            function getshow(_v, _r) {
                return _v == 0 ? '否' : '是';
            }
            // 构造 "操作"列 参考 EasyUI formatter 参数
            function getop(_v, _r) {
                return "<a href='' class='easyui-linkbutton' data-options='iconCls:\"icon-zoom\"'>查看商品</a>\n\
        <a href='index.php?g=admin&m=Category&a=addcat&catid=" + _r.id + "' class='easyui-linkbutton'  data-options='iconCls:\"icon-add\"'>添加子类</a>\n\
<a href='index.php?g=admin&m=Category&a=editcat&catid=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a>\n\
<a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }
            // 当分类列表加载完毕, 显示本按钮 参见 EasyUI linkbutton
            // 参考 EasyUI onLoadSuccess:renderbutton 手册
            function renderbutton() {
                // 这里 是对 getop 添加的 按钮做调整。因为 getop 添加的html 在整个程序流程的最后。因此没有获得样式。
                $('a.easyui-linkbutton').linkbutton({plain: true});
            }
            function confirmdel(_catid) {
                $.messager.confirm('确认删除', '是否确认删除该分类', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Category&a=delcat&catid=' + _catid;
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel" data-options="
             title:'商品分类管理',
             border:false,
             iconCls:'icon-application_view_gallery'
             ">
            <div id="toolbar">
                <a href="<?php echo U('Category/addcat');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-application_add'">添加分类</a>
            </div>

            <table class="easyui-treegrid" data-options="
                   border:false,
                   fitColumns:true,
                   toolbar:'#toolbar',
                   url:'<?php echo U('Category/treegridjson');?>',
                   idField:'id',
                   treeField:'catname',
                   animate:false,
                   onLoadSuccess:renderbutton
                   "
                   >
                <thead>
                    <th data-options="
                        field:'order',
                        width:20
                        ">排序</th>
                    <th data-options="
                        field:'id',
                        width:20">id</th>
                    <th data-options="
                        field:'catname',
                        width:70">分类名称</th>
                    <th data-options="
                        field:'dw',
                        width:20">单位</th>
                    <th data-options="field:'is_show',
                        width:20, formatter:getshow">显示</th>
                    <th data-options="field:'opration',
                        width:150, formatter:getop">操作</th>
                </thead>	
            </table>
        </div>
    </body>
</html>