<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加商品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="<?php echo (ADMIN_CSS_URL); ?>/mine.css" type="text/css" rel="stylesheet">
    <link href="<?php echo (ADMIN_CSS_URL); ?>/auth.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo (ADMIN_JQUERY_JS); ?>/jquery-3.2.1.min.js"></script>
</head>

<body>
<div class="div_head" style="overflow: auto;">
    <span>
        <span style="float:left">当前位置是：权限管理-》分配权限</span>
        <span style="float:right;margin-right: 8px;font-weight: bold">
             <a style="text-decoration: none" href="/index.php/Admin/Auth/showlist">【返回】</a>
        </span>
    </span>
</div>
<div style="font-size: 13px;margin: 10px 5px">
    <div>
        <span>当前角色：<?php echo ($role_info["name"]); ?></span>
    </div>
    <form action="/index.php/Admin/Auth/edit/$auth_id/100" method="post" enctype="multipart/form-data" id="form1">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td>权限名称</td>
                <td><input type="text" name="name" value="<?php echo ($v["name"]); ?>"/></td>
            </tr>
            <tr>
                <td>权限上级</td>
                <td>
                    <select name="pid">
                        <option value="0">请选择</option>
                        <?php if(is_array($auth_father)): $i = 0; $__LIST__ = $auth_father;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($v['pid'] == $vv['id']): ?><option value="<?php echo ($vv["id"]); ?>" selected><?php echo ($vv["name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($vv["id"]); ?>"><?php echo ($vv["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>权限控制器</td>
                <td>
                    <input type="text" name="controller" value="<?php echo ($v["controller"]); ?>"/>
                </td>
            </tr>
            <tr>
                <td>权限操作方法</td>
                <td><input type="text" name="action" value="<?php echo ($v["action"]); ?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="修改">
                </td>
            </tr>

        </table><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
</body>
</html>