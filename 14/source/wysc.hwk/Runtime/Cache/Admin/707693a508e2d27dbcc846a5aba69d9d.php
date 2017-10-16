<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>编辑类型</title>
        
        <link rel="stylesheet" type="text/css" href="__SKIN__/css/tableform.css" />
    </head>
    <body>
        <div  class="easyui-panel" data-options="
              title:'编辑类型',
              border:false,
              iconCls:'icon-image_edit'
              ">

            <form name="f1" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo ($data[id]); ?>" />   
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>类型名称</th><td><input type="text" name="typename" class="ipt" value="<?php echo ($data[typename]); ?>"></td>
                    </tr>
                    <tr>
                        <th></th><td><input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="r1" value="清除"></td>
                    </tr>
                </table> 
            </form>  
        </div>
    </body>
</html>