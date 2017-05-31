<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="xu" name="GENERATOR" />

    <title>用户登录</title>

    <link href="<?php echo (ADMIN_CSS_URL); ?>/User_Login.css" type="text/css" rel="stylesheet" />
</head><body id="userlogin_body">
<div></div>
<div id="user_login">
    <dl>
        <dd id="user_top">
            <ul>
                <li class="user_top_l"></li>
                <li class="user_top_c"></li>
                <li class="user_top_r"></li></ul>
        </dd><dd id="user_main">
        <form action="#" method="post">
            <ul>
                <li class="user_main_l"></li>
                <li class="user_main_c">
                    <div class="user_main_box">
                        <span style="color:red;"><?php echo ($errorInfo); ?></span>
                        <ul>
                            <li class="user_main_text">用户名： </li>
                            <li class="user_main_input">
                                <input class="TxtUserNameCssClass" id="admin_user" maxlength="20" name="name"> </li></ul>
                        <ul>
                            <li class="user_main_text">密&nbsp;&nbsp;&nbsp;&nbsp;码： </li>
                            <li class="user_main_input">
                                <input class="TxtPasswordCssClass" id="admin_psd" name="password" type="password">
                            </li>
                        </ul>
                        <ul>
                            <li class="user_main_text">验证码： </li>
                            <li class="user_main_input">
                                <input class="TxtValidateCodeCssClass" id="captcha" name="verifyImg" type="text">
                                <img src="/index.php/Admin/Manager/verifyImg"  alt="验证码" onclick="this.src='/index.php/Admin/Manager/verifyImg/'+Math.random()" />
                            </li><span style="color:red;"><?php echo ($is_verifyimg); ?></span>
                        </ul>
                    </div>
                </li>
                <li class="user_main_r">
                    <input style="border: medium none; background: url('<?php echo (ADMIN_IMG_URL); ?>/user_botton.gif') repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit">
                </li>
            </ul>
        </form>
    </dd><dd id="user_bottom">
        <ul>
            <li class="user_bottom_l">忘记密码？</li>
            <li class="user_bottom_c"><a href="/index.php/Admin/Manager/register"><span style="margin-top: 40px;">注册</span> </a></li>
            <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;"></span><span id="ValrPassword" style="display: none; color: red;"></span><span id="ValrValidateCode" style="display: none; color: red;"></span>
<div id="ValidationSummary1" style="display: none; color: red;"></div>
</body>
</html>