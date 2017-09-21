知识点:
一 、提高网站运行速度 
二、提高网站运行速度常用手段--页面 静态化

一 提高网站的运行速度:
	1.memcache 缓存技术 
	2.优化sql语句: select 语句 
	3.页面静态化技术--》php-->生成html页面      不是 新建的html页面
	
	静态页面: 直接新建 html页面 并且 html div css js   后缀: .html .htm .shtml
	动态页面：.php  .jsp .apsx 为后缀 连接数据库，与数据库交互。
	
	静态页面的网址:  http:// www.baidu.com/....../文件名.html
												localhost/....../文件名.html
												
		案例：http://news.xinhuanet.com/world/2014-03/25/c_119922311.htm  --》 静态网址
		动态网址:http://www.wyzc.com/index.php?a=career&m=Index&c=app-->动态网址
	
	伪静态:  php --> 静态页面
	
	静态化的优势:
		1 静态化页面 对百度搜索机器人  友好
		2 静态化页面 ，数据 固化在页面中，减少数据访问，降低数据库压力。
		3 从技术角度测试一下 静态 是否省时。
	缺点:
		数据固化在页面中，不利于维护。****
	名词： fso 文件系统对象--》静态化。****
	
	3 从技术角度测试一下 静态 是否省时。 静态化页面省时间
		apache 工具:-->测试 网页的运行状态的。
		跳转到工具所在位置:apache/apache2.2/bin/ab.exe
		ab.exe使用格式:
			ab.exe  -n 请求总数  -c 请求的人数  url 网址/路径
		
index.php
Concurrency Level:      6
Time taken for tests:   2.873165 seconds   一共花了多长时间
Complete requests:      10000
Failed requests:        0
Write errors:           0
Total transferred:      2270000 bytes
HTML transferred:       420000 bytes
Requests per second:    3480.48 [#/sec] (mean)
Time per request:       1.724 [ms] (mean) 6个人 每次请求的总时间
Time per request:       0.287 [ms] (mean, across all concurrent requests) 每个人每次请求的时间
Transfer rate:          771.27 [Kbytes/sec] received	
index.html
Concurrency Level:      6
Time taken for tests:   2.104120 seconds  一共花了多长时间
Complete requests:      10000
Failed requests:        0
Write errors:           0
Total transferred:      6400000 bytes
HTML transferred:       3700000 bytes
Requests per second:    4752.58 [#/sec] (mean)
Time per request:       1.262 [ms] (mean)   6个人 每次请求的总时间
Time per request:       0.210 [ms] (mean, across all conc  每个人每次请求时间
Transfer rate:          2970.36 [Kbytes/sec] received

时间指标 越小越好。

二、提高网站运行速度常用手段--页面 静态化
	1 伪静态
	2 利用php自带的缓存机制，缓存数据，实现静态化，一般需要 和php文件操作 相结合
	3 利用php文件函数来实现页面静态化。	
	
2 利用php自带的缓存机制，缓存数据，实现静态化，一般需要 和php文件操作 相结合	
  1》相关配置	
	php.ini 
	output_buffering = Off   / On  开启  输出缓冲区。
	error_reporting  =  E_ALL & ~E_NOTICE  设置错误级别的。 开启
	E_ALL：所有的错误和警告
	E_NOTICE：运行时的错误

	重启apache
	
	2》函数介绍:
		ob_start ; 开启缓存：缓存文件内容，不缓存 header
		ob_get_contents(); 从缓存中得到数据；
		ob_clean()  清空缓存区中的内容。****
		ob_end_clean();关闭缓存区，且清空 ****
		ob_flush() 冲刷出（送出）输出缓冲区中的内容  ,没有关闭
		ob_end_flush() 冲刷出（送出）输出缓冲区内容并关闭缓冲
	
php 自带缓存来实现的案例 数据库：
	数据库: news
	表  ：  article
	aId
	aTitle   标题
	aDate  日期
	aContent  内容
	aSource   来源
	aFilePath 静态页面保存的地址。
	
注意：在生成静态页面的时候:  模板最好现在外部开发好，php页面只管拼接。
		  如果把模板代码拷贝到 php文件中，繁琐??????

缺点:
	静态页面，不做修改，只做删除和重新生成。	不利于维护。
	
练习:
	1 建立一张文章表，生成静态页面 （php自带缓存系统生成）；


3 利用php文件函数来实现页面静态化。	*****
	1> 模板页面 html 拷贝到 对应的目录下
	2>调整 模板中的css 和 图片 
	3> html/20140326/生成的静态页面  把模板拷贝到  html/20140326/  调整图片和样式的正确性
	4>需要覆盖掉 : tpl/模板页面
	5>开始生成静态页面:????
		1. 读取模板页面中的内容 file_get_contents(url); 返回结果是一个字符串
		2. 用我发布的内容 替换掉 模板中相应的内容
		3.在把替换最终的字符串 输出到文件中 file_put_contents(url,字符串);
		4.数据已经固化到页面中，数据需要 入库。
		5 测试   upload/   html/  数据库中
		
	6>前台的调用:
	
4 应用：
	页面内容相对稳定，不经常改变--》静态化
	fso 文件 系统对象 
	不利于维护。




		
	



	
	
	
	