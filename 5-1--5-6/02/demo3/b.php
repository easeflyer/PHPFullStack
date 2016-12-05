<?php
//获取session值
session_start();
echo "*****".$_SESSION["un"]."<br />";
echo "#####".$_COOKIE["up"]."<br />";
print_r($_COOKIE);