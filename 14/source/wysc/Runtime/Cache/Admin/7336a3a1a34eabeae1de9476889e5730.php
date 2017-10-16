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
<script type="text/javascript">
    function changeaddressvalue(obj,_addid){
        $.get("index.php?g=admin&m=address&a=editjson",{id:_addid,fieldname:obj.name,val:obj.value},function(){
            })
    }
</script>
<style type="text/css">
    .table-form caption{
        height: 3em;
        line-height: 3em;
        background-color: #f1f1f1
    }
    .basicth{ text-align: center!important}
</style>
</head>
<body>
<div  class="easyui-panel" data-options="
    title:'订单详情',
    border:false,
    iconCls:'icon-cart_go'
">

<form name="f1" action="" method="POST" enctype="multipart/form-data">
<table class="table-form" border="1" width="100%">
                <caption>订单商品</caption>
                    <tr>
                        <th class="basicth" style="width:20px">id</th>
                        <th class="basicth">缩略图</th>
                        <th class="basicth">商品名称</th>
                        <th class="basicth">数量</th>
                        <th class="basicth">价格小计</th>
                    </tr>
                    <?php if(is_array($goodsdata)): $i = 0; $__LIST__ = $goodsdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                            <td align="center"><?php echo ($item[goods_id]); ?></td>
                            <td><img src="<?php if($item[goods_thumb]): ?>__APPURL__/Public/Uploads/<?php echo ($item[goods_thumb]); ?>
                <?php else: ?>
                __SKIN__images/nopic.png<?php endif; ?>" width="64" height="64"></td>
                            <td><?php echo ($item[goods_name]); ?></td>
                            <td><?php echo ($item[num]); ?></td>
                            <td align="center"><span style="color:red">￥</span><?php echo ($item[totalprice]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <table class="table-form" border="1" width="100%">
                <caption>收货地址</caption>
    <tr>
        <th>收货人</th><td colspan="3"><?php echo ($addressdata[contact]); ?></td>
    </tr>
     <tr>
        <th>详细地址</th><td colspan="3"><?php echo ($addressdata[address]); ?></td>
    </tr>
     <tr>
        <th>电话</th><td style="width:270px"><?php echo ($addressdata[tel]); ?></td>
   
       <th>手机</th><td><?php echo ($addressdata[phone]); ?></td>
        
    </tr>
    <tr>
        <th>标志建筑</th><td style="width:270px"><?php echo ($addressdata[signbuilding]); ?></td>
   
       <th>最佳送货时间</th><td><?php echo ($addressdata[besttime]); ?></td>
        
    </tr>
   
   
</table>
<table class="table-form" border="1" width="100%">
<caption>配送方式</caption>
                    <tr>
                        <th class="basicth">名称</th>
                        <th class="basicth">描述</th>
                        <th class="basicth">加收费用</th>
                    </tr>
                        <tr>
                            <td class="basicth"><?php echo ($basicorderdata[shipname]); ?></td>
                            <td class="basicth"><?php echo ($basicorderdata[shipdesc]); ?></td>
                            <th class="basicth"><?php echo ($basicorderdata[extramoney]); ?></th>
                        </tr>
                    
               
                </table>
            <table class="table-form" border="1" width="100%">
<caption>订单信息汇总</caption>
                    <tr>
                        <th class="basicth">订单状态</th>
                        <th class="basicth">费用结算</th>
                        
                    </tr>
                        <tr>
                            <td align="center" class="basicth"><?php echo ($basicorderdata[state]); ?></td>
                            <th class="basicth"><h3 style="font-size:14px;color:#ff0000"><?php echo ($basicorderdata[totalprice]); ?> + <?php echo ($basicorderdata[extramoney]); ?>=<?php echo ($basicorderdata[totalprice] + $basicorderdata[extramoney]); ?></h3></th>
                        </tr>
                    
               
                </table>

</form>
</div>
</body>
</html>