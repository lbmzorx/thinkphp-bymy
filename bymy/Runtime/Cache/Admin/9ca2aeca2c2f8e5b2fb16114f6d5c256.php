<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>博艺门业-后台管理中心</title>
    <link rel="stylesheet" href="<?php echo (ADMIN_LAYUI_CSS); ?>/layui.css">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>/global.css">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>/common.css">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>/font_icon.css">
    <script type="text/javascript" src="<?php echo (ADMIN_LAYUI_JS); ?>/layui.js"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header header">
        <div class="layui-main">
            <a class="logo" href="http://www.phplaozhang.com" target="_blank">
                <img src="<?php echo (ADMIN_IMG_URL); ?>/logo-top.png" alt="Lz_CMS">
            </a>
            <ul class="layui-nav top-nav-container">
                <li class="layui-nav-item layui-this">
                    <a href="javascript:void(0)">首页</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:void(0)">内容</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:void(0)">会员</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:void(0)">设置</a>
                </li>
            </ul>
            <div class="top_admin_user">
                <a href="/" target="_blank">网站首页</a> |<a class="update_cache" href="javascript:void(0)">更新缓存</a> | <a class="logout_btn" href="javascript:void(0)">退出</a>
            </div>
        </div>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree site-demo-nav">
                <li class="layui-nav-item">
                    <a class="javascript:;" href="javascript:;">开发工具<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="/index.php/Admin/Default/home" target="main">调试预览</a>
                        </dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="javascript:;" href="javascript:;">商品信息<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="/index.php/Admin/Product/index" target="main"><i class="iconfont">&#xe627;</i>商品列表</a></dd>
                        <dd><a href="/index.php/Admin/Default/home" target="main"><i class="iconfont">&#xe627;</i>商品管理</a></dd>
                        <dd><a href="/index.php/Admin/Default/home" target="main"><i class="iconfont">&#xe645;</i>分类管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="javascript:;" href="javascript:;">案例信息<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="/index.php/Admin/Default/home" target="main"><i class="layui-icon">&#xe60c;</i>案例列表</a></dd>
                        <dd><a href="/index.php/Admin/Default/home" target="main">案例管理</a></dd>
                        <dd><a href="/index.php/Admin/Default/home" target="main">分类管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="javascript:;" href="javascript:;">公司信息<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="/index.php/Admin/Default/home" target="main">信息列表</a></dd>
                        <dd><a href="/index.php/Admin/Default/home" target="main">信息管理</a></dd>
                        <dd><a href="/index.php/Admin/Default/home" target="main">分类管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="javascript:;" href="javascript:;">管理员<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="/index.php/Admin/Default/home" target="main">信息列表</a>
                            <a href="/index.php/Admin/Default/home" target="main">信息管理</a>
                            <a href="/index.php/Admin/Default/home" target="main">分类管理</a>
                        </dd>
                    </dl>
                </li>
                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
                <span class="layui-nav-bar"></span></ul>

        </div>
    </div>
    <div class="layui-body iframe-container" style="top:70px;background-color: #F3F3F4;" >
        <div style="margin: 15px;">
            <iframe class="admin-iframe" id="admin-iframe" scrolling="no" style="width: 98%;" name="main" src="./home.html"></iframe>
        </div>
    </div>
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2017 © <a href="http://www.phplaozhang.com">BYMY</a></p>
        </div>
    </div>
</div>

<script type="text/javascript">
    layui.use(['layer', 'element','jquery','tree'], function(){
        var layer = layui.layer
            ,element = layui.element() //导航的hover效果、二级菜单等功能，需要依赖element模块
            ,jq = layui.jquery
    });

</script>
</body>
</html>