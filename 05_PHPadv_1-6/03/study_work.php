知识点:
	一 gd函数的其他函数
	二  图片等比缩放
	三  图片上打水印

一 gd函数的其他函数
	imagecopyresized — 拷贝部分图像并调整大小
	bool imagecopyresized ( 
		resource $dst_image ,   新图片
		resource $src_image ,   旧图片（需要载入的图片）
		int $dst_x , int $dst_y ,  旧图在新图中 x，y的位置
		int $src_x , int $src_y ,  旧图 x，y的载入点  都是0,0
		int $dst_w , int $dst_h ,  新图缩放后的宽 高  400 300
		int $src_w , int $src_h  ，旧图的宽高   800 600
		)
	imagecopyresampled — 重采样拷贝部分图像并调整大小
	bool imagecopyresampled ( 
		resource $dst_image , 
		resource $src_image , 
		int $dst_x , int $dst_y , 
		int $src_x , int $src_y , 
		int $dst_w , int $dst_h , 
		int $src_w , int $src_h
	 )
	 
	 gif  png jpeg 
	imagecreatefromgif — 从 GIF 文件或 URL 新建一图像
	 resource imagecreatefromgif ( string $filename )
	 imagecreatefromjpeg — 从 JPEG 文件或 URL 新建一图像
	 resource imagecreatefromjpeg ( string $filename )
	 imagecreatefrompng — 从 PNG 文件或 URL 新建一图像
	resource imagecreatefrompng ( string $filename )
	
 
二  图片等比缩放

	 getimagesize — 取得图像大小
	 array getimagesize ( string $filename); 返回 图像大小的数组
	 
	 
三  图片上打水印 
	imagettfbbox — 取得使用 TrueType 字体的文本的范围
	array imagettfbbox ( float $size , float $angle , string $fontfile , string $text )
	imagettftext — 用 TrueType 字体向图像写入文本
	array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
	 
	 
	 
	 
	 
	 
		
		