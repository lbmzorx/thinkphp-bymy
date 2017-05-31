<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8"/>
    <link href="<?php echo (ADMIN_CSS_URL); ?>/admin.css" type="text/css" rel="stylesheet"/>
    <script language=javascript>
        function expand(el) {
            childobj = document.getElementById("child" + el);

            if (childobj.style.display == 'none') {
                childobj.style.display = 'block';
            }
            else {
                childobj.style.display = 'none';
            }
            return;
        }
    </script>
</head>
<body>
<table height="100%" cellspacing=0 cellpadding=0 width=170
       background=<?php echo (ADMIN_IMG_URL); ?>/menu_bg.jpg border=0>
    <tr>
        <td valign=top align=middle>
            <table cellspacing=0 cellpadding=0 width="100%" border=0>
                <tr>
                    <td height=10>
                    </td>
                </tr>
            </table>
            <?php if(is_array($auth_info_topmanu)): $k = 0; $__LIST__ = $auth_info_topmanu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><table cellspacing=0 cellpadding=0 width=150 border=0>
                    <tr height=22>
                        <td style="padding-left: 30px" background=<?php echo (ADMIN_IMG_URL); ?>/menu_bt.jpg>
                            <a class=menuparent onclick=expand("<?php echo ($k); ?>") href="javascript:void(0);"><?php echo ($v["name"]); ?></a>
                        </td>
                    </tr>
                </table>

                <table id="child<?php echo ($k); ?>" style="display: none" cellspacing=0 cellpadding=0 width=150 border=0>
                    <?php if(is_array($auth_info_submanu)): $kk = 0; $__LIST__ = $auth_info_submanu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk; if($v['id'] == $vv['pid']): ?><tr height=20>
                                <td align=middle width=30>
                                    <img height=9 src="<?php echo (ADMIN_IMG_URL); ?>/menu_icon.gif" width=9></td>
                                <td>
                                    <a class=menuchild href="/index.php/Admin/<?php echo ($vv["controller"]); ?>/<?php echo ($vv["action"]); ?>" target="right"><?php echo ($vv["name"]); ?></a>
                                </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <tr height=4>
                        <td colspan=2></td>
                    </tr>
                </table><?php endforeach; endif; else: echo "" ;endif; ?>
        <td width=1 bgcolor=#d1e6f7></td>
    </tr>
</table>
</body>
</html>