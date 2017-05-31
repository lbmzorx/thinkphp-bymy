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

class ManagerController extends CommonController
{

    /*
     * 验证码配置
     */
    public $configImg = [
        'imageH' => 40,               // 验证码图片高度
        'imageW' => 110,               // 验证码图片宽度
        'length' => 4,               // 验证码位数
        'fontSize' => 15,              // 验证码字体大小(px)
        'fontttf' => '4.ttf',              // 验证码字体，不设置随机获取
        'expire' => 60,            // 验证码过期时间（s）
        'seKey' => 'z-a89,？yw.BNefw,_',   // 验证码加密密钥
    ];

/*
 * 登录页面
 */
    public function login()
    {

        $user = I('post.');
        if ($user) {
            $verifyImg = new Verify($this->configImg);       //验证码
            $very = $verifyImg->check($user['verifyImg']);
            if ($very) {
                $add_user = new AdminsModel();
                $info = $add_user->checkpassword($user['name'],$user['password']);
                if ($info) {
                    session('admin_id',$info['id']);
                    session('admin_name',$info['name']);
                    $this->redirect('Default/index');
                } else {
                    $this->assign('errorInfo', '用户名或密码错误');
                }
            } else {
                $this->assign('is_verifyimg', '验证码错误');
            }
        }
        $this->display();
    }

    /*
     * 退出登录
     */
    public function logout(){
        session(null);
        $this->redirect('login');
    }



    public function register()
    {

        $user = I('post.');

        if ($user) {
            $verifyImg = new Verify($this->configImg);       //验证码
            $very = $verifyImg->check($user['verifyImg']);
            if ($very) {
                $add_user = new AdminsModel();
                $data = $add_user->create();
                if ($data) {
                    $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT, ['cost' => 12]);   //加密密码，注意5.4以上
                    $user['add_time'] = time();
                    if ($add_user->add($user)) {
                        $this->display('login');
                    }
                } else {
                    $this->assign('errorInfo', $add_user->getError());
                }
            } else {
                $this->assign('is_verifyimg', '验证码错误');
            }
        }
        $this->display();
    }

    //验证码
    public function verifyImg()
    {
        $verify = new Verify($this->configImg);
        $verify->entry();
    }
}