知识点：
	一 目录函数库
	二 递归删除目录 面试题
	
	一 目录函数库
	1  mkdir  创建目录
		bool mkdir(string path);
	2 file_exits  文件/目录是否存在
		bool file_exits(string path);		
		创建目录的时候 如果目录存在 不用创建
		创建多级目录
	3 rename 重命名文件/目录
		bool rename(string old,string new)
	
	4 opendir() 打开目录
	  resource opendir(string path)
	5 readdir 读取目录条目
	string readdir(resource handle)  
	6 closedir();关闭目录
	bool closedir(resource handle)
	7 is_dir 判断是否是目录  *****
	   is_file 判断是否是文件
	   if(!file_exists("aa/"))
	    if(!is_dir("aa/"))
	
二 递归删除目录 面试题  
	  
	  unlink(文件路径) 删除文件
	  rmdir (目录) 删除目录
	  
	  
	  
	  
	 