<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图票列表</title>
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
<script type="text/javascript">
    $(function(){
        $('.filelist>li>img').click(function(e){
            $('#icon').val('icon-'+this.alt);
            $('#win').window('close');
        })
        // 弹出 nodeadd.html 文档中的 #sssl
        //alert($('#sssl').text()); 
    })
</script>
<style type="text/css">
        .filelist {
            list-style: none;
        }
        .filelist li{ float: left; margin: 5px;
            cursor:pointer;
         }
        .main{
            padding: 20px;
        }
    </style>
   <div class="main">
       <ul class="filelist">
           <!--循环遍历文件列表-->
           <?php if(is_array($files)): $i = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i; if($file!='.' && $file!='..'): ?><li><img src="<?php echo ($path); echo ($file); ?>" alt="<?php echo (substr($file,0,-4)); ?>" width="16" height="16" /></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
       </ul>
   </div>
	
</body>

</html>