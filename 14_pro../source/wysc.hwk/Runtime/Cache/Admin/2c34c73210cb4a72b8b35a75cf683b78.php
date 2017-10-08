<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>后台管理</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
    </head>
    <body class="easyui-layout">
        <div data-options="region:'north',split:true" style="height:100px; background:url('__SKIN__images/adminimage/topbg.jpg') no-repeat center">
            <img src="__SKIN__images/adminimage/logo.png" height="70" style="margin-left:30px; margin-top:10px;" alt="" />
            <a href="__APPURL__" class="easyui-linkbutton" data-option="iconCls:'icon-application_home',plain:true" style="float:right; margin-right:88px; margin-top:10px;"target="_blank">网站首页</a>
        </div>
        <div data-options="region:'south',split:true" style="height:30px; text-align:center; line-height:30px;">版权所有：待定</div>
        <div data-options="region:'west',title:'菜单',iconCls:'icon-application_view_list',split:true" style="width:180px;">
            <ul id="tt" class="easyui-tree" data-options="
                animate:true,
                lines:true
                " style="margin-top:10px; margin-left:10px;">   
                <?php echo ($menustr); ?>
            </ul>  
        </div>
        <div data-options="region:'center'">
            <iframe name="main" width="100%" height="100%" frameborder="0">
            </iframe>
        </div>
    </body>
</html>