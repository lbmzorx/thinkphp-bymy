<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 23:53
 */

namespace Admin\Controller;

use Admin\Model\AdminsModel;
use Think\Verify;

class RoleController extends CommonController
{
    public function showlist(){

        $data = D('Role')->select();
        $this->assign('data',$data);
        $this->display();
    }

    public function distribute($id){


        $role_info = D('Role')->find($id);
        $auth_info = D('auth')->select();
        $role_auth_ids = explode(',',$role_info['auth_ids']);
        $this->assign(['auth_info'=>$auth_info,'role_info'=>$role_info,'role_auth_ids'=>$role_auth_ids]);
        $this->display();
    }
}