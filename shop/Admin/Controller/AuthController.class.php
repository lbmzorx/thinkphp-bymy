<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 23:53
 */
namespace Admin\Controller;


use Admin\Model\AuthModel;
class AuthController extends CommonController
{
    public $modelName = 'auth';
    public function showlist(){

        $data = D('auth')->order(['path'=>'ASC'])->select();

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

    /*
     * 增加权限
     */
    public function add(){

        $post = I('POST.');
        if (!empty($post)) {
            $m =new AuthModel();
            $z=$m->saveData($post);
            if($z){
                $this->redirect('showlist',[],2,'增加成功');
            }else{
                $this->redirect('edit',[],2,$z['msg']);
            }
        }
        $auth_father = D('auth')->where(['level'=>0])->select();
        $this->assign(['auth_father'=>$auth_father]);
        $this->display();
    }
    /*
     * 修改权限
     */
    public function edit($auth_id){

        $post = I('POST.');
        if (!empty($post)) {
            $m =new AuthModel();
            $z=$m->saveData($post);
            if($z){
                $this->redirect('showlist',[],2,'修改成功');
            }else{
                $this->redirect('edit',[],2,$z['msg']);
            }
        }
        $data = D('auth')->select($auth_id);
        $auth_father = D('auth')->where(['level'=>0])->select();

        $this->assign(['data'=>$data,'auth_father'=>$auth_father]);
        $this->display();
    }


}