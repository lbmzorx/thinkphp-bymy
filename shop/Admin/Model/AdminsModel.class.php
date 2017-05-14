<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 12:47
 */

namespace Admin\Model;


use Think\Model;

class AdminsModel extends Model
{
    protected $fields = ['id','name','password','resetpassword','phone','email','thumb','header','role','edit_time','add_time'];
    protected $pk = 'id';

    // array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    protected $_validate        =   array(
        array('name','require','用户名不能为空',1),                   //用户名不能为空
        array('name','require','用户名已经存在',1,'unique'),          //用户名唯一

        array('password','require','密码不能为空',1),                     //密码不能为空
        array('password','6,30','密码需要包含数字字母且需要大于6位以上30位以下',1,'length'),  //密码不能为空
        array('password2','require','确认密码不能为空',1),                  //确认密码不能为空
        array('password2','password','两次密码必须相等',1,'confirm'),       //确认密码与密码一致
        array('email','email','邮箱格式不正确',1),                    //邮箱格式
        array('email','email','邮箱已经被注册',1,'unique'),                    //邮箱格式
        array('phone','number','手机格式不正确',1),                   //手机为数字
        array('phone','number','手机已经被注册',1,'unique'),                   //手机为数字
        array('phone','11','手机格式不正确',1,'length'),              //手机11位
    );  // 自动验证定义
    protected $patchValidate    =   true;   // 是否批处理验证

    public function check_hobby($arg){
        if(count($arg)<2){
            return false;
        }
        return true;
    }

}