<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 12:47
 */

namespace Admin\Model;


use Think\Model;

class AuthModel extends Model
{

    protected $fields = ['id','name','pid','controller','action','path','level',];
    protected $pk = 'id';

    /*
     * 插入信息存入,或者更新
     */
    public function saveData($data)
    {

        if(empty($data['id'])){
            $newId = $this->add($data);
        }else{
            $newId = $data['id'];
        }

        if($data['pid']==0){
            $path=$newId;
        }else{
            $pinfo = $this->find($data['pid']);
            $path = $pinfo['path'].'-'.$newId;
        }
        $this->level=substr_count($path,'-');
        $this->path=$path;
        return $this->where(['id'=>$newId])->save();
    }

    /*
     *更换名字
     */
    public function aliasAuth_id($auth_ids)
    {
        $auth =  D('auth')->field('name')->select($auth_ids);
        $name = '';
        foreach ($auth as $v){
            $name = $v['name'].',';
        }
        return rtrim($name,',');
    }

}