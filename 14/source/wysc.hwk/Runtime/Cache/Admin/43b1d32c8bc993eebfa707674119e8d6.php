<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/__THEME__/easyui.css" />
<link rel="stylesheet" type="text/css" href="__SKIN__plugin/ui/themes/icon.css" />
<script src="__SKIN__plugin/ui/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/jquery.easyui.min.js" type="text/javascript"></script>
<script src="__SKIN__plugin/ui/easyui-lang-zh_CN.js" type="text/javascript"></script>
<style type="text/css">
    *{margin:0; padding:0; color:#363636;}
    a{text-decoration:none; color:#000;}
</style>
        <script>
            var oldorder;
            var goodsname = '<?php echo ($goodsname); ?>';
            var cateid = '<?php echo ($cateid); ?>';
            var brand = '<?php echo ($brand); ?>';
            var module = '<?php echo ($module); ?>';
            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=goods&a=edit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a><a href='Javascript:void(0)' onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton' data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }
            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({plain: true});
            }
            function gotopage(_page, _pagesize) {
                //console.log(_page);
                if (goodsname)
                    _searchstr += '&goodsname=' + goodsname;
                if (cateid)
                    _searchstr += '&cateid=' + cateid;
                if (brand != 0)
                    _searchstr += '&brand=' + brand;
                if (module != 0)
                    _searchstr += '&module=' + module;
                window.location.href = 'index.php?g=admin&m=Goods&a=manage&' + _searchstr + '&page=' + _page;
            }
            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该商品', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=Goods&a=del&id=' + _id;
                    }
                });
            }
            function changeclass() {
                var _items = $('#datagrid').datagrid('getSelections');
                //alert(_items.length);
                if (_items.length == 0) {
                    $.messager.alert('提示', '未选中任何商品', 'info');
                    return false;
                }
                var _tocategory = $('#cc').combotree('getValue');
                if (!_tocategory) {
                    $.messager.alert('提示', '请选择移动分类', 'info');
                    return false;
                }
                var _sel = '';
                for (var _i = 0; _i < _items.length; _i++) {
                    _sel += ',' + _items[_i].id;
                }
                _sel = _sel.substring(1);
                window.location.href = "index.php?g=admin&m=Goods&a=move&ids=" + _sel + "&to=" + _tocategory;
            }
            function delss() {
                var _items = $('#datagrid').datagrid('getSelections');
                if (_items.length == 0) {
                    $.messager.alert('提示', '未选中任何商品', 'info');
                    return false;
                }
                var _sel = '';
                for (var _i = 0; _i < _items.length; _i++) {
                    _sel += ',' + _items[_i].id;
                }
                _sel = _sel.substring(1);
                window.location.href = "index.php?g=admin&m=Goods&a=dels&ids=" + _sel;
            }
            function dels() {
                $.messager.confirm('确认删除', '是否确认删除该商品', function (r) {
                    if (r) {
                        delss();
                    }
                });
            }
            function dosearch() {
                var _goodsname = $('#goodsname').val();
                var _cateid = $('#cateid').combotree('getValue');
                var _module = $('#module').combobox('getValue');
                var _brand = $('#brand').combobox('getValue');
                var _searchurl = "index.php?g=admin&m=goods&a=manage";
                var _searchstr = '';
                if (_goodsname)
                    _searchstr += '&goodsname=' + _goodsname;
                if (_cateid)
                    _searchstr += '&cateid=' + _cateid;
                if (_brand != 0)
                    _searchstr += '&brand=' + _brand;
                if (_module != 0)
                    _searchstr += '&module=' + _module;
                _searchurl += _searchstr;
                window.location.href = _searchurl;
            }
            function myorders(obj) {
                var _data = {id: obj.id, listorder: obj.value}
                $.get("<?php echo U('Goods/listorder');?>", _data, function (data) {
                    if (data == 0) {
                        obj.value = oldorder;
                    }
                })
            }
            function saveorder(obj) {
                oldorder = obj.value;
            }
        </script>
        <title>商品管理</title>
    </head>
    <body>
        <div class="easyui-panel" data-options="title:'商品管理',
             border:false,
             iconCls:'icon-application_view_gallery'
             ">
            <div class="easyui-panel" style="padding:10px; background-color:#fafafa;" data-options="title:'搜索',border:false,iconCls:'icon-application_form_magnify',collapsible:true, collapsed:true">
                商品名称 ：<input type="text"  id="goodsname"/> 所属分类：<select  name="category_id" id="cateid" class="easyui-combotree" data-options="
                                                                         url:'<?php echo U('Category/combotreejson');?>'"></select> 
                商标:<select name="brand" id="brand" class="easyui-combobox">
                    <option value="0">选择商标</option>
                    <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brands): $mod = ($i % 2 );++$i;?><option value="<?php echo ($brands[id]); ?>"><?php echo ($brands[brandname]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                模型： <select name="module" id="module" class="easyui-combobox">
                    <option value="0">选择模型</option>
                    <?php if(is_array($modules)): $i = 0; $__LIST__ = $modules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$moudles): $mod = ($i % 2 );++$i;?><option value="<?php echo ($moudles[id]); ?>"><?php echo ($moudles[attrname]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <a href="javascript:void(0)" onclick="dosearch()" class="easyui-linkbutton" data-options="
                   iconCls:'icon-zoom',
                   plain:false
                   ">搜索</a> 
            </div>  
            <form name="f1" method="post" action="<?php echo U('Goods/listorder');?>" id="f1">
                <table id="datagrid" class="easyui-datagrid" data-options="border:false,
                       fitColumns:true,
                       toolbar:'#toolbar',
                       onLoadSuccess:renderbutton,
                       striped:true,
                       rownumbers:true,
                       singleSelect:false,
                       checkOnSelect:false
                       " style="dispalay:none;">
                    <thead>   
                        <th data-options="align:'center',width:20,checkbox:true">id</th>
                        <th data-options="align:'center',field:'listorder'">排序</th>
                        <th data-options="field:'id',align:'center',width:20">id</th>    
                        <th data-options="field:'goodsname',width:80">商品名称</th>   
                        <th data-options="field:'price',width:30">商场价格</th> 
                        <th data-options="field:'mprice',width:30">市场价格</th>  
                        <th data-options="field:'categoryname',align:'center',width:30">所属分类</th>
                        <th data-options="field:'brandname',align:'center',width:30">商标</th>
                        <th data-options="field:'attrname',align:'center',width:30">模型</th>
                        <th data-options="field:'typename',align:'center',width:30">类型</th>
                        <th data-options="field:'storenum',align:'left',width:30">库存</th>
                        <th data-options="field:'is_show',align:'center',width:30">是否显示</th>
                        <th data-options="field:'opration',
                            formatter:createop
                            ">操作</th>
                    </thead>
                    <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                <td></td>
                                <td><input id="<?php echo ($val[id]); ?>" type="text" name="orders[<?php echo ($val[id]); ?>]" value="<?php echo ($val[listorder]); ?>" style="text-align:center; font-size:10px; width:20px;" onblur="myorders(this)" onfocus="saveorder(this)" /></td>
                                <td><?php echo ($val[id]); ?></td>
                                <td><?php echo ($val[goodsname]); ?>
                                    <?php if($val[thumb] != ''): ?><img src="__SKIN__/plugin/ui/themes/icons/image.png" style="margin-right: 10px;float: right;"><?php endif; ?>
                                </td>
                                <td><?php echo ($val[price]); ?></td>
                                <td><?php echo ($val[mprice]); ?></td>
                                <td><?php echo ($val[catename]); ?></td>
                                <td><?php echo ($val[brandname]); ?></td>
                                <td><?php echo ($val[attrname]); ?></td>
                                <td><?php echo (($val[typename])?($val[typename]):'无'); ?></td>
                                <td><?php echo ($val[storenum]); ?>
                                    <?php if($val[storenum] < C('LOW_STORENUM')): ?><img src="__SKIN__/plugin/ui/themes/icons/lightning.png" title="库存不足" alt="库存不足" style="margin-right: 10px;float: right;"><?php endif; ?>
                                </td>
                                <td>
                                    <?php if($val[is_show] == 1): ?>是
                                        <?php else: ?>
                                        否<?php endif; ?>
                                </td>
                                <td></td>
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
                    <a href="<?php echo U('Goods/add');?>" class="easyui-linkbutton"data-options="plain:true,
                       iconCls:'icon-application_form_add'">添加商品</a>
                    <select id="cc" name="category_id" class="easyui-combotree" 
                            data-options="
                            url:'<?php echo U('Category/combotreejson');?>'
                            ">
                    </select>
                    <a href="javascript:void(0)" onclick="changeclass()" class="easyui-linkbutton" data-options="plian:false,
                       iconCls:'icon-arrow_right'">批量移动</a>
                    <a href="javascript:void(0)" onclick="dels()" class="easyui-linkbutton" data-options="plian:false,
                       iconCls:'icon-cross'">批量删除</a>
                    <a href="javascript:void(0)" onclick="orders()" class="easyui-linkbutton" data-options="plian:false,
                       iconCls:'icon-key_go'">排序</a>
                    <input type="submit" name="s1" value="提交" />
                </div>
            </form>
        </div>
    </body>
</html>