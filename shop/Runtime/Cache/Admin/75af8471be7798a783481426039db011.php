<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>商品信息</title>

    <link href="<?php echo (ADMIN_CSS_URL); ?>/mine.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：权限管理-》权限列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/index.php/Admin/Auth/add">【添加权限】</a>
                </span>
            </span>
</div>
<div></div>
<div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
    <table class="table_a" border="1" width="100%">
        <tbody><tr style="font-weight: bold;">
            <td>序号</td>
            <td>权限名称</td>
            <td>控制器</td>
            <td>动作</td>
            <td>全路径</td>
            <td>等级</td>
            <td align="center">操作</td>
        </tr>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="product1">
            <td><?php echo ($v["id"]); ?></td>
            <td>
                <?php $__FOR_START_22309__=0;$__FOR_END_22309__=$v['level'];for($i=$__FOR_START_22309__;$i < $__FOR_END_22309__;$i+=1){ ?>&nbsp;&nbsp;<?php } ?>
                <?php if($v['level'] == 0): ?><b><?php echo ($v["name"]); ?></b>
                    <?php else: ?>
                    <?php echo ($v["name"]); endif; ?>
            </td>
            <td><?php echo ($v["controller"]); ?></td>
            <td><?php echo ($v["action"]); ?></td>
            <td><?php echo ($v["path"]); ?></td>
            <td><?php echo ($v["level"]); ?></td>
            <td>
                <a href="/index.php/Admin/Auth/edit/$auth_id/<?php echo ($v["id"]); ?>">修改</a>
                <a href="javascript:;" onclick="del('<?php echo ($v["id"]); ?>','/index.php/Admin/Auth/del')">删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="<?php echo (ADMIN_JQUERY_JS); ?>/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_LAYUI_JS); ?>/layui.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>/common.js"></script>
</body>
</html>