<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>配置权限</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <style>
            .easyui-tree{width: 90%; margin-top: 10px; margin-left: 10px; }
            .easyui-tree>li>ul>li>ul>li{ float: left; margin:5px 0; }
            .easyui-tree>li,.easyui-tree>li>ul>li{ clear: both; margin:10px 0;}
        </style>
        <script>
            var roleid = '<?php echo ($roledata["id"]); ?>';
            function handledata() {
                //取得所有选
                var _ret = $('#mytree').tree('getChecked');
                var _len = _ret.length;
                if (_len <= 0)
                    return;
                var _str = '';
                for (var i = 0; i < _len; i++) {
                    var _node = _ret[i];
                    while (_node != null) {
                        _str += ',' + _node.id;
                        _node = $('#mytree').tree('getParent', _node.target);
                    }
                }
                _str = _str.substr(1);
                var _url = "index.php?g=admin&m=Rbac&a=addaccess";
                $.post(_url, {ids: _str, roleid: roleid}, function (data) {
                    if (data == 0) {
                        alert("权限配置成功");
                    } else {
                        alert("权限配置失败");
                    }
                })
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel"  data-options="
             title:'配置【<?php echo ($roledata[name]); ?>】权限',
             border:false,
             iconCls:'icon-group'
             ">
            <div style="margin: 10px">
                <a href="<?php echo U('Rbac/managerole');?>" class="easyui-linkbutton" data-options="
                   iconCls:'icon-arrow_turn_left',
                   plain:true
                   ">返回</a><a href="javascript:void(0)" class="easyui-linkbutton" data-options="
                   iconCls:'icon-box',
                   plain:true
                   " onclick="handledata()">保存</a>
            </div>
            <ul id="mytree" class="easyui-tree" data-options="
                url:'<?php echo U('Rbac/combotreejson1',array('roleid'=>$roledata[id]));?>',
                checkbox:true,
                animate:true,
                lines:true
                ">
            </ul>
        </div>
    </body>
</html>