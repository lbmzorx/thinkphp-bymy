<?php
return array(
	//'配置项'=>'配置值'
    'url_model'          => '2', //URL模式
    'SHOW_PAGE_TRACE'    => true,   //开启跟踪模式

    'TMPL_L_DELIM' => '<{', //模板左标记
    'TMPL_R_DELIM' => '}>', //模板右标记

    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'sw', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'sw_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
//    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志
);