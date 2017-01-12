<?php

/* 用户数据的处理页面  增 删  改
  根据 act 参数 执行不同的过程。

  添加删除修改 都是执行了对应的 sql 语句来完成。

 */

$link = @mysql_connect("localhost", "root", "") or die("连接失败:" . mysql_error());
mysql_select_db("test", $link);
mysql_query("set names utf8");

$act = $_GET["act"];  //路径传值

/**
 * 用户 添加
 */
if ($act == "add") {
    $uName = $_POST["uName"];
    $uPwd = $_POST["uPwd"];
    $uSex = $_POST["uSex"];
    $uTel = $_POST["uTel"];
    $uEmail = $_POST["uEmail"];
    
    
    //变量写入字符串     整形  {$a}  字符串'{$a}'  日期 '{$a}'
    $sql = "insert into users(uName, uPwd, uSex, uTel, uEmail) values('{$uName}', '{$uPwd}', '{$uSex}', '{$uTel}', '{$uEmail}')";
    
    if (mysql_query($sql)) {
        echo "用户添加成功";
    } else {
        echo "用户添加失败";
    }
    /**
     * 用户 删除
     */
} else if ($act == "delete") {
    $id = $_GET["id"];
    $sql = "delete from users where id={$id}";
    if (mysql_query($sql)) {
        echo "用户删除成功";
    } else {
        echo "用户删除失败";
    }
    /**
     *  用户 修改。
     */
} else if ($act == "update") {
    $id = $_GET["id"];
    $uName = $_POST["uName"];
    $uPwd = $_POST["uPwd"];
    $uSex = $_POST["uSex"];
    $uTel = $_POST["uTel"];
    $uEmail = $_POST["uEmail"];
    $sql = "update users set  uName='{$uName}', uPwd='{$uPwd}', uSex='{$uSex}', uTel='{$uTel}', uEmail='{$uEmail}'   where id={$id}";
    if (mysql_query($sql)) {
        echo "用户修改成功";
    } else {
        echo "用户修改失败";
    }
}
