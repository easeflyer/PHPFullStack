知识点：
	一 tp 模块分组
	二 tp 添加页面跳转
	三 jquery ajax 在tp中如何应用
	四 tp中缓存

一 tp 模块分组
	admin
	home
	把前后台应用 放到一个模块下 App
	Lib/Action/Home 	
	Lib/Action/Admin
	action 要求所有对应的内容都需要分组
	了解 分组动作。
	
二 tp 添加页面跳转
	js 跳转
	$this->success("提示语",U("模块/动作"))  执行成功之后的跳转
	$this->error	//执行失败的跳转
	
三 jquery ajax 在tp中如何应用


四 tp中缓存
	在conf/config.php
		"DATA_CACHE_TYPE"=>"file";设置缓存的方式
		"DATA_CACHE_TIME"=>"" //缓存时间  秒
		
		s("变量名称",php变量,生命期)；
		f("变量名称",php变量)
		
		伪代码:
			缓存代码 只有当缓存中没有数据才执行 ，有数据就不执行。
			if(!$num = s("str")){ //变量不存在，在执行缓存。
					$num = 10000;
					s("str",$num,50);
			}
			
			$this->assign("num",$num);















		
	
	
	
	
