<?php

if ($_GET) {
    $strGet = "GET:" . $_GET["uName"];
}
if ($_POST){
    $strGet = "POST:" . $_POST["uName"];
}

echo $strGet;
