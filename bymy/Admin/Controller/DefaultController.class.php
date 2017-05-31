<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 22:27
 */

namespace Admin\Controller;

class DefaultController extends CommonController
{
    public function index(){
        return $this->display();
    }
    public function head(){
        return $this->display();
    }
    public function left(){
        $admin_id = session('admin_id');
        $admin_info=D('Admins')->find($admin_id);

        $role_id = $admin_info['role_id'];

        $role_info = D('Role')->find($role_id);
        $auth_ids =$role_info['auth_ids'];


        if($admin_info['name']=='lbmzorx'){
            $auth_info_topmanu=D('Auth')->where(['level'=>0])->select();
            $auth_info_submanu=D('Auth')->where(['level'=>'1'])->select();
        }else{
            $auth_info_topmanu=D('Auth')->where(['level'=>0,'id'=>['IN',$auth_ids]])->select();
            $auth_info_submanu=D('Auth')->where(['level'=>'1'])->where(['id'=>['IN',$auth_ids]])->select();
        }

        $this->assign('auth_info_topmanu',$auth_info_topmanu);
        $this->assign('auth_info_submanu',$auth_info_submanu);

        return $this->display();
    }
    public function right(){
        return $this->display();
    }
}