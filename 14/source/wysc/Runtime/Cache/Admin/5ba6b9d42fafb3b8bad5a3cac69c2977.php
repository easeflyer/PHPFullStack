<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户</title>
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
<script type="text/javascript">
    function changeaddressvalue(obj,_addid){
        $.get("index.php?g=admin&m=address&a=editjson",{id:_addid,fieldname:obj.name,val:obj.value},function(){
            })
    }
</script>
</head>
<body>
<div  class="easyui-panel" data-options="
    title:'【<?php echo ($userdata["username"]); ?>】地址管理',
    border:false,
    iconCls:'icon-user'
">
<div style="background:#f1f1f1; margin-top:10px">
    <a href="<?php echo U('Address/add',array('userid'=>$id));?>" class="easyui-linkbutton" data-options="iconCls:'icon-book_addresses'" style="margin:10px 10px">添加地址</a>
</div>
<form name="f1" action="" method="POST" enctype="multipart/form-data">
<table class="table-form" border="1" width="100%">
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <th>收货人</th><td colspan="3"><input type="text" name="contact" class="ipt" style="width: 336px;" value="<?php echo ($val["contact"]); ?>" onblur="changeaddressvalue(this,'<?php echo ($val["id"]); ?>')"></td>
    </tr>
     <tr>
        <th>详细地址</th><td colspan="3"><input type="text" name="address" class="ipt" style="width: 500px; "value="<?php echo ($val["address"]); ?>"  onblur="changeaddressvalue(this,'<?php echo ($val["id"]); ?>')"></td>
    </tr>
     <tr>
        <th>电话</th><td style="width:270px"><input type="text" name="tel" class="ipt" style="width:200px" value="<?php echo ($val["tel"]); ?>"  onblur="changeaddressvalue(this,'<?php echo ($val["id"]); ?>')"></td>
   
       <th>手机</th><td><input type="text" name="phone" class="ipt" style="width:200px" value="<?php echo ($val["phone"]); ?>"  onblur="changeaddressvalue(this,'<?php echo ($val["id"]); ?>')"></td>
        
    </tr>
    <tr>
        <th>标志建筑</th><td style="width:270px"><input type="text" name="signbuild" class="ipt" style="width:200px" value="<?php echo ($val["signbuild"]); ?>"  onblur="changeaddressvalue(this,'<?php echo ($val["id"]); ?>')"></td>
   
       <th>最佳送货时间</th><td><input type="text" name="besttime" class="ipt" style="width:200px" value="<?php echo ($val["besttime"]); ?>"  onblur="changeaddressvalue(this,'<?php echo ($val["id"]); ?>')"></td>
        
    </tr>
    <tr>
        <td colspan="4" style="padding: 10px 0;"><a  href="<?php echo U('Address/del',array(id=>$val[id]));?>"class="easyui-linkbutton" data-options="iconCls:'icon-book_addresses'" style="margin-left:318px">删除该地址</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
   
</table>

</form>
</div>
</body>
</html>