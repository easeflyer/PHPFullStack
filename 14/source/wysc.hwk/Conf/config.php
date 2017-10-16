<?php

return array(
    //'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'shop', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_FIELDTYPE_CHECK' => false, // 是否进行字段类型检查
    'DB_FIELDS_CACHE' => true, // 启用字段缓存
    'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8

    /* URL设置 */
    'URL_CASE_INSENSITIVE' => true, // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL' => 2, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
    'URL_HTML_SUFFIX' => 'html', // URL伪静态后缀设置
    'URL_PATHINFO_DEPR' => '-', // PATHINFO模式下，各参数之间的分割符号
    'APP_GROUP_LIST' => 'Home,Admin', // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
    'DEFAULT_GROUP' => 'Home', // 默认分组
    'TMPL_PARSE_STRING' => array(
        '__APPURL__'=>'HTTP://localhost/wysc/',
        '__SKIN__' => 'HTTP://localhost/wysc/skins/',
        '__THEME__' => 'default'   //默认ui主题
    ),
    'PAGE_SIZE'=>15,
    //商品存储预警阀值，当商品数量小于该值时，系统应当预警
    'LOW_STORENUM'=>10,
    'PAYMENT'=>array(
        '1'=>'余额支付',
        '2'=>'支付宝支付'
    ),
    //RBAC权限控制 wysc/ThinkPHP/Extend/Library/ORG/Util/RBAC.class.php
    'USER_AUTH_ON'=>true, //是否需要认证
    'USER_AUTH_TYPE'=>2, //认证类型
    'USER_AUTH_KEY'=>'userid', //认证识别号,用户登录要存储到session中的下标值
    'ADMIN_AUTH_KEY'=>'isAdmin', //超级管理员的识别标签如果是超级管理员需要在登录之后将 $_SESSION['isAdmin']=true,此时用户将不受rbac权限控制
    //REQUIRE_AUTH_MODULE  //需要认证模块,基本不用在后台大部分模块都是需要权限验证的。
    'NOT_AUTH_MODULE'=>'Public,Admin', //无需认证模块,不要登陆就能够使用功能，比如登录，处理登录，验证码
    'USER_AUTH_GATEWAY'=>'index.php?g=admin&m=Public&a=login',//认证网关 登录验证的地址，当用户处于未登录状态，则跳到认证网关进行登录
    //RBAC_DB_DSN  //数据库连接DSN,如果rbac的数据与当前不太相同，使用该配置项进行单独配置
    'RBAC_ROLE_TABLE'=>'role', //角色表名称
    'RBAC_USER_TABLE'=>'roleuser', //用户表名称
    'RBAC_ACCESS_TABLE'=>'access', //权限表名称
    'RBAC_NODE_TABLE'=>'node', //节点表名称
    //易宝测试帐号
    'p1_MerId'=>'10001126856',
    'key'=>'69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl',
    'pay_url'=>'https://www.yeepay.com/app-merchant-proxy/node'
);
?>