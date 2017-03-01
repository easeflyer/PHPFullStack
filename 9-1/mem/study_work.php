知识点:
	一 memcache概述
	二 安装和使用memcache
	三 php操作memcache
	四 memcache机制
	五 memcache 相关内容

一 memcache 概述:
	1 什么是memcache
	官方: 高性能 分布式 内存对象缓存系统，用来构建大负载的网站，分担数据库压力。
	理解: memcache 管理内存的软件  ，memcache 存储数据  表的形式。****
	key=>value 
	注意：面试的时候  官方描述。
	2 memcache 原理:
	memcache 问题:
		第一次访问网站，从数据库中交互数据
		第二次在访问网站，从内存空间  
		memcache 使程序 存储数据。
	--------------------------------
		内存中数据 不安全 容易丢失 ，memcache 中 放常用 不是很重要的数据。
	---------------------------------
	memcache管理内存 是一张 hashtable 
	key  ==》 value
	key  字符串  内存中不能重复。
	value  字符串 数值 数组 boolean 对象 null 二进制(图片和视频)
	
	小结:
		1>memcache 缓存技术，数据放入内存，提高网站访问速度。
		2> key=>value管理的。

二 安装和使用memcache
	1 下载memcached.exe 软件 
	2 安装: 
		1> 命令行下安装:
			点击开始菜单--》运行  cmd--》跳转到 memcached.exe文件的目录
			--》安装命令 memcached.exe -d install
	
			控制面板--》管理工具--》服务 查看memcache   右键启动
			命令:
			memcached.exe -d start 启动命令
			
			查看memcache信息:
				netstat -an 
				tcp  0.0.0.0:11211   
				memcache 端口号 11211 
			
			memcache -d  install 安装
									 start 启动memcache 服务
									 stop | shutdown 终止服务
									 uninstall 卸载memcache
									 restart 重启memcache
			
			--------------------------------
				win7 安装失败  管理员的身份登录 去安装 。
				memcached.exe -d start 符号和字符都是英文。 
			--------------------------------			 
			
		3》cmd 模式下使用memcache  （增 删 改）
			 telnet 可以编辑memcache相关命令
			 打开telnet
			 控制面板--》程序功能--》打开或关闭windows功能--》telnet 服务器/客户端 选中
			 
			 进入telnet 编辑状态:
			 telnet 主机名/IP 端口号 
			 telnet localhost 1122        --> 进入memcache 编辑状态。
			 
		4》添加操作:
			 add  变量名称  标志位(0 不压缩  1 压缩)  有效期(秒) 数据大小(字符)
			 demo：
			 add key 0 60 5  回车 
				hello				等待
			STORED				存储成功
		5》 取值 
			 get 变量名称 
			 demo:
			 get test
			VALUE test 0 3
			abc
		6》修改:
			set 变量名称 标志位 有效期 数据 大小
			--------------------------
			set 操作的数据，改变量如果不存在，添加变量，存在，修改变量
			--------------------------
		7》删除:
			删除 单个值:
				delete 变量名称
				
				delete awt
			清空内存中的数据。 
				flush_all  
				注意：两个单词间 有 _
				
		8》常用：
			append: 追加  向已经存在的变量 追加内容
					abcde
			prepend：向已经存在的变量 前置内容
					deabc
			append/prepend  变量名称 标志位 有效期 字符长度
				
			add demo 0 3600 5 新建变量
			abcde
			STORED
			append demo 0 3600 3 追加的内容
			fff
			STORED
		9》查看信息:
			stats 查看统计信息的。
			
			STAT pid 4592
			STAT uptime 2983
			STAT time 1395301023
			STAT version 1.2.6
			STAT pointer_size 32
			STAT curr_items 3
			STAT total_items 10
			STAT bytes 183
			STAT curr_connections 3
			STAT total_connections 9
			STAT connection_structures 4
			STAT cmd_get 17
			STAT cmd_set 10
			STAT get_hits 11
			STAT get_misses 6
			STAT evictions 0
			STAT bytes_read 645
			STAT bytes_written 584
			STAT limit_maxbytes 67108864
			STAT threads 1
			
	STAT cmd_get 17
	STAT cmd_set 10	
	越大越好：越高。	 
		
三 php操作memcache  增删改:
	1>加载memcache动态扩展库:
	php_memcache.dll文件 受php版本约束
	2> 配置步骤
	php_memcache.dll --》 php/ext/
	php.ini
		extension = php_memcache.dll
	重启apache		
	3>php操作memcache
		实例化memcache
			$mem = new Memcache;
		连接memcache服务器
			$mem->connect("主机名称",11211);  
		$mem->set(变量名称,value,标志位,有效期)  //添加的值 telnet  模式下也能获取到
		$mem->add(变量名称,value,标志位,有效期)
		$mem->get(变量名称);
		$mem->delete("变量名称");
		
		标志位:
			MEMCACHE_COMPRESSED 压缩。
			
		字符串 数值  数组 对象   null boolean 
	
作业:
	用memcache 测试 字符串 数值  数组 对象   null boolean  能否添加mem中。在页面上能否读取出来。
		
四 memcache机制
1 memcache 使用php程序来操作的，不用用浏览器来访问的，memcache是c/s架构的软件
2 memcache是用来存储数据的 ，存在内存中，删除最原始的数据，来存放新的数据。
3 memcache是基于分布式，可以安装在多台机器上，也可以在同一台机器上多次启用memcache****
demo	多次启用memcache
	netstat -an 查看目前服务
			TCP    0.0.0.0:11211    --》 memcache的服务
同一台机器上 多次启用memcache  
	netstat -an 查看已经启动的服务
	启动第二个memcache
		跳转到 你的 memcached.exe 文件所在的位置--》memcached.exe -p 新端口 //9999--》窗口不能关闭
	php如何使用多次启动的memcache	
		想多memcache服务中存数据，是memcache帮我们自动分配的。****	
		取数据 不管存在那个memcache端口下的数据，我们都可以正常取出。****
小结: 了解
	memcache的数据 可以分布 到多台服务器上，也可分不到同一台机器的端口上
	$mem->addServer 通过计算hash 才决定连接那个memcache，为了节省开销。
	$mem->addServer("localhost",11211);
	$mem->addServer("localhost",9999);
	$mem->addServer("localhost",8888);
	$mem->addServer("localhost",2222);
	
	$mem->addServer("ip",端口)；
	
五 memcache 相关内容
1 生命周期:
	add/set 变量名称  标志位 生命期	 长度
	$mem->set(变量名称，值，标志位，生命期);
	从数据放到memcache起，调用销毁函数 delete flush
	生命期到
	重启机器/关闭机器--》memcache数据存在内存中。
2 memcache常用:
	1> session中的数据 放入memcache 
		 登陆后，少量的数据。
		
	
	
	
	
	
	
	
	
	