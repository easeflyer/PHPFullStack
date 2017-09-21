<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="__SKIN__/css/tableform.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <title>添加文章栏目</title>
    </head>
    <body>
        <div  class="easyui-panel" data-options="
              title:'添加文章栏目',
              border:false,
              iconCls:'icon-folder_add'
              ">
            <form name="f1" action="" method="post">   
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>分类名称</th><td><input type="text" name="catname" class="ipt"></td>
                    </tr>
                    <tr>
                        <th>上级分类</th><td><select id="cc"  name="pid" class="easyui-combotree" style="width:200px;"   
                                                 data-options="
                                                 url:'<?php echo U('News/combotreejson');?>',
                                                 value:'<?php echo ($catid); ?>'"></select></td>
                    </tr>
                    <tr>
                        <th></th><td><input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="r1" value="清除"></td>
                    </tr>
                </table> 
            </form>  
        </div>
    </body>
</html>