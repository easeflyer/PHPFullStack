



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


$key1 = $_GET["key"]; //2

$arr = $class[$key1];

$arr = $class["精品男装"];
?>

<option value="-1">请选择第二级</option>

<?php
foreach ($arr as $key => $value)  {
?>
<option value="<?php echo $key ?>"><?php echo $key ?></option>

    
<?php

}

?>
