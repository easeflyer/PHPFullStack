知识点:
	一 、 基础 函数（数学 日期 字符串）
	二 、 php 流程控制 循环
	
	一 、 基础 函数（数学 日期 字符串）
	函数 : 执行某项功能的特定代码。
	sin()  cos() 数学中
	sin(30) = 0.5
	函数名称(参数)   =  0.5 函数的结果（返回值:可以对变量赋值）
	$a =sin(30)
	
	php函数的格式:
		数据类型  函数名称（参数类型  val,参数类型 val,参数类型 val,【参数类型 val】）
		 数据类型 返回值的类型  string int float bool array object result null  
		 mixed 不是具体的类型  混合类型（类型不确定）
		【】表示参数可选（可有可无）
	
	1 数学函数  
		max      mixed max ( number $arg1 , number $arg2......... ) 求一组数据的最大值
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
echo "<br />------------Math----------------------<br />";
$ma = max(12,45,5,8,7.2);
echo $ma."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		min      mixed min ( number $arg1 , number $arg2 ........)
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$mi = min(34,2,4,8,4.6);
echo $mi."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		ceil       float ceil ( float $value )   进一取整   小数部分去掉，整数+1   如果是整数 ，就是本身（float）
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$num1 = 3;
$ce = ceil($num1);
var_dump($ce);
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		floor     float floor ( float $value   )舍去法取整  小数部分去掉  整数--》本身（float）
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
echo "<br />";
$num2 = 5.9;
$fl = floor($num2);
echo $fl."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		round  float round ( float $val )  四舍五入
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$ro = round($num3);
echo $ro."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		rand    int rand ([ int $min ], int $max )  产生一个随机整数
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$ra = rand(10000,99999);
echo $ra."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		mt_rand   int mt_rand ([ int $min ], int $max )  生成更好的随机数  提高效率。
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$mt = mt_rand(1000,9999);
echo $mt;
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
	2 日期函数
		时间戳:   1970.1.1 0 到现在的秒数
		
		time    int time ( void ) 返回当前的 Unix 时间戳
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
echo "<br />----------------date--------------------<br />";
$dtNum = time();
echo $dtNum ."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		date    string date ( 日期格式 [, 时间戳 ] ) 格式化一个本地时间／日期   将时间戳 转换成标准格式。
					格式:
						Y  年
						m 月
						d  日
						H  时
						i  分
						s  秒
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$dt = date("Y-m-d H:i:s");
echo $dt."<br />";

$ti = time(); //现在的时间戳
$ti5 = $ti+5*24*3600;
$dt2 = date("Y-m-d H:i:s",$ti5);
echo $dt2."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		strtotime     int strtotime ( string $time )  将标准格式 ，转换成时间戳。
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$randTime = "2008-12-3 3:3:3";
$dtNum1 = strtotime($randTime);
echo $dtNum1;
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		date_default_timezone_set     date_default_timezone_set (时区"Asia/Shanghai" ) 设置时区   "Asia/Shanghai"    //临时的。
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
date_default_timezone_set("Asia/Shanghai");
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
		
		配置文件:   了解   appserv:  c/windows/php.ini
		date.timezone = PRC  时区
		
		3 字符串
			strlen 			int strlen ( string $string )  获取字符串长度
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
echo "<br />----------string---------------<br />";
$str1 = "abcdeAGFDGfghGFDGFDijklmn";   //14    字符位置是从 0--13
echo strlen($str1)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
			strtolower 	string strtolower ( string $str ) 字符串小写
、、、、、、、、、、、、、、、、、、、、、、、
echo strtolower($str1)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、
			strtoupper	string strtoupper ( string $string )字母大写
、、、、、、、、、、、、、、、、、、、、、、、、
echo strtoupper($str1)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、
			ucfirst         string ucfirst ( string $str )  字符串中首字母大写
、、、、、、、、、、、、、、、、、、、、、、、、
$str2 = "father was a self-taught mandolin player. He was one of the best string instrument players in our town. He could not read music, but if he heard a tune a few times, he could play it";
echo ucfirst($str2)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、
			ucwords     string ucwords ( string $str ) 每个单词首字母大写
、、、、、、、、、、、、、、、、、、、、、、、、、、、
echo ucwords($str2)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、
			strrev			string strrev ( string $string ) 翻转字符串
、、、、、、、、、、、、、、、、、、、、、、、、、、
$str3 = "hello world";
echo strrev($str3)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
			trim  			string trim ( string $str  )  去掉字符串收尾的空格的。
、、、、、、、、、、、、、、、、、、、、、、、、、
$str4 = " abcdefg ";
$str5 = trim($str4);
echo strlen($str5)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、
			str_replace mixed str_replace ( mixed $search , mixed $replace , mixed $subject  ) 替换
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$str6 = "aaaazhangsanaaaaaaaa";
echo str_replace("zhangsan", "***", $str6)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
			strpos			int strpos ( string $haystack , mixed $needle)			查找字符首次出现的位置
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$str7 = "abcdecfghijklmn";
echo strpos($str7, "z");
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
			substr  		string substr ( string $string , int $start [, int $length ] ) 截取字符串
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$str8 = "abcdefghijklmn";
//echo substr($str8,2,3);
echo substr($str,-6,3)."<br />";
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
								如果没有length  将会从start位置截取到末尾。
								length: 表示 截取字符的个数（长度） 正整数
			md5 			string md5 ( string $str ) 加密
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
$str9 = "fdsafad";
echo md5($str9);
、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
			unset   		void unset ( mixed $var [, mixed $var [, $... ]] ); 释放变量
								
二 、 php 流程控制 循环
	循环:	 有限的条件内 ，往复不断做一件事情。	
	php  for  while  do...while
	1.for
	格式
	for（起始条件;终止条件;步长）{
		循环体;
	}
	
	例子：
		300     大钟寺  --》大钟寺		
		起始     终止  			       循环体					步长 单位长度
		5:30		5:30<=22:00 t		发车1						5分钟
		5:35		22:00					发车2						5分钟
		5:40		22:00					发车3						5分钟
		........................
		
		21:55   22:00					发车						5分钟
		22:00	22:00<=22:00					发车		    5分钟
		22:05   22:05<=22:00	 false		收工
		
		
		起始 
		 1      1《=5					打印1				1++
		 2		2《=5					打印2				2++
		.....
		5		5<=5					打印5				5++
		6 		6《=5  false 终止
		for（$i=1;$i<=5;$i++）{
			echo $i."<br />";
		}
		
		循环嵌套
			for(){
				for(){
				
				}
			}
			9*9乘法表
		
		2 while
			格式:
				起始条件
				while(终止条件){
					循环体;
					步长值;
				}
		
		注意：不写步长 循环将变成死循环。
		while和for的执行过程一致。
		
		3 do...while()
		格式:
			起始条件
			do{
				循环体;
				步长值;
			}while();
		
		
		注意：do...while无论终止条件是否成立，都会执行一次*******
		
		4 break continue
		break   终止循环
		continue   结束本次循环 循环体 继续下一次循环
		for while  do..while 都有效  改变循环的状态的。
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
	
	
	
	
	
	