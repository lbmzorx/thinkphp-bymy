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
             <a style="text-decoration: none" href="/index.php/Admin/Role/showlist">【返回】</a>
        </span>
    </span>
</div>
<div style="font-size: 13px;margin: 10px 5px">
    <div>
        <span>当前角色：<?php echo ($role_info["name"]); ?></span>
    </div>
    <form action="/index.php/Admin/Role/distribute/role_id/1" method="post" enctype="multipart/form-data" id="form1">
        <input type="hidden" name="role_id" value="<?php echo ($role_id); ?>"/>
        <?php if(is_array($auth_info)): $k = 0; $__LIST__ = $auth_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if($v['pid'] == 0): ?><hr>
                <div class="distrb-databox">
                    <div class="distrb-father">
                        <?php if(in_array($v['id'],$role_auth_ids)): ?><input type="checkbox" checked="checked" value="<?php echo ($v["id"]); ?>" name="auth_id[]"/>
                            <?php else: ?>
                            <input type="checkbox" value="<?php echo ($v["id"]); ?>" name="auth_id[]"/><?php endif; ?>
                        <label class="distrb-father-label"><?php echo ($v["name"]); ?></label>
                        <div class="distrb-father-choose">
                            <a href="javascript:void(0);" onclick="chooseAll($(this),true)">全选</a>
                            <a href="javascript:void(0);" onclick="chooseAll($(this),false)">全不选</a>
                            <a href="javascript:void(0);" onclick="chooseShift($(this))">反选</a>
                        </div>
                    </div>

                    <div class="distrb-sub">
                        <?php if(is_array($auth_info)): $i = 0; $__LIST__ = $auth_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($vv['pid']==$v['id']): ?><div class="distrb-sub-item">
                                    <?php if(in_array($vv['id'],$role_auth_ids)): ?><input type="checkbox" checked="checked" name="auth_id[]" value="<?php echo ($vv["id"]); ?>"/>
                                        <?php else: ?>
                                        <input type="checkbox" name="auth_id[]" value="<?php echo ($vv["id"]); ?>"/><?php endif; ?>
                                    <label><?php echo ($vv["name"]); ?></label>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <hr>
        <div class="distrb-databox">
            <input type="submit"  value="提交" />
        </div>
    </form>
</div>
<script type="text/javascript">
/*----------------------选择---------------------------------*/
    /*
    *全选/全不选
    */
    function chooseAll(dom,status) {
        if(status==true){
            dom.parents('.distrb-father').find('input:checkbox').prop('checked',status);
            dom.parents('.distrb-father').siblings('.distrb-sub').find('input:checkbox').prop('checked',status);
        }else{
            dom.parents('.distrb-father').find('input:checkbox').prop('checked',status);
            dom.parents('.distrb-father').siblings('.distrb-sub').find('input:checkbox').prop('checked',status);
        }

    }
    /*
    *反选，并且与父级复选框联动，除非子级全部无选择的，则父级不被选中，否则，父级被选中
    */
    function chooseShift(dom) {

        var i = 0;
        dom.parents('.distrb-father').siblings('.distrb-sub').find('input:checkbox').each(function () {
            $(this).prop('checked',!$(this).prop('checked'));
            if($(this).prop('checked')){
                i++;
            }
        });
        if(i>0){
            dom.parents('.distrb-father').find('input:checkbox').prop('checked',true);
        }else{
            dom.parents('.distrb-father').find('input:checkbox').prop('checked',false);
        }

    }
/*-------------------------------------------------------*/

//    /*
//    *监听所有checked被选中的checkbox,并获得其值
//     */
//    function checkbox() {
//        var checked=[];
//        $("input:checkbox[checked]").each(function () {
//            checked.push($(this).val());
//        });
//        return checked;
//    }
////    /*
////    *submit 函数，可以提交数据
////     */
//    function submit_auth(url,formId) {
//        checkbox();
//    }
</script>
</body>
</html>