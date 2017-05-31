<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 22:25
 */

namespace Admin\Controller;


use Think\Controller;

class CommonController extends Controller
{
    public $modelName='';

    /*
     * 增加一条记录到数据库
     */
    function __construct()
    {


        parent::__construct();

        $now_ac = CONTROLLER_NAME.'/'.ACTION_NAME;     //当前控制器，操作方法

        $admin_id = session('admin_id');                //查询当前用户信息
        $admin_name=session('admin_name');


//        //未登陆用户重定向登陆
//        $login_ac='Manager/login,Manager/verifyImg,Manager/register,Manager/logout';
//        if(empty($admin_name)&&(strpos($login_ac,$now_ac)===false)){
//            //使用js来重定向可以确保iframe完全退出
//            $js =<<<eof
//                    <script type="text/javascript">
//                        window.top.location.href="/index.php/Admin/Manager/login";
//
//                    </script>
//eof;
//            echo $js;
//            exit;
////            $this->redirect('Manager/login');
////            exit;
//        }
//
//        //获取当前账号-》账号对应角色-》角色对应权限-》权限允许控制器，操作方法
//        $admin_info=D('admins')->find($admin_id);
//        $role_id =$admin_info['role_id'];
//        $role_info = D('role')->find($role_id);
//        $auth_ac = $role_info['auth_ac'];
//        //允许访问的控制器和操作方法
//        $allow_ac = 'Manager/login,Manager/logout,Manager/register,Manager/verifyImg,Default/index,Default/header,Default/left,Default/right';
//        if(strpos($auth_ac,$now_ac)===false&&strpos($allow_ac,$now_ac)===false&&$admin_name!=='lbmzorx'){
//            redirect('Default/index',[],3,'访问错误');
//        }

    }


    public function add($model='',$data=''){
        $model=$model?$model:$this->modelName;
        if(empty($model)){
            return ['status'=>false,'msg'=>'缺少模型名称'];
        }
        $m = D($model); // 实例化Model对象
        if (!$m->create($data,1)){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            return ['status'=>false,'msg'=>$m->getError()];
        }else{
            // 验证通过 可以进行其他数据操作
            $field = $m->getDbFields();
            if(in_array('add_time',$field)){
                $m->add_time=time();
            }
            return $m->add();
        }
    }

    public function edit($model='',$data='',$id=''){

        $id = $id?$id:I('post.id');
        if(empty($id)){
            return ['status'=>false,'msg'=>'请指定记录'];
        }

        $model=$model?$model:$this->modelName;
        if(empty($model)){
            return ['status'=>false,'msg'=>'缺少模型名称'];
        }

        $m = D($model)->where(['id'=>$id]); // 实例化Model对象
        if(empty($m->select())){
            return ['status'=>false,'msg'=>'未找到该记录'];
        }
        if (!$m->create($data,2)){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            return ['status'=>false,'msg'=>$m->getError()];
        }else{
            // 验证通过 可以进行其他数据操作
            $field = $m->getDbFields();
            if(in_array('edit_time',$field)){
                $m->edit_time=time();
            }
            return $m->save();
        }
    }
    public function del(){

    }
}