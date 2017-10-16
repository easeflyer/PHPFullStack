<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单状态修改明细</title>
    <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>
</head>

<body>
    <div class="easyui-panel" data-options="
    title:'订单状态修改明细',
    border:false,
    iconCls:'icon-cart_error'
">
        <table class="easyui-datagrid" data-options="
border:false,
fitColumns:true,


">
            <thead>
                <th data-options="
    field:'id',
    align:'center', 
    width:20">id</th>
                <th data-options="
    field:'orders_id',
    width:50, align:'left', ">订单id</th>
    <th data-options="
    field:'fromstate',
    width:70, align:'center'">原状态</th>
                <th data-options="
    field:'tostate',
    width:100, align:'center' ">修改状态</th>
                <th data-options="
    field:'changetime',
    width:100, align:'center'">修改时间</th>
                <th data-options="
    field:'info',
    width:300, align:'center'" >修改原因</th>
            </thead>
            <tbody>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($val['id']); ?></td>
                        <td><?php echo ($val['orders_id']); ?></td>
                        <td><?php echo ($val['fstate']); ?></td>
                        <td><?php echo ($val['tstate']); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$val[changetime])); ?>
                        </td>
                        <td><?php echo ($val['info']); ?></td>
                       
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

    </div>

</body>

</html>