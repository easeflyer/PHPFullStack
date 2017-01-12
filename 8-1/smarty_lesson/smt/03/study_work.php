知识点:
		一 smarty中的缓存:
	 	二 smarty 案例
	 	
	 		一 smarty中的缓存:
				缓存: 临时存储
				提高访问效率。
				cache 目录 存放缓存文件的位置:
				1》使用步骤
				//开启缓存
				$st->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
				//指定缓存的生命期:
				$st->setCacheLifetime(300);
				//禁止 重新生成缓存文件
				$st->setCompileCheck(false);
				//检测文件是否缓存过，如果缓存过 ，就不在缓存
				if(!$st->isCached("index.html")){
					$myId = 5; //缓存的所有 数据
				}
				清除缓存:
					删除一个文件的缓存
						$st->clearCache("模板名称");
					删除所有缓存
						$st->clearAllCache();
				注意： smarty 是以文件形式缓存数据。
				内存缓存  数据库缓存 文件缓存....
		二 smarty 案例
			员工管理系统:
				需求分析：老师提供
				概要设计和详细设计
						表开始
							com_admin(管理员)
								cmId
								cmName 用户名
								cmPwd   密码
							com_dept(公司的部门表)	
								cdId
								cdName 部门名称
								cdInfo		部门职能介绍
								clId			部门负责人id
							com_leader(公司部门负责人)  项目起点 管理 增 删 改 分页 列表
								clId
								clName 负责人名字
								clTel    负责人电话
								clEmail   邮箱
								clInfo   工作职责
							com_emp(员工表)	
								ceId
								ceName  员工名字
								cdId  员工所属部门
								clId   员工负责人
								ceTel  电话
								ceEmail 邮箱
								cePic  照片
						
						smarty模板:
							login.html  登陆页面 --->index.html
							index.html 后台首页 --> main.html
								
		index.php 登陆

		
练习：
	部门 deptList.php的分页 加上		
	员工empList.php 分页加上
	
小结:
	smarty3 当中的相关内容
	案例中 根据需求.
	$st = new Smarty();
	$st->left_delimiter
	$st->right_delimiter
	$st->assign();
	$st->display();
	section
	foreach
	
	
	
	
	
	
	
		
						
						
				