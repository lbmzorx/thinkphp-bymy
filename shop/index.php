<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 21:38
 */

//define('APP_PATH','./Application/');
define('APP_DEBUG',True);           //调试模式 -开
//define('APP_DEBUG',false);           //调试模式 -关
/*
 * 在自动生成目录结构的同时，在各个目录下面我们还看到了index.html文件，这是ThinkPHP自动生成的目录安全文件。
 * 为了避免某些服务器开启了目录浏览权限后可以直接在浏览器输入URL地址查看目录，系统默认开启了目录安全文件机制，会在自动生成目录的时候生成空白的index.html文件
 */
//define('BUILD_DIR_SECURE', false); //环境足够安全，不希望生成目录安全文件，可以在入口文件里面关闭目录安全文件的生成，关闭自动生成文件


define('ADMIN_CSS_URL','/Admin/Public/css');
define('ADMIN_JS_URL','/Admin/Public/js');
define('ADMIN_IMG_URL','/Admin/Public/img/');
define('ADMIN_LAYUI_JS','/Admin/Public/layui/');
define('ADMIN_LAYUI_CSS','/Admin/Public/layui/css');
define('ADMIN_JQUERY_JS','/Admin/Public/js/jquery');

require '../ThinkPHP/ThinkPHP.php';
