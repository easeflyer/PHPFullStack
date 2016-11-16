<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加地址</title>
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>
<link rel="stylesheet" type="text/css" href="__SKIN__css/tableform.css" />
<style type="text/css">
    table.table-form tr th{ width: 100px;}
</style>
</head>
<body>
<div  class="easyui-panel" data-options="
    title:'添加地址',
    border:false,
    iconCls:'icon-user'
">
<div style="background:#f1f1f1; margin-top:10px">
    <a href="<?php echo U('Address/manage',array('id'=>$userid));?>" class="easyui-linkbutton" data-options="iconCls:'icon-book_addresses'" style="margin:10px 10px">返回地址管理</a>
</div>
<form name="f1" action="" method="POST" enctype="multipart/form-data">
<table class="table-form" border="1" width="100%">
    <tr>
        <th>收货人</th><td colspan="3"><input type="hidden" name="users_id" value="<?php echo ($userid); ?>" /><input type="text" name="contact" class="ipt" style="width: 336px;"></td>
    </tr>
     <tr>
        <th>详细地址</th><td colspan="3"><input type="text" name="address" class="ipt" style="width: 500px;"></td>
    </tr>
     <tr>
        <th>电话</th><td style="width:270px"><input type="text" name="tel" class="ipt" style="width:200px"></td>
   
       <th>手机</th><td><input type="text" name="phone" class="ipt" style="width:200px"></td>
        
    </tr>
    <tr>
        <th>标志建筑</th><td style="width:270px"><input type="text" name="signbuild" class="ipt" style="width:200px"></td>
   
       <th>最佳送货时间</th><td><input type="text" name="besttime" class="ipt" style="width:200px"></td>
        
    </tr>
    <tr>
        <td colspan="4" style="padding: 10px 0; ">
            <input type="submit" name="s1" value="提交" style="margin-left:340px;" />&nbsp;&nbsp;<input type="reset" name="r1" value="清除" />
        </td>
    </tr>
   
</table>

</form>
</div>
</body>
</html>