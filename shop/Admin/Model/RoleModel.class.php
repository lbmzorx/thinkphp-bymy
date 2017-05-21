<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 12:47
 */

namespace Admin\Model;


use Think\Model;

class RoleModel extends Model
{

    protected $fields = ['id', 'name', 'auth_ids', 'auth_ac',];
    protected $pk = 'id';

    /*
     * 角色授权信息存入角色表
     */
    public function saveAuth($role_id, $auth_ids)
    {

        $auth = D('auth')->select($auth_ids);
        $ac = '';
        foreach ($auth as $v) {
            if (!empty($v['controller']) && !empty($v['action'])) {
                $ac .= $v['controller'] . '/' . $v['action'] . ',';
            }
        }
        $ac = rtrim($ac, ',');

        return $this->save(['id' => $role_id, 'auth_ids' => $auth_ids, 'auth_ac' => $ac]);

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