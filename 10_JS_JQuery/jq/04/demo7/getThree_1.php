<?php
$class = array(
    "精品男装"=>array(
        "夹克"=>array("七牌","劲霸"),
        "风衣"=>array("红色","绿色")
        ),
    "精品女装"=>array(
        "连衣裙"=>array(),
        "内衣"=>array()),
    "精品童装"=>array(
        "1-3岁"=>array(),
        "4-6岁"=>array()),
    "精品运动装"=>array(
        "上衣"=>array(),
        "下衣"=>array()
        ),
);




$key = $_GET["key"]; //2
$key1 = $_GET["key1"]; //2

$arr = $class[$key][$key1];

$arr = $class["精品男装"]["夹克"];



?>
<option value="-1">请选择第三级</option>
<?php
foreach($arr as $value){
	//// 构造 option 用于插入到 select 标签中
?>
	<option value="<?php echo $value ?>"><?php echo $value ?></option>
<?php
}
?>