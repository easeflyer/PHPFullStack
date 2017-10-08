<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加文章</title>
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

    </head>

    <body>
        <div class="easyui-panel" data-options="
             title:'编辑管理员',
             border:false,
             iconCls:'icon-user_add'
             ">
            <form name="f1" action="" method="POST" enctype="multipart/form-data">
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>用户名</th>
                        <td>
                            <input type="hidden" name="id" value="<?php echo ($data[id]); ?>" />
                            <input type="text" name="username" class="ipt" value="<?php echo ($data[username]); ?>" >
                        </td>
                    </tr>
                    <tr>
                        <th>密码</th>
                        <td>
                            <input class="ipt" type="password" name="pwd" />
                        </td>
                    </tr>
                    <tr>
                        <th>确认密码</th>
                        <td>
                            <input class="ipt" type="password" name="repwd" />
                        </td>
                    </tr>
                    <tr>
                        <th>所属角色</th>
                        <td>
                            <?php if(is_array($roledata)): $i = 0; $__LIST__ = $roledata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="role_id[]" value="<?php echo ($vo["id"]); ?>" 
                                       <?php if($vo[ischeck]): ?>checked<?php endif; ?>
                                    />&nbsp;&nbsp<?php echo ($vo["name"]); ?>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>


                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="reset" name="r1" value="清除">
                                    </td>
                                    </tr>

                                    </table>
                                    </form>
                                    </div>
                                    </body>

                                    </html>