<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>编辑节点</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <link href="__SKIN__css/tableform.css" rel="stylesheet" type="text/css" />
        <script>
            $(function(){
                refreshpid(<?php echo ($data["level"]); ?>);
                $('#win').window({
                    width:600,
                    height:400,
                    modal:true,
                    title:'选择图标',
                    iconCls:'icon-map',
                    resizable:false,
                    collapsible:false,
                    minimizable:false,
                    maximizable:false,
                    closed:true
                });
                $('#win').window('refresh', 'index.php?g=admin&m=Rbac&a=getallicons');
            })
            function refreshpid(_level){
                $("#parentid").combotree({
                    url:'index.php?g=Admin&m=Rbac&a=combotreejson&level=' + _level,
                    value:<?php echo ($data["pid"]); ?>
                });
            }
            function showwin(){
                $('#win').window('open');
            }
        </script>
    </head>
    <body>
        <div  class="easyui-panel" data-options="
              title:'编辑节点',
              border:false,
              iconCls:'icon-note_edit'
              ">
            <form name="f1" action="" method="post" enctype="multipart/form-data">   
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>节点名称(英文)</th>
                        <td>
                            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/>
                            <input type="text" name="name" class="ipt" required value="<?php echo ($data["name"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>菜单名称</th>
                        <td>
                            <input type="text" name="title" class="ipt" required style="width:200px;" value="<?php echo ($data["title"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>图标</th>
                        <td>
                            <input type="text" name="iconCls" class="ipt" id="icon" value="<?php echo ($data["iconCls"]); ?>" />&nbsp;<a href="javascript:void(0)"  class="easyui-linkbutton" data-options="iconCls:'icon-folder_magnify'" onclick="showwin()">浏览</a>
                        </td>
                    </tr>
                    <tr>
                        <th>级别</th>
                        <td>
                            <select name="level" onchange="refreshpid(this.value)" style="width:80px;">
                                <option value="1"
                                        <?php if($data[level] == 1): ?>selected<?php endif; ?>
                                    >项目</option>
                                <option value="2"
                                        <?php if($data[level] == 2): ?>selected<?php endif; ?>
                                    >模块</option>
                                <option value="3"
                                        <?php if($data[level] == 3): ?>selected<?php endif; ?>
                                    >操作</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>上级菜单</th>
                        <td>
                            <input id="parentid" name="pid" type="text" style="width:180px" class="easyui-combotree" 
                                   data-options="
                                   
                                   "/>
                        </td>
                    </tr>
                    <tr>
                        <th>是否禁用</th>
                        <td>
                            否&nbsp;<input type="radio" name="status" value="1" 
                                <?php if($data[status] == 1): ?>checked<?php endif; ?>
                                />&nbsp;是&nbsp;<input type="radio" name="status" value="0"
                                    <?php if($data[status] == 0): ?>checked<?php endif; ?>
                                />
                        </td>
                    </tr>
                    <tr>
                        <th>是否显示</th>
                        <td>
                            是&nbsp;<input type="radio" name="is_show" value="1"
                                <?php if($data[is_show] == 1): ?>checked<?php endif; ?>
                                />&nbsp;否&nbsp;<input type="radio" name="is_show" value="0" 
                                <?php if($data[is_show] == 0): ?>checked<?php endif; ?>
                                />
                        </td>
                    </tr>
                    <tr>
                        <th>说明</th>
                        <td>
                            <textarea name="remark"  cols="65" rows="10"><?php echo ($data[remark]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                        <input type="submit" name="s1" value="提交" />&nbsp;
                        <input type="reset" name="r1" value="清除" />
                        </td>
                    </tr>
                </table>
            </form>  
        </div>
        <div id="win"></div>
    </body>
</html>