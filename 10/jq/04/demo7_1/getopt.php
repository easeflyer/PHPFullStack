<?php
$arrOne = array(
    1 => array(
        array(11, "夹克"),
        array(12, "风衣")
    ),
    2 => array(
        array(21, "短裙"),
        array(22, "套装"),
    )
);

$arrTwo = array(
    11 => array(
        array(11, "七牌"),
        array(12, "劲霸")
    ),
    12 => array(
        array(21, "abc"),
        array(22, "def"),
    )
);



if (isset($_GET["oneId"])) {
    $id = $_GET["oneId"];
    for($i=0;$i<length($arrOne);$i++){
        echo "<option value='"+$arrOne[$id][i][0]+"'>"+$arrOne[$id][i][1]+"</option>";
    } 
} else {
    $id = $_GET["twoId"];
    for($i=0;$i<$arrOne.length;$i++){
        echo "<option value='"+$arrOne[$id][i][0]+"'>"+$arrOne[$id][i][1]+"</option>";
    } 
    
}

?>