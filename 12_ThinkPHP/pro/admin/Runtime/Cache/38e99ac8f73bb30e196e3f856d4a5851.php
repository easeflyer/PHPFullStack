<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/Images/css1/css.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
</head>

<body>
    <form action="__URL__/updateAction/bId/<?php echo ($rs[0]['bId']); ?>" method="post" enctype="multipart/form-data">
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" 
border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="4" height="25">图书修改
        
     </th>
    </tr>
    
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">图书编号</td>
      <td class="td_bg" width="30%"><input type="text" name="bCode" value="<?php echo ($rs[0]['bCode']); ?>" /></td>
      <td class="td_bg" width="20%" height="23" align="right">图书名称</td>
      <td class="td_bg" width="30%"><input type="text" name="bName" value="<?php echo ($rs[0]['bName']); ?>" /></td>
    </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">作者</td>
      <td class="td_bg" width="30%"><input type="text" name="bAuth" value="<?php echo ($rs[0]['bAuth']); ?>" /></td>
      <td class="td_bg" width="20%" height="23" align="right">翻译者</td>
      <td class="td_bg" width="30%"><input type="text" name="bTrabs" value="<?php echo ($rs[0]['bTrabs']); ?>" /></td>
    </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">出版社</td>
      <td class="td_bg" width="30%">
          <select name="pId">
              <option value="-1">请选择出版社</option>
              <?php if(is_array($rs_2)): foreach($rs_2 as $key=>$val): if($val["pId"] == $rs[0][pId]): ?><!--------！！！--修改这没有默认选中  需要完善---------->
                      <option value="<?php echo ($val["pId"]); ?>" selected="selected"><?php echo ($val["pName"]); ?></option>
              <?php else: ?>
              <option value="<?php echo ($val["pId"]); ?>"><?php echo ($val["pName"]); ?></option><?php endif; endforeach; endif; ?>
          </select>
      </td>
      <td class="td_bg" width="20%" height="23" align="right">索书号</td>
      <td class="td_bg" width="30%"><input type="text" name="bISBN" value="<?php echo ($rs[0]['bISBN']); ?>" /></td>
    </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">版次</td>
      <td class="td_bg" width="30%"><input type="text" name="bPcount" value="<?php echo ($rs[0]['bPcount']); ?>" /></td>
      <td class="td_bg" width="20%" height="23" align="right">页数</td>
      <td class="td_bg" width="30%"><input type="text" name="bPages" value="<?php echo ($rs[0]['bPages']); ?>" /></td>
    </tr>
    <tr>
      <td class="td_bg" width="20%" height="23" align="right">装本程度</td>
      <td class="td_bg" width="30%"><input type="text" name="bStyle" value="<?php echo ($rs[0]['bStyle']); ?>" /></td>
      <td class="td_bg" width="20%" height="23" align="right">开本</td>
      <td class="td_bg" width="30%"><input type="text" name="bSize" value="<?php echo ($rs[0]['bSize']); ?>" /></td>
    </tr>
      <script type="text/javascript">
          $(function(){
              $("#bFid").change(function(){
                  $.ajax({
                      type: "get",
                      dataType: "html",
                      url: "__URL__/selSon/random/"+Math.random()+"/bFid/"+$("#bFid option:selected").val(),
                    
                      success:function(data){
                          $("#bSid").html(data);
                      }
                  });
              });
          });
      </script>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">图书类型</td>
      <td class="td_bg" colspan="3">
          <select name="bFid" id="bFid">
              <option value="-1">请选择主类型</option>
              <?php if(is_array($rs_1)): foreach($rs_1 as $key=>$val_1): ?><!-- rs_1 所有主类型 -->
              <!-- 用遍历结果的 cId 和 当前修改产品的 bFid 进行比较
                    也就是说：遍历的所有主类id 和 当前要修改的产品的主类id 相同时显示为 selected
              -->    
              <?php if($val_1["cId"] == $rs[0][bFid]): ?><!--------！！！--修改这没有默认选中  需要完善---------->
                  <option value="<?php echo ($val_1["cId"]); ?>" selected="selected"><?php echo ($val_1["cName"]); ?></option>
              <?php else: ?>
                  <option value="<?php echo ($val_1["cId"]); ?>"><?php echo ($val_1["cName"]); ?></option><?php endif; endforeach; endif; ?>
          </select>
          <select name="bSid" id="bSid">
              
              <option value="-1">请选择子类型</option><!---三级联动菜单需要调用ajax所以要引入js包---当主类型改变子类型跟着改变 所以需要定义id--->
              <?php if(is_array($rs_3)): foreach($rs_3 as $key=>$val_3): ?><!--rs_3 由产品的bFid 获得所有的子类型-->
              
              <!--用遍历结果的cId 和 本页面要修改的产品rs[0]的bSid 进行比较
                  也就是说：当遍历的cid 和产品的小分类id 相同时 显示为 selected
              -->
              <?php if($val_3["cId"] == $rs[0][bSid]): ?><!--模板里面使用 if 参考手册语法-->
                  <option value="<?php echo ($val_3["cId"]); ?>" selected="selected"><?php echo ($val_3["cName"]); ?></option>
              <?php else: ?>
                  <option value="<?php echo ($val_3["cId"]); ?>"><?php echo ($val_3["cName"]); ?></option><?php endif; endforeach; endif; ?>              
          </select>
          
      </td>
    </tr>
      <tr>
      <td class="td_bg" width="30%" height="23" align="right">图书原封面</td>
      <td class="td_bg" colspan="3" width="70%"><img src="__ROOT__/<?php echo ($rs[0]['bImg']); ?>" width="70" height="100" ></img></td>
    </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">图书封面</td>
      <td class="td_bg" colspan="3"><input type="file" name="bImg" /></td>
    </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">市场价</td>
      <td class="td_bg" width="30%"><input type="text" name="bMprice" value="<?php echo ($rs[0]['bMprice']); ?>" /></td>
      <td class="td_bg" width="20%" height="23" align="right">京东价</td>
      <td class="td_bg" width="30%"><input type="text" name="bJDprice" value="<?php echo ($rs[0]['bJDprice']); ?>" /></td>
    </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">编辑推荐</td>
      <td class="td_bg" width="30%" colspan="3"><textarea rows="8" cols="40" name="bEditor" ><?php echo ($rs[0]['bEditor']); ?></textarea></td>
     </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">内容简介</td>
      <td class="td_bg" width="30%" colspan="3"><textarea rows="8" cols="40" name="bCon" ><?php echo ($rs[0]['bCon']); ?></textarea></td>
     </tr>
      <tr>
      <td class="td_bg" width="20%" height="23" align="right">目录</td>
      <td class="td_bg" width="30%" colspan="3"><textarea rows="8" cols="40" name="bTree" ><?php echo ($rs[0]['bTree']); ?></textarea></td>
     </tr>
  
    <tr>
        <td  colspan="4" class="td_bg" align="center">
          <input type="submit" value="修改图书" /><!---提交到动作里面 Action--->
      </td>
    </tr>
  </tbody>
</table>
    </form>

</body>
</html>