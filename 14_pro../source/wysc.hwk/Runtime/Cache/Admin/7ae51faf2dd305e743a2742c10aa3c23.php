<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyloader.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <script>
            
        </script>
        <title>商标管理</title>
    </head>
    <body>
        <div class="easyui-panel" data-options="title:'商标管理',
             border:false,
             iconCls:'icon-application_view_gallery'
             ">
            <table class="easyui-datagrid" data-options="border:false,
                   fitColumns:true,
                   toolbar:'#toolbar'
                   ">
                <thead>   
                    <th data-options="field:'id',width:20">id</th>   
                    <th data-options="field:'image',width:70">图片</th>   
                    <th data-options="field:'brandname',width:20">商标名称</th>   
                    <th data-options="field:'is_show',width:20,formatter:getshow">显示</th>
                    <th data-options="field:'opration',width:150,formatter:getop">操作</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div id="toolbar">
                <a href="<?php echo U('Category/addbrand');?>" class="easyui-linkbutton"data-options="plain:true,
                   iconCls:'icon-application_add'
                   ">添加商标</a>
            </div>
        </div>
    </body>
</html>