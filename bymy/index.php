<?php

// 开启调试模式
//define('APP_DEBUG', True);
//define('BIND_MODULE','Admin');
//define('BUILD_MODEL_LIST','Admins,Product');

//define('APP_PATH','./Application/');
define('APP_DEBUG',True);           //调试模式 -开
//define('APP_DEBUG',false);           //调试模式 -关
/*
 * 后台资源文件
 */
define('ADMIN_CSS_URL','/Admin/Public/css');
define('ADMIN_JS_URL','/Admin/Public/js');
define('ADMIN_IMG_URL','/Admin/Public/img');
define('ADMIN_JQUERY_JS','/Admin/Public/js');

/*layui前端框架*/
define('ADMIN_LAYUI_JS','/Admin/Public/layui');
define('ADMIN_LAYUI_CSS','/Admin/Public/layui/css');
define('ADMIN_LAYUI_MODULE_JS','/Admin/Public/layui/lay/modules');
define('ADMIN_LAYUI_ALL_JS','/Admin/Public/layui/lay/dest/layui.all.js');
define('ADMIN_LAYER_JS','/Admin/Public/plug/layer-v3.0.3/layer/layer.js');
define('ADMIN_LAYDATE_JS','/Admin/Public/plug/laydate-v1.1/laydate/laydate.js');

/*
 * 前台资源文件
 */
define('HOME_CSS_URL','/Home/Public/css');
define('HOME_JS_URL','/Home/Public/js');
define('HOME_IMG_URL','/Home/Public/img/');
define('HOME_LAYUI_JS','/Home/Public/layui');
define('HOME_LAYUI_CSS','/Home/Public/layui/css');
define('HOME_JQUERY_JS','/Home/Public/js/jquery');


require '../ThinkPHP/ThinkPHP.php';
