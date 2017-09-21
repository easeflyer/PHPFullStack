<?php

    //定义一个“人”类作为 接口
    interface human{
        function eat();
        function play();
        function say();
    }
    /*
     * 快递接口
     *  收，发
     */
    interface express{
        function receive();
        function send();
    }

    /*
     * 商业接口
     * 买，卖
     */
    interface business{
        function buy();
        function sell();
    }

    
    class Person implements human{

        //声明一个新变量公共变量$name，可被任何包中的类访问
        public $name;//人的名字
        public $sex;//人的性别
        public $age;//人的年龄
        //声明该类的一个方法
        function say() {//这个人可以说话的方法
            echo "你好！<br />";
            echo "我的的名字是：" . $this -> name ."<br />";
            echo "我的性别是：" . $this -> sex ."<br />";
        }
        function play(){
            echo "Person 的 play 方法。人有很多娱乐活动。<br />";
        }
        function eat(){
            echo "Person 的 eat 方法，人都要吃饭，但每个人的口味不同。<br />";
        }
        
    }
    //声明新的Student类为Person的子类
    class Student extends Person{
        public $school;
        /*
         * 增加的方法
         */
        function study() {
            //parent:: 可用于调用父类中定义的成员方法。
            parent::say();
            echo "我的年龄是：" . $this -> age . "<br />我正在" . $this -> school . "上学。<br />";
        }
        
        function eat(){
            parent::eat();
            echo "我是 Student 的eat方法，学生在学校食堂吃饭。<br />";
        }
    }
    
    /*
     * 快递员类 继承自人 同时实现了 快递接口，会快递工作
     */
    
    class ExpWorker extends Person implements express{
        function receive(){
            echo "ExpWorker继承自Person,且实现了快递接口，这是 接收(recive) 快递方法<br />";
        }
        function send(){
            echo "ExpWorker继承自Person,且实现了快递接口，这是 发送（send） 快递方法<br />";
        }
        
        function eat(){
            parent::eat();
            echo "快递员往往不按点吃饭。";
        }
    }

    class ExpressCom{
        function sendbox(express $w1){
            echo "先进行扫码再发送！<br />";
            $w1->send();
        }
        function receivebox(express $w1){
            echo "先进行登记再收货！<br />";
            $w1->receive();
        }
        
        function eat(Person $w1){
            $w1->eat();
        }
    }
    
    
    //只用将P1定义为学生类即可
    $p1 = new Student();//创建实例对象$p1
    //为P1的name，sex，age，school属性赋值
    $p1 -> name = "张三";
    $p1 -> sex = "男";
    $p1 -> age = "18";
    $p1 -> school = "某某学校";
    $p1 -> study();
    $p1->eat();
    
    echo "<hr />";
    $w1 = new ExpWorker();
    $w1->receive();
    $w1->send();
    $w1->eat();


    echo "<hr />";
    
    $exp = new ExpressCom();
    $w1 = new ExpWorker();
    $w2 = new ExpWorker();
    /*
     * 这里因为 快递公司要求 必须会快递工作才能胜任。也就是说实现了 快递接口的人才能完成工作。
     */
    $exp->receivebox($w1);
    $exp->sendbox($w2);
    $exp->eat($w1);
    $exp->eat($w2);
    
    echo "<hr />";
    
    class robot implements express{
        function receive() {
            echo "以后顺丰将采用无人机 进行收发快递！receive<br />";
        }
        function send(){
            echo "以后顺丰将采用无人机 进行收发快递！send<br />";
        }
    }
    
    $r1 = new robot();
    
    $exp->receivebox($r1);
    $exp->sendbox($r1);
    //$exp->eat($r1)  // 机器人 不需要吃饭。
    
?>