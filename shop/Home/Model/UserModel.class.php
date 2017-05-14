<?php
namespace Home\Model;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 12:51
 */
use \Think\Model;
class UserModel extends Model
{
    protected $fields = ['id','user_name','user_psw','user_re_psw','user_qq','user_email','user_phone','user_header',
        'user_thumb','user_sex','user_educate','user_hobby','user_detail','add_time','edit_time'];
    protected $pk = 'id';
    // array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    protected $_validate = array(
        array('user_name','require','用户名不能为空',1),                 //用户名不能为空
        array('user_name','require','用户名已经存在',1,'unique'),        //用户名唯一

        array('user_psw','require','密码不能为空',1),                    //密码不能为空
        array('user_psw','6,30','密码需要包含数字字母且需要大于6位以上30位以下',1,'length'),                    //密码不能为空
        array('user_psw2','require','确认密码不能为空',1),                //确认密码不能为空
        array('user_psw2','user_psw','两次密码必须相等',1,'confirm'),   //确认密码与密码一致

        array('user_email','email','邮箱格式不正确',1),                  //邮箱格式
        array('user_qq','number','qq必须为数字',2),                      //qq验证
        array('user_qq','5,12','qq位数在5到12之间',2,'length'),       //qq数字的位数
        array('user_educate','2,5','请选择学历必须选择一项',1,'between'),//学历必须选择一项
        array('user_hobby','check_hobby','爱好必须选择两项以上',1,'callback'),//爱好必须选择两项以上
    );  // 自动验证定义
    protected $patchValidate    =   true;   // 是否批处理验证

    public function check_hobby($arg){
        if(count($arg)<2){
            return false;
        }
        return true;
    }

}