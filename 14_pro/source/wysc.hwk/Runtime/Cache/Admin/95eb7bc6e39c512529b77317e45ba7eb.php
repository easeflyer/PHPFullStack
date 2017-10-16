<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>订单管理</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <script type="text/javascript">
            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=Orders&a=detail&orderid=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-cart_go\"'>查看订单详情</a><a href='index.php?g=admin&m=Orders&a=editorderstate&orderid=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-cart_edit\"'>修改订单状态</a><a href='index.php?g=admin&m=Orders&a=statechangedetail&orderid=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-cart_error\"'>状态修改明细</a>";
            }
            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }
            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该用户', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Users&a=del&id=' + _id;
                    }
                });
            }
            function gotopage(_page, _pagesize) {
                window.location.href = 'index.php?g=admin&m=Orders&a=manage&page=' + _page;
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel"  data-options="
             title:'订单管理',
             border:false,
             iconCls:'icon-cart_put'
             ">  
            <table class="easyui-datagrid"  data-options="
                   border:false,
                   fitColumns:true,
                   toolbar:'#toolbar',
                   onLoadSuccess:renderbutton,
                   ">
                <thead>
                    <th data-options="
                        field:'id',
                        align:'center',
                        width:20">id</th>
                    <th data-options="
                        field:'username',
                        width:100, align:'left', ">用户名</th>
                    <th data-options="
                        field:'rankname',
                        width:70, align:'center'">订单金额</th>
                    <th data-options="
                        field:'email',
                        width:100, align:'center'" >下单时间</th>
                    <th data-options="
                        field:'sex',
                        width:40, align:'center'">配送方式</th>
                    <th data-options="
                        field:'usermoney',
                        width:100, align:'center'" >配送费用</th>
                    <th data-options="
                        field:'points',
                        width:40, align:'center'" >订单状态</th>
                    <th data-options="
                        field:'opration',
                        width:200, align:'center', formatter:createop">操作</th>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($val['id']); ?></td>
                            <td><?php echo ($val['username']); ?></td>
                            <td><?php echo ($val['totalprice']); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$val['ordertime'])); ?></td>
                            <td><?php echo ($val['shipname']); ?></td>
                            <td><?php echo ($val[extramoney]); ?></td>
                            <td><?php echo ($val[state]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div class="easyui-pagination" data-options="
                 border:true,
                 total:'<?php echo ($total); ?>',
                 pageSize:'<?php echo C('PAGE_SIZE');?>',
                 pageNumber:<?php echo ($page); ?>,
                 pageList:[<?php echo C('PAGE_SIZE');?>],
                 onSelectPage:gotopage
                 "></div>
            <!--<div id="toolbar">
                <a href=""  class="easyui-linkbutton"  data-options="plain:true,iconCls:'icon-cart_go'"></a>
            </div>-->
        </div>
    </body>
</html>