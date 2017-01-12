<?php

//多态的举例:  demo 比作乐器
interface demo3 {
    //3个方法都是抽象方法。
    function play();
    function what();
    function fun3();
}

// 子类1
class demoSon1 implements demo3 {
    //子类要重写父类中所有抽象方法。
    function play() {
        // 演奏的方法 若干语句
        echo "演奏 demoSon1";
    }
    function what() {
        echo "我是 乐器 demoSon1";
    }
    function fun3() {
        echo "ccccc";
    }

}
// 子类 2
class demoSon2 implements demo3 {

    function play() {
        // 演奏的方法
        echo "演奏 demoSon2";
    }
    function what() {
        echo "我是乐器 demoSon2";
    }
    function fun3() {
        echo "33333";
    }

}

//体现以下多态
class diaoyong {
    function play($str) { //根据str 来决定 调用son1中的fun1 还是 son2中的fun1   $str=$ds1
        $str->play();
    }
    function what($str) {
        $str->what();
    }
}

$ds1 = new demoSon1();
$ds2 = new demoSon2();

$dy = new diaoyong(); //实例化   对象可以作为参数传递*****
$dy->play($ds1);  //根据传入对象不同，该方法调用fun的内容也不同。 体现多态  动态的改变了 操作行为： 不同的演奏方法。

echo "<br />====================================================================<br />";

//补充多态:
class work {

    function getFun() {
        $dy = new diaoyong(); //实例化   对象可以作为参数传递

        $ds1 = new demoSon1();
        $ds2 = new demoSon2();
        $dy->play($ds1);
        $dy->play($ds2);
    }

}

$w = new work();
$w->getFun();









