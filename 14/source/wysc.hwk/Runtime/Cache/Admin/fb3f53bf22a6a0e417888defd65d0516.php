<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyloader.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
    <title>添加商品</title>
    <link href="__SKIN__css/tableform.css" rel="stylesheet" type="text/css"/>
    <link href="__SKIN__plugin/editor/themes/default/default.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="__SKIN__plugin/editor/kindeditor-min.js"></script>
    <script type="text/javascript" src="__SKIN__plugin/editor/lang/zh_CN.js"></script>
    <style>
        .tabcontent{padding:10px 20px; }
    </style>
    <script type="text/javascript">
        var editor;
            KindEditor.ready(function (K) {
                K.create('#goodsinfo');
            })
    </script>
</head>
<body>
    <div class="tabcontent" data-options="iconCls:'icon-application_xp'" title="详细信息">
        <textarea name="goodsinfo" id="goodsinfo" style="width:80%; height:300px;"></textarea>
    </div>
</body>
</html>