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
        <title>编辑商标</title>
        <link href="__SKIN__css/tableform.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="easyui-panel" data-options="title:'编辑商标',border:false,iconCls:'icon-application_add'">
            <form name="f1" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo ($data[id]); ?>" />
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>商标名称</th><td><input type="text" name="brandname" class="ipt" value="<?php echo ($data[brandname]); ?>" /></td>
                    </tr>
                    <tr>
                        <th>商标图片</th><td><img src="
                                <?php if($data[image] != ''): ?>__APPURL__Public/Uploads/<?php echo ($data[image]); ?>
                                <?php else: ?>
                                    __SKIN__images/nopic.png<?php endif; ?>
                                " alt="" width="70" height="70" style="float:left;" /><input type="file" name="image" style="margin-left:10px; margin-top:23px;" /></td>
                    </tr>
                    <tr>
                        <th>超链接</th><td><input type="text" name="url"  class="ipt" value="<?php echo ($data[url]); ?>" /></td>
                    </tr>
                    <tr>
                        <th>是否显示</th><td>
                            <?php if($data[is_show] == 1): ?><input name="is_show" type="radio" value="1" checked/>是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_show" type="radio" value="0" />否</td>
                        <?php else: ?>
                        <input name="is_show" type="radio" value="1"/>是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_show" type="radio" value="0" checked />否</td><?php endif; ?>
                    </tr>
                    <tr>
                        <th>详细信息</th><td>
                            <textarea name="info" rows="9" cols="60"><?php echo ($data[info]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input name="s1" type="submit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="r1" type="reset" value="清除" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>