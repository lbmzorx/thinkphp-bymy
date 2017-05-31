<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="Generator" content="YONGDA v1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="Keywords" content="YONGDA商城"/>
    <meta name="Description" content="YONGDA商城"/>

    <title>后台注册</title>

    <link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>
<body class="index_body">

<div class="block block1">

    <div class="block box">
        <div class="blank"></div>
        <div id="ur_here">
            当前位置: <a href="/index.php/Admin/Manager/login">后台</a> <code>&gt;</code> 用户注册
        </div>
    </div>
    <div class="blank"></div>


    <!--放入view具体内容-->

    <div class="block box">

        <div class="usBox">
            <div class="usBox_2 clearfix">
                <div class="logtitle3"></div>
                <form id="yw0" action="/index.php/Admin/Manager/register" method="post">
                    <table cellpadding="5" cellspacing="3" style="text-align:left; width:100%; border:0;">
                        <tbody>
                        <tr>
                            <td style="width:13%; text-align: right;"><label for="User_username" class="required">用户名
                                <span class="required">*</span></label>
                            </td>

                            <td style="width:87%;">
                                <input class="inputBg" size="25" name="name" id="User_username" type="text"
                                       value=""/>
                                <span style="color:red;"><?php echo ($errorInfo["name"]); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="User_password" class="required">密码 <span class="required">*</span></label>
                            </td>

                            <td>
                                <input class="inputBg" size="25" name="password" id="User_password"
                                       type="password" value=""/>
                                <span style="color:red;"><?php echo ($errorInfo["password"]); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><label for="User_password2">密码确认</label></td>
                            <td>
                                <input class="inputBg" size="25" name="password2" id="User_password2"
                                       type="password"/>
                                <span style="color:red;"><?php echo ($errorInfo["password2"]); ?></span>
                            </td>

                        </tr>
                        <tr>
                            <td align="right"><label for="User_user_email">邮箱</label></td>
                            <td>
                                <input class="inputBg" size="25" name="email" id="User_user_email"
                                       type="text" value=""/>
                                <span style="color:red;"><?php echo ($errorInfo["email"]); ?></span>
                            </td>
                        </tr>
                        <tr>

                            <td align="right"><label for="User_user_qq">手机号码</label></td>
                            <td>
                                <input class="inputBg" size="25" name="phone" id="User_user_qq" type="text"
                                       value=""/>
                                <span style="color:red;"><?php echo ($errorInfo["phone"]); ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td  align="right"><label>验证码：</label></td>
                            <td >
                                <input class="TxtValidateCodeCssClass" id="captcha" name="verifyImg" type="text">
                                <img src="/index.php/Admin/Manager/VerifyImg"  alt="验证码" onclick="this.src='/index.php/Admin/Manager/VerifyImg/'+Math.random()" />
                                <span style="color:red;"><?php echo ($is_verifyimg); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td  align="center">
                                <input type="submit" value="提交"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>


                </form>
            </div>
        </div>
    </div>
    <!--放入view具体内容-->

</div>
<div id="footer">
    <div class="text">
        © 2005-2012 Xu 版权所有，并保留所有权利。<br/>
    </div>
</div>

</body>
</html>