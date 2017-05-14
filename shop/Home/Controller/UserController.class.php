<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 12:08
 */

namespace Home\Controller;


use Home\Model\UserModel;
use Think\Controller;
use Think\Verify;

class UserController extends Controller
{

    public $configImg= [
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    =>  110,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontSize'  =>  15,              // 验证码字体大小(px)
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
            'expire'    =>  60,            // 验证码过期时间（s）
            'seKey'     =>  'z-a89,？yw.BNefw,_',   // 验证码加密密钥
        ];

    public function login()
    {

        $this->display();
    }

    public function register()
    {

        $user = I('post.');
        if ($user) {

            $verifyImg =new Verify($this->configImg);       //验证码
            $very=$verifyImg->check($user['user_veryimg']);
            if($very){
                $add_user = new UserModel();
                $data = $add_user->create();
                if($data){
                    $user['user_hobby'] = implode(',', $user['user_hobby']);
                    $user['user_psw']=password_hash( $user['user_psw'],PASSWORD_BCRYPT,['cost'=>12] );   //加密密码，注意5.4以上
                    $user['add_time']=time();
                    if ($add_user->add($user)) {
                        $this->display('login');
                    }
                } else {
                    dump($add_user->getError());
                    $this->assign('errorInfo', $add_user->getError());
                }
            }else{
                $this->assign('is_veryimg','验证码错误');
            }
        }

        $this->display();
    }

    //验证码
    public function verifyImg(){
        $verify=new Verify($this->configImg);
        $verify->entry();
    }
}