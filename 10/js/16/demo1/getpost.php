<?php

/*
GET POST 的理解。
 *  */

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($_GET){
    echo "GET:<br />";
    print_r($_GET);
}


if($_POST){
    echo "POST:<br />";
    print_r($_POST);
    
}


?>

<html>
    <body>
        <form method="post" action="">
            name:<input name ="name" type="text" /><br />
            age:<input name ="age" type="text" /><br />
            sex:<input name ="sex" type="text" /><br />
            zip:<input name ="zip" type="text" /><br />
            <input type="submit" value="提交" />
        </form>
    </body>
</html>