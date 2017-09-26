<?php
/**
 * 利用 PHP 的 SPL 快速实现 Observer 设计模式 观察者模式
 * 设计模式 http://blog.csdn.net/heiyeshuwu/article/details/7235355
 */

class car implements SplSubject
{
    //车的类型
    private $carName;
    //车的状态，0为关闭，1这启动车子
    private $carState = 0;
    //初始化车的速度表值
    private $carSpeed = 0;
    //各项车的性能观察对象
    private $Observers;
    public function __construct($Name)
    {
        $this->carName   = $Name;
        $this->Observers = new SplObjectStorage;
    }
    //启动
    public function start()
    {
        $this->carState = 1;
        $this->notify();
    }
    //停车
    public function stop()
    {
        $this->carState = 0;
        $this->carSpeed = 0;
        $this->notify();
    }
    //加速
    public function accelerate($Acceleration)
    {
        if (0 === $this->carState) {
            throw new Exception('先踩油门，不然车怎走啊!!!');
        }
        if (!is_int($Acceleration) || $Acceleration < 0) {
            throw new Exception('加速值错了啊');
        }
        $this->carSpeed += $Acceleration;
        $this->notify();
    }
    //增加监测对象
    public function attach(SplObserver $observer)
    {
        if (!$this->Observers->contains($observer)) {
            $this->Observers->attach($observer);
        }
        return true;
    }
    //删除监测对象
    public function detach(SplObserver $observer)
    {
        if (!$this->Observers->contains($observer)) {
            return false;
        }
        $this->Observers->detach($observer);
        return true;
    }
    //传送对象
    public function notify()
    {
        foreach ($this->Observers as $observer) {
            $observer->update($this);
        }
    }
    public function __get($Prop)
    {
        switch ($Prop) {
            case 'STATE':
                return $this->carState;
                break;
            case 'SPEED':
                return $this->carSpeed;
                break;
            case 'NAME':
                return $this->carName;
                break;
            default:
                throw new Exception($Prop . 'cannotberead');
        }
    }
    public function __set($Prop, $Val)
    {
        throw new Exception($Prop . 'cannotbeset');
    }
}
/**
 * 状态观察者
 */
class carStateObserver implements SplObserver
{
    private $SubjectState;
    public function update(SplSubject $subject)
    {
        switch ($subject->STATE) {
            case 0:
                if (is_null($this->SubjectState)) {
                    echo $subject->NAME . '没有启动呢' . "\t";
                } else {
                    echo $subject->NAME . '熄火了' . "\t";
                }
                $this->SubjectState = 0;
                break;
            case 1:
                if (1 !== $this->SubjectState) {
                    echo $subject->NAME . '启动了' . "\t";
                    $this->SubjectState = 1;
                }
                break;
            default:
                throw new Exception('UnexpectederrorincarStateObserver::update()');
        }
    }
}
/**
 * 速度观察者
 */
class carSpeedObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        if (0 !== $subject->STATE) {
            echo $subject->NAME . '目前速度为' . $subject->SPEED . 'Kmh' . "\t";
        }
    }
}


/**
 * 超速观察者
 */
class carOverspeedObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        if ($subject->SPEED > 130) {
            throw new Exception('加速限制在130以内,你违规了!' . "\t");
        }
    }
}

header("Content-type:text/html;charset=utf-8");

try {
    $driver           = new car('AUDIA4');
    $driverObserver1  = new carStateObserver;
    $driverObserver2  = new carSpeedObserver;
    $drivesrObserver3 = new carOverspeedObserver;
    $driver->attach($driverObserver1);
    $driver->attach($driverObserver2);
    $driver->attach($drivesrObserver3);
    $driver->start();
    echo "<br />---1------------------------------------------------<br />";
    $driver->accelerate(10);
    echo "<br />---2------------------------------------------------<br />";
    $driver->accelerate(30);
    echo "<br />---3------------------------------------------------<br />";
    $driver->stop();
    echo "<br />---4------------------------------------------------<br />";
    $driver->start();
    echo "<br />---5------------------------------------------------<br />";
    $driver->accelerate(50);
    echo "<br />---6------------------------------------------------<br />";
    $driver->accelerate(70);
    echo "<br />---7------------------------------------------------<br />";
    $driver->accelerate(10);
    echo "<br />---8------------------------------------------------<br />";
    $driver->accelerate(150);
}
catch (Exception $e) {
    echo $e->getMessage();
}
?>