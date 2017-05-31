<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 23:53
 */
namespace Admin\Controller;


use Admin\Model\RoleModel;
class RoleController extends CommonController
{
    public function showlist(){

        $data = D('Role')->select();

        //给权限更换名字
        $authName=D('auth')->field(['id','name','level'])->select();
        foreach ($data as $k=>$v){
            $ids = explode(',',$v['auth_ids']);
            $name = '';
            $auth_id_key = array_flip(array_column($authName,'id'));
            foreach (array_filter($ids) as $vv){
                if(isset($auth_id_key[$vv])){
                    if($authName[$auth_id_key[$vv]]['level']==0){
                        $name.='<b>'.$authName[$auth_id_key[$vv]]['name'].'</b>，';
                    }else{
                        $name.=$authName[$auth_id_key[$vv]]['name'].'，';
                    }
                }
            }
            $data[$k]['auth_ids']=rtrim($name,'，');
        }

        $this->assign('data',$data);
        $this->display();
    }

    public function distribute($role_id){

        $post = I('POST.');
        if (!empty($post)) {
            $form_role_id = $post['role_id'];
            $form_auth_id = implode(',',$post['auth_id']);
            $auth = new RoleModel('');
            $z = $auth->saveAuth($form_role_id,$form_auth_id);
            if($z){
                $this->redirect('showlist',[],2,'权限分配成功');
            }else{
                $this->redirect('distribute',['role_id'=>$form_role_id],2,'权限分配失败');
            }

        }

        $role_info = D('Role')->find($role_id);
        $auth_info = D('auth')->select();
        $role_auth_ids = explode(',',$role_info['auth_ids']);
        $this->assign(['auth_info'=>$auth_info,'role_info'=>$role_info,'role_auth_ids'=>$role_auth_ids,'role_id'=>$role_id]);
        $this->display();
    }


}