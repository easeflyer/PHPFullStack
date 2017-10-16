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
            function getop(_v, _r) {
                return "<a href='' class='easyui-linkbutton' data-options='iconCls:\"icon-zoom\"'>查看商品</a><a href='index.php?g=admin&m=Category&a=addcat&catid="+_r.id+"' class='easyui-linkbutton' data-options='iconCls:\"icon-add\"'>添加子类</a><a href='index.php?g=admin&m=Category&a=editcat&catid="+_r.id+"' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a><a href='Javascript:void(0)' onclick='confirmdel("+_r.id+")' class='easyui-linkbutton' data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }
            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({plain:true});
            }
            function confirmdel(_catid) {
                $.messager.confirm('确认删除','是否确认删除该分类',function(r){
                    if(r){
                        window.location.href='index.php?g=admin&m=Category&a=delcat&catid='+_catid;
                    }
                });
            }
        </script>
        <title>后台管理</title>
    </head>
    <body>
        <div class="easyui-panel" data-options="title:'商品分类管理',
             border:false,
             iconCls:'icon-application_view_gallery'
             ">
            <table class="easyui-treegrid" data-options="border:false,
                   fitColumns:true,
                   toolbar:'#toolbar',
                   url:'<?php echo U('Category/treegridjson');?>',
                   idField:'id',
                   treeField:'catename',
                   animate:true,
                   onLoadSuccess:renderbutton
                   ">
                <thead>   
                    <th data-options="field:'order',width:20">排序</th>   
                    <th data-options="field:'id',width:20">id</th>   
                    <th data-options="field:'catename',width:70">分类名称</th>   
                    <th data-options="field:'dw',width:20">单位</th>   
                    <th data-options="field:'is_show',width:20,formatter:getshow">显示</th>
                    <th data-options="field:'opration',width:150,formatter:getop">操作</th>
                </thead>   
            </table>
            <div id="toolbar">
                <a href="<?php echo U('Category/addcat');?>" class="easyui-linkbutton"data-options="plain:true,
                   iconCls:'icon-application_add'
                   ">添加分类</a>
            </div>
        </div>
    </body>
</html>