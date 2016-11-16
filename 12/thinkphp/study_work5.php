知识点：
	一 用户的增 删 该
	二 用户的登陆 用户名 密码 验证码
	三 添加分页
	四 用户的头像上传

	
一 用户的增 删 该 后台
	1 搭建网站的后台页面 模板美工提供
		think_users
			uId
			uName
			uPwd
			uTel
			uEmail
			uPic  头像
			uAddress
			
CREATE TABLE `think_users` (
  `uId` int(6) NOT NULL auto_increment,
  `uName` varchar(20) NOT NULL,
  `uPwd` varchar(20) NOT NULL,
  `uTel` varchar(20) NOT NULL,
  `uEmail` varchar(200) NOT NULL,
  `uPic` varchar(200) NOT NULL,
  `uAddress` text NOT NULL,
  PRIMARY KEY  (`uId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	2 实现文件内容的添加
		上传
			$upload = new UploadFile();// 实例化上传类
	   		$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  'Public/Uploads/';// 设置附件上传目录*****
			if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
			}else{	// 上传成功 获取上传文件信息
					$info = $upload->getUploadFileInfo();
					print_r($info);
					$filePath = $upload->savePath.$info[0]["savename"];
			}

二 用户的登陆 用户名 密码 验证码
	session: tp 提供session机制
默认情况下，初始化之后系统会自动启动session，如果不希望系统自动启动session的话，可以设置SESSION_AUTO_START为false
config.php
	创建session
	session('name','value');  
	获取session
	$value = session('name');
	销毁session
	session('name',null); // 删除name
	删除所有session
	session(null); // 清空当前的session
	模板中
		{$Think.session.变量名称}
		1>验证码的创建步骤:
			创建一个 action 放验证码的调用
			length 验证码的长度，默认为4位数 
			model 验证字符串的类型，默认为数字，其他支持类型有0 字母 1 数字 2 大写字母 3 小写字母 4中文 5混合 
			type 验证码的图片类型，默认为png  
			width 验证码的宽度，默认会自动根据验证码长度自动计算 
			height 验证码的高度，默认为22 
			verifyName 验证码的SESSION记录名称，默认为verify 
		2>模板中调用验证码
			
		
	三 添加分页
		用户列表
	四 用户的头像上传	
		添加用户 ，修改用户
		
		
		
			













