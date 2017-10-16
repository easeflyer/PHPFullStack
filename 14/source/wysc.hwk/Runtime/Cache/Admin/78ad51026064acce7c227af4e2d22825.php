<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
    http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>编辑用户</title>
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <link rel="stylesheet" type="text/css" href="__SKIN__/css/tableform.css" />
    </head>
    <body>
        <div  class="easyui-panel" data-options="
              title:'编辑用户',
              border:false,
              iconCls:'icon-user_edit'
              ">
            <form name="f1" action="" method="post" enctype="multipart/form-data">   
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <th>用户名</th><td><input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" /><input type="text" name="username" class="ipt" value="<?php echo ($data["username"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th>密码</th><td><input type="password" name="pwd" class="ipt"></td>
                    </tr>
                    <tr>
                        <th>确认密码</th><td><input type="password" name="confirmpwd" class="ipt"></td>
                    </tr>
                    <tr>
                        <th>用户级别</th><td><select name="userrank_id" class="easyui-combobox" data-options="
                                                 url:'<?php echo U('Userrank/rankjson');?>',
                                                 valueField:'id',
                                                 textField:'rankname',
                                                 value:'<?php echo ($data["userrank_id"]); ?>'
                                                 " style="width:170px;"></select></td>
                    </tr>
                    <tr>
                        <th>性别</th>
                        <td>
                            <input type="radio" name="sex" value="1" 
                            <?php if($data["sex"] == 1): ?>checked<?php endif; ?>/>男&nbsp;
                            <input type="radio" name="sex" value="2" 
                            <?php if($data["sex"] == 2): ?>checked<?php endif; ?>/>女&nbsp;
                            <input type="radio" name="sex" value="0" 
                            <?php if($data["sex"] == 0): ?>checked<?php endif; ?>/>保密
                        </td>
                    </tr>
                    <tr>
                        <th>邮箱</th><td><input type="text" name="email" class="ipt" value="<?php echo ($data["email"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>出生日期</th><td><input type="text" name="birthday"  class="easyui-datebox" data-options="value:'<?php echo ($data["birthday"]); ?>'" /></td>
                    </tr>
                    <tr>
                        <th>积分</th><td><input type="text" name="points" class="ipt" value="<?php echo ($data["points"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>qq</th><td><input type="text" name="qq" class="ipt" value="<?php echo ($data["qq"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>phone</th><td><input type="text" name="phone" class="ipt" value="<?php echo ($data["phone"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>提示问题</th><td><input type="text" name="question" class="ipt" value="<?php echo ($data["question"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>答案</th><td><input type="text" name="answer" class="ipt" value="<?php echo ($data["answer"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>锁定</th><td><input type="radio"  name="islock" checked  value="0" 
                        <?php if($data["islock"] == 0): ?>checked<?php endif; ?>
                        />否&nbsp;<input type="radio"  name="islock" value="1" 
                        <?php if($data["islock"] == 1): ?>checked<?php endif; ?>/>是</td>
                    </tr>
                    <tr>
                        <th></th><td><input type="submit" name="s1" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="r1" value="清除"></td>
                    </tr>
                </table> 
            </form>  
        </div>
    </body>
</html>