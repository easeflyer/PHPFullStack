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
    <script type="text/javascript" src="__SKIN__plugin/editor/kindeditor-min.js">
    </script>
    <script type="text/javascript" src="__SKIN__plugin/editor/lang/ZH_CN.js">
    </script>
    <script>
    	 var editor;
            KindEditor.ready(function(K) {
                K.create('#goodsinfo,#goodpra');
            })
    </script>
    <script type="text/javascript">
            function setjump(obj){
                if(obj.value==1){
                    $('#jumpurl').attr('disabled',false);
                }else{
                    $('#jumpurl').attr('disabled',true);
                }
            }
            function addhttp(obj){
                var _val=obj.value;
                var _pattern=/^http:\/\//;
                if(_val!=''){
                    if(!_pattern.test(_val)){
                        obj.value='http://'+obj.value;
                    }
                }
            }
    </script>
</head>

<body>
    <div class="easyui-panel" data-options="
	title:'添加文章',
	border:false,
	iconCls:'icon-page_add'
">
        <form name="f1" action="" method="POST" enctype="multipart/form-data">
            <table class="table-form" border="1" width="100%">
                <tr>
                    <th>文章标题</th>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($data[id]); ?>" />
                        <input type="text" name="title" class="ipt" style="width:400px;"  value="<?php echo ($data[title]); ?>">
                    </td>
                </tr>
                <tr>
                    <th>上级分类</th>
                    <td>
                        <select id="cc" name="newscate_id" class="easyui-combotree" data-options="
		url:'<?php echo U('News/combotreejson');?>',
		value:'<?php echo ($data[newscate_id]); ?>'"></select>
                    </td>
                </tr>
                <tr>
                    <th>缩略图</th>
                    <td>
                        <input type="file" name="thumb" />
                        <?php if($data[thumb]): ?><img src="__APPURL__Public/Uploads/<?php echo ($data[thumb]); ?>" alt="" height="60" /><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>是否为跳转链接</th>
                    <td>
                        <input type="radio" value="0" name="isjump"  onclick="setjump(this)" <?php if($data[isjump] == 0): ?>checked<?php endif; ?>
                        />否&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="1" name="isjump" onclick="setjump(this)" 
                        <?php if($data[isjump] == 1): ?>checked<?php endif; ?>
                        />是
                    </td>
                </tr>
                <tr>
                    <th>跳转地址</th>
                    <td>
                       <input id="jumpurl" type="text" name="jumpurl" class="ipt" style="width:300px" 
                        <?php if($data[isjump] == 0): ?>disabled<?php endif; ?>
                         onblur="addhttp(this)" value="<?php echo ($data[jumpurl]); ?>" />
                    </td>
                </tr>
                <tr>
                	<th>内容</th>
                	<td><textarea name="content" id="goodsinfo" style="width:80%; height:300px"><?php echo ($data[content]); ?></textarea></td>
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