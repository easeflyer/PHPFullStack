/**
 * 项目参考：http://blog.csdn.net/u012187452/article/details/73478028
 *
 * 这个项目要采集获取 www.ziroom.com 首页的轮播图：标题，网址，图片地址
 */


// 加载http模块
var http = require('http');
// Cheerio 是一个Node.js的库， 它可以从html的片断中构建DOM结构，然后提供像jquery一样的css选择器查询
var cheerio = require('cheerio');

// 定义网络爬虫的目标地址：自如友家的主页
var url = 'http://www.ziroom.com/';

// 参考：http://nodejs.cn/api/http.html#http_http_get_options_callback

http.get(url, function(res) {
    var html = '';
    // 获取页面数据
    res.on('data', function(data) {
        html += data; // 注意这里的data 是 buffer 见readable 的 data事件
    });
    // 数据获取结束
    res.on('end', function() {
        // 通过过滤页面信息获取实际需求的轮播图信息
        // filterSlideList 函数 过滤 html 见下面定义
        var slideListData = filterSlideList(html);

        // 打印信息函数见下面
        printInfo(slideListData);
        // 入库
        add2DB(slideListData);
    });
}).on('error', function() {
    console.log('获取数据出错！');
});

/* 过滤页面信息
 return slideListData; 轮播图数组
 */
function filterSlideList(html) {
    if (html) {
        // 沿用JQuery风格，定义$ cheerio 使用方式，先用 load 载入，并赋值给 $ 就可以用 jquery 的方式获取信息了。
        var $ = cheerio.load(html);
        // 根据id获取轮播图列表信息  <ul id="foucsSlideList"  参见首页html
        var slideList = $('#foucsSlideList');
        // 轮播图数据
        var slideListData = [];

        /* 轮播图列表信息遍历
        each 方法参见 jquery each 方法：针对每个匹配的元素执行 后面的回调函数 function 
        li 参见页面 包含 a 标签，a 标签 包含 img 标签
        */
        slideList.find('li').each(function(item) {

            var pic = $(this);
            // 找到a标签并获取href属性  都是jquery 语法。如果不明白看 jquery 
            var pic_href = pic.find('a').attr('href');
            // 找到a标签的子标签img并获取_src
            var pic_src = pic.find('a').children('img').attr('_src');
            // 找到a标签的子标签img并获取alt
            var pic_message = pic.find('a').children('img').attr('alt');
            // 向数组插入数据 push 是 js 的函数 参考：http://www.w3school.com.cn/jsref/jsref_push.asp
            slideListData.push({
                pic_href: pic_href,
                pic_message: pic_message,
                pic_src: pic_src
            });
        });
        // 返回轮播图列表信息
        return slideListData;
    } else {
        console.log('无数据传入！');
    }
}

/* 打印信息 */
function printInfo(slideListData) {
    // 计数
    var count = 0;
    // 遍历信息列表 forEach js 方法 参考：http://www.runoob.com/jsref/jsref-foreach.html
    // item 就是遍历的当前元素
    slideListData.forEach(function(item) {
        // 获取图片
        var pic_src = item.pic_src;
        // 获取图片对应的链接地址
        var pic_href = item.pic_href;
        // 获取图片信息
        var pic_message = item.pic_message;
        // 打印信息
        console.log('第' + (++count) + '个轮播图');
        console.log(pic_message);
        console.log(pic_href);
        console.log(pic_src);
        console.log('\n');
    });
}


/**
 * data 是 slideListData 数组
 * @param  {array data}
 * @return {[type]}
 */
function add2DB(data) {
    var mysql = require('mysql');

    var connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: 'root',
        port: '3306',
        database: 'test',
    });
    // 连接数据库 
    connection.connect();

    data.forEach(function(item) {
        var addSql = 'INSERT INTO info(title,src,href) VALUES(?,?,?)'; // 上面的 sql 语句也是可以的。
        var addSqlParams = [item.pic_message, item.pic_src, item.pic_href];
        // query 执行 addSql ,addSqlParams 将会替换问号
        connection.query(addSql, addSqlParams, function(err, result) {
            if (err) {
                console.log('[INSERT ERROR] - ', err.message);
                return;
            }
            console.log('INSERT ID:', result);
        });
    });
    // 返回的结果：
    // --------------------------INSERT----------------------------
    // INSERT ID: OkPacket {
    //   fieldCount: 0,
    //   affectedRows: 1,
    //   insertId: 8,
    //   serverStatus: 2,
    //   warningCount: 0,
    //   message: '',
    //   protocol41: true,
    //   changedRows: 0 }
    // -----------------------------------------------------------------

    connection.end();
}