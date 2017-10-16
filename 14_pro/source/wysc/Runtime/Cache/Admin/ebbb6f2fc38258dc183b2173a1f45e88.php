<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员管理</title>
    <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script type="text/javascript" src="__SKIN__plugin/ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__SKIN__plugin/ui/locale/easyui-lang-zh_CN.js"></script>
<style type="text/css">
*{ margin:0; padding:0; color:#363636}
a{text-decoration:none; color:#000}

</style>

    <script type="text/javascript">
   

    function createop(_v, _r) {
        return "<a href='index.php?g=admin&m=rbac&a=adminedit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-user_edit\"'>编辑</a><a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-user_delete\"'>删除</a>";
    }

    function renderbutton() {
        $('a.easyui-linkbutton').linkbutton({
            plain: true
        });
    }

    function confirmdel(_id) {
        $.messager.confirm('确认删除', '是否确认删除该新闻', function(r) {
            if (r) {
                window.location.href = 'index.php?g=admin&m=rbac&a=admindel&id=' + _id;
            }
        });
    }

    function gotopage(_page, _pagesize) {
        console.log(_page);
        var _searchstr = '';
        if (goodname) _searchstr += '&goodname=' + goodname;
        if (catid) _searchstr += '&catid=' + catid;
        if (brand != 0) _searchstr += '&brand=' + brand;
        if (module != 0) _searchstr += '&module=' + module;
        window.location.href = 'index.php?g=admin&m=Goods&a=manage&' + _searchstr + '&page=' + _page;
    }

   
    
    </script>
</head>

<body>
    <div class="easyui-panel" data-options="
    title:'管理员管理',
    border:false,
    iconCls:'icon-user'
">
        <form name="f1" method="post" action="" id="f1">
            <table id="datagrid" class="easyui-datagrid" data-options="
border:false,
fitColumns:true,
toolbar:'#toolbar',
onLoadSuccess:renderbutton,
striped:true,
rownumbers:true,
singleSelect:false,
checkOnSelect:false,
selectOnCheck:false
" style="display:none">
                <thead>
                    <th data-options="
    field:'id',
    align:'center', 
    width:20">id</th>
                    <th data-options="
    field:'username',width:150">用户名</th>
                     <th data-options="
    field:'role',width:150">所属角色</th>
                    <th data-options="field:'lastlogin',
    align:'center', 
    width:100">最后登录时间</th>
                    <th data-options="field:'opration',
    
    formatter:createop,width:100
    ">操作</th>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($val[id]); ?></td>
                            <td><?php echo ($val[username]); ?></td>
                            <td><?php echo ($val[role]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$val[lastlogin])); ?></td>
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

            <div id="toolbar">
                <a href="<?php echo U('Rbac/adminadd');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-user_add'">添加管理员</a>
            </div>
        </form>
    </div>
</body>

</html>