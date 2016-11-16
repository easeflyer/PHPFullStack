<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>商品管理</title>
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
            var oldorder;
            var goodname = '<?php echo ($goodname); ?>';
            var catid = '<?php echo ($catid); ?>';
            var brand = '<?php echo ($brand); ?>';
            var module = '<?php echo ($moudle); ?>';
            // 用于构建 操作列
            function createop(_v, _r) {
                return "<a href='index.php?g=admin&m=goods&a=edit&id=" + _r.id + "' class='easyui-linkbutton' data-options='iconCls:\"icon-drive_edit\"'>编辑</a><a href='javascript:void(0)'  onclick='confirmdel(" + _r.id + ")' class='easyui-linkbutton'   data-options='iconCls:\"icon-cancel\"'>删除</a>";
            }

            function renderbutton() {
                $('a.easyui-linkbutton').linkbutton({
                    plain: true
                });
            }

            function confirmdel(_id) {
                $.messager.confirm('确认删除', '是否确认删除该商品', function (r) {
                    if (r) {
                        window.location.href = 'index.php?g=admin&m=goods&a=del&id=' + _id;
                    }
                });
            }
            // 翻页
            function gotopage(_page, _pagesize) {
                console.log(_page);
                var _searchstr = '';
                if (goodname)
                    _searchstr += '&goodname=' + goodname;
                if (catid)
                    _searchstr += '&catid=' + catid;
                if (brand != 0)
                    _searchstr += '&brand=' + brand;
                if (module != 0)
                    _searchstr += '&module=' + module;
                window.location.href = 'index.php?g=admin&m=Goods&a=manage&' + _searchstr + '&page=' + _page;
            }
            // 处理商品的类型移动。也就是批量修改商品的类型。  或者说把多个商品移动到 指定分类
            function changeclass() {
                var _items = $('#datagrid').datagrid('getSelections');
                if (_items.length == 0) { // 判断是否选择商品
                    $.messager.alert('提示', '未选中任何商品', 'info');
                    return false;
                }
                var _tocategory = $('#cc').combotree('getValue');
                if (!_tocategory) { // 判断是否选择分类
                    $.messager.alert('提示', '请选择移动分类', 'info');
                    return false;
                }
                var _sel = '';
                for (var _i = 0; _i < _items.length; _i++) {
                    _sel += ',' + _items[_i].id;
                }

                _sel = _sel.substring(1); // 去掉首字符 , 第一个字符是逗号。

                window.location.href = "index.php?g=admin&m=Goods&a=move&ids=" + _sel + "&to=" + _tocategory;
            }
            // 批量删除商品
            // 调用 m=Goods&a=dels 删除商品
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
                //alert(_sel); 弹出两个被选中的 产品的 id
                window.location.href = "index.php?g=admin&m=Goods&a=dels&ids=" + _sel;

            }
            /**
             * 批量删除 商品 确认,确认后,执行 delss
             * @returns {undefined}
             */
            function dels() {
                $.messager.confirm('确认删除', '是否确认删除该商品', function (r) {
                    if (r) {
                        delss();
                    }
                });
            }
            // 执行查询：首先要构建好所有的查询字符串。
            function dosearch() {
                var _goodname = $('#goodname').val();
                var _catid = $('#catid').combotree('getValue');
                var _module = $('#module').combobox('getValue');
                var _brand = $('#brand').combobox('getValue');
                var _searchurl = "index.php?g=admin&m=goods&a=manage";
                var _searchstr = '';
                if (_goodname)
                    _searchstr += '&goodname=' + _goodname;
                if (_catid)
                    _searchstr += '&catid=' + _catid;
                if (_brand != 0)
                    _searchstr += '&brand=' + _brand;
                if (_module != 0)
                    _searchstr += '&module=' + _module;
                _searchurl += _searchstr;
                window.location.href = _searchurl;
            }
            // 用于调用 排序方法，修改排序字段的值。
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
    </head>

    <body>
        <div class="easyui-panel" data-options="
             title:'商品管理',
             border:false,
             iconCls:'icon-application_view_gallery'
             ">
            <div class="easyui-panel" style="padding:10px; background-color:#fafafa" data-options="title:'搜索', border:false,
                 iconCls:'icon-search',
                 collapsible:true,
                 collapsed:true
                 ">
                商品名称 ：<input type="text"  id="goodname"/> 所属分类：<select  name="category_id" id="catid" class="easyui-combotree" data-options="
                                                                        url:'<?php echo U('Category/combotreejson');?>'"></select> 
                商标： <select name="brand" id="brand" class="easyui-combobox">
                    <option value="0">选择商标</option>
                    <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><option value="<?php echo ($brand[id]); ?>"><?php echo ($brand[brandname]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                模型： <select name="module" id="module" class="easyui-combobox">
                    <option value="0">选择模型</option>
                    <?php if(is_array($modules)): $i = 0; $__LIST__ = $modules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$moudle): $mod = ($i % 2 );++$i;?><option value="<?php echo ($moudle[id]); ?>"><?php echo ($moudle[attrname]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <a href="javascript:void(0)" onclick="dosearch()" class="easyui-linkbutton" data-options="
                   iconCls:'icon-search',
                   plain:false
                   ">搜索</a>
            </div>
            <form name="f1" method="post" action="<?php echo U('Goods/listorder');?>" id="f1">
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
                            align:'center', 
                            checkbox:true">id</th>
                        <th data-options="
                            align:'center',
                            field:'listorder'
                            ">排序</th>
                        <th data-options="
                            field:'id',
                            align:'center', 
                            width:20">id</th>
                        <th data-options="
                            field:'goodsname',
                            width:50">商品名称</th>
                        <th data-options="
                            field:'price',
                            width:20">商城价格</th>
                        <th data-options="
                            field:'mprice',
                            width:20">市场价格</th>
                        <th data-options="field:'categoryname',
                            align:'center', 
                            width:30">所属分类</th>
                        <th data-options="field:'brandname',
                            align:'center', 
                            width:30">商标</th>
                        <th data-options="field:'attrname',
                            align:'center', 
                            width:30">模型</th>
                        <th data-options="field:'typename',
                            align:'center', 
                            width:30">类型</th>
                        <th data-options="field:'storenum',
                            align:'left', 
                            width:30">库存</th>
                        <th data-options="field:'is_show',
                            align:'center', 
                            width:30">是否显示</th>
                        <th data-options="field:'opration',

                            formatter:createop
                            ">操作</th>
                    </thead>
                    <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                <td></td>
                                <td><input id="<?php echo ($val[id]); ?>" type="text" name="listorders<?php echo ($val[id]); ?>" value="<?php echo ($val[listorder]); ?>" style="text-align:center; width:20px" onblur="myorders(this)" onfocus="saveorder(this)" /></td>
                                <td><?php echo ($val[id]); ?></td>
                                <td><?php echo ($val[goodsname]); ?>
                                    <?php if($val[thumb] != ''): ?><img src="__SKIN__/plugin/ui/themes/icons/image.png" style="margin-right: 10px;
                                             float: right;"><?php endif; ?>
                                </td>
                                <td><?php echo ($val[price]); ?></td>
                                <td><?php echo ($val[mprice]); ?></td>
                                <td><?php echo ($val[catname]); ?></td>
                                <td><?php echo ($val[brandname]); ?></td>
                                <td><?php echo ($val[attrname]); ?></td>
                                <td><?php echo (($val[typename])?($val[typename]):'无'); ?></td>
                                <td><?php echo ($val[storenum]); ?> 
                                    <?php if($val[storenum] < C('LOW_STORENUM')): ?><img src="__SKIN__/plugin/ui/themes/icons/lightning.png" title="库存不足" alt="库存不足" style="margin-right: 10px;
                                             float: right;"><?php endif; ?></td>
                                <td>
                                    <?php if($val[is_show] == 1): ?>是
                                        <?php else: ?> 否<?php endif; ?>
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
                    <a href="<?php echo U('Goods/add');?>" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-application_form_add'">添加商品</a>
                    <select id="cc" name="category_id" class="easyui-combotree" data-options="
                            url:'<?php echo U('Category/combotreejson');?>'"></select>
                    <a href="javascript:void(0)" onclick="changeclass()" class="easyui-linkbutton" data-options="plian:false,iconCls:'icon-arrow_right'">批量移动</a>
                    <a href="javascript:void(0)" onclick="dels()" class="easyui-linkbutton" data-options="plian:false,iconCls:'icon-cross'">批量删除</a>
                    <a href="javascript:void(0)" onclick="orders()" class="easyui-linkbutton" data-options="plian:false,iconCls:'icon-key_go'">排序</a>
                    <input type="submit" name="s1" value="提交">
                </div>
            </form>
        </div>
    </body>

</html>