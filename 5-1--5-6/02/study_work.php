知识点：
	一 gd函数库
	二 制作验证码
	三 session 和 cookie 
	四 管理员登陆
	
一 gd函数库 
	gd  php-->处理图像 图片的一组函数。
	开启gd库选项
	appserv  c:\windows  php.ini   
			extension=php_gd2.dll 去掉前面 ;  重启apache 
	1 函数:	
		imagecreate() :创建了基于调色板的图像 
		格式: resource imagecreate(int width,int height);
		imagecreatetruecolor() : 创建基于真色彩的图像;
		格式: resource imagecreatetruecolor(int width,int height);
		
		header("content-type:image/图片格式");
		图片格式:  gif  jpeg  png 
		
		imagegif /imagejpeg/imagepng 将 gif  jpeg png 图像输出到屏幕或文件。
		格式   bool  imagegif /imagejpeg/imagepng（resource $img）;
		imagedestroy() 销毁内存中的 图像资源
		格式: bool imagedestroy(resource $img);
		
		imagestring 水平绘制字符串
		格式: bool imagestring(resource $img,int font, int $x,int $y,string $str,int color);
		
		imagecolorallocate() 为图像分配颜色的。
		格式: int imagecolorallocate(resource $img,int red,int green int blue);   0-255
		
		imagettftext  用 TrueType 字体向图像写入文本   TrueType windows默认的字体库
		array imagettftext ( resource $image , 
										float $size ,  文本大小  单位 像素
										float $angle ,  倾斜的角度
										int $x , int $y ,   文字起点的左下角坐标
										int $color ,   颜色
										string $fontfile ,  ttf文件的位置
										 string $text ，写入的文本内容
										 )
		imagefilledrectangle  画一矩形并填充
		bool imagefilledrectangle ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )
		
		imagesetpixel() 绘制单独的像素点的。
		bool imagesetpixel ( resource $image , int $x , int $y , int $color )
		
		imageline() 绘制一个线段
		bool imageline ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )
		
		
二 制作验证码		
		
三 session 和 cookie 
	系统提供的数组，可以在服务器端、客户端存储信息。		
	session 服务器端
	cookie 客户端	
	1 session  服务器端存储数据的
		session_start(); //开启session会话
		$_SESSION["下标（字符串）"] = 值
		session_id() 客户端存储session信息
		sess_5f92689c3f0b92e69c52c0ac8e7e752e
		
	2 cookie
		setcookie("cookieName",value,生命期(时间戳))  设置cookie值
		$_COOKIE["cookieName"]
		cookie 是存储的session_id
		cookie 存储位置。
		C:\Users\Administrator\AppData\Local\Google\Chrome\User Data\Default
		
	3 销毁session
	关闭浏览器，
	session_destroy();  //销毁所有session
	unset($_SESSION["变量"]);
	
	4 面试:
	不同
		session是在服务器端工作
		cookie 是在客户端工作的
	相同:
		session  会创建session_id;
		cookie 也是可以取到的。
	
四 管理员登陆
	验证码:

		
		
		
		
		