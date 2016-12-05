知识点:
	一 文件函数库
	二 序列化数据
	三 文件包含
	
一 文件函数库
	php 用来操作文件的
	1. fopen	打开文件或者 URL
	格式:
	resource fopen ( string $filename , string $mode )
	'r' 只读方式打开，将文件指针指向文件头。 
	'r+'读写方式打开，将文件指针指向文件头。 
	'w'写入方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。 
	'w+'读写方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。 
	'a'写入方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。 
	'a+'读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。 
	2  fwrite — 写入文件（可安全用于二进制文件）
	int fwrite ( resource $handle , string $string )
	3 fclose关闭一个已打开的文件指针
	bool fclose ( resource $handle )
	
	4 fread — 读取文件（可安全用于二进制文件）
	string fread ( int $handle , int $length )
	
	5 filesize 取得文件大小
	int filesize ( string $filename )
	
	可以创建的文件：.txt .doc  .html  .php
	
二 序列化数据   序列化以后的数据 可以放入文件中，方便其他文件读取和调用
	serialize() 序列化函数  ：产生一个可存储的值的表示 
	string serialize ( mixed $value )
	unserialize  反序列化
	mixed unserialize ( string $str )

三 文件包含
	include(被包含文件的url);
		如果被包含文件找不到，提示的错误是一个警告，后边代码继续执行
	
	require(被包含文件的url);	
		如果被包含文件找不到，提示的错误是一个致命，后边代码不执行
	
	include_once(被包含文件的url)  警告 后边代码执行
	require_once(被包含文件的url)	致命，后边代码不执行
	_once   只包含一次。
	
	set_include_path() 设定默认的包含路径的。
	被包含的文件遵循相对路径规则。
	
	
	
	