<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>编辑配送方式</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <link rel="stylesheet" type="text/css" href="__SKIN__/css/tableform.css" />
    </head>
    <body>
        <div  class="easyui-panel" data-options="
              title:'编辑配送方式',
              border:false,
              iconCls:'icon-car_add'
              ">
            <form name="f1" action="" method="POST" enctype="multipart/form-data">   
                <table class="table-form" border="1" width="100%">
                    <tr><th>名称</th><td><input type="hidden" name="id" value="<?php echo ($data[id]); ?>" /><input type="text" name="shipname" class="ipt" value="<?php echo ($data[shipname]); ?>" /></td></tr>
                    <tr><th>描述</th><td><textarea name="shipdesc" id="" cols="30" rows="10" style="margin:0px; width:609px; height:150px;"><?php echo ($data[shipdesc]); ?></textarea></td></tr>
                    <tr><th>收取费用</th><td><input type="text" name="extramoeny" class="ipt" value="<?php echo ($data[extramoney]); ?>" /></td></tr>                    
                    <tr><th></th><td><input type="submit" name="s1" value="提交" />&nbsp;<input type="reset" name="r1" value="清除" /></td></tr>
                </table> 
            </form>  
        </div>
    </body>
</html>