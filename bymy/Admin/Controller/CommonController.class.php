<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 22:25
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Image;
use Think\Upload;
class CommonController extends Controller
{
    public $modelName='';
    public $expression = [
        '='=>'EQ',
        '<>'=>'NEQ',
        '>'=>'GT',
        '>='=>'EGT',
        '<'=>'LT',
        '<='=>'ELT',
        'like'=>'LIKE',
        'between'=>'BETWEEN',
        'not between'=>'NOT BETWEEN',
        'in'=>'IN',
        'not in'=>'NOT IN',
    ];

    /*
    * 文件上传配置
    */
    public $configUplaod = [];


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



//    /**
//     * 添加一条记录到数据库
//     * 例子：
//     * $modelName = \a\b\UserModel;
//     * $data = ['name'=>'Jon','age'=>'18'];
//     * 返回
//     * 在表User表中插入 insert into user('name','age') valus('Jon','18')
//     * @param string $modelName  模型，包括其命名空间
//     * @param array $data  要保存的数据
//     * @return array|string
//     */
//    public function add($modelName,array $data){
//        if (!$modelName) {
//            if (!$this->$modelName) {
//                return ['status' => false, 'msg' => '缺少模型名称'];
//            }
//            $modelName = $this->$modelName;
//        }
//
//        $model = new $modelName();
//
//        if (!$model->load($data, '')) {
//            $errors = $model->getFirstErrors();
//            return ['status' => false, 'msg' => end($errors)];
//        }
//        $attribute = $model->attributes;
//        if(array_key_exists('add_time',$attribute)){
//            $model->add_time = time();
//        }
//        if(array_key_exists('sn',$attribute)){
//            $model->sn = $model->create_sn();
//        }
//
//        if (!$model->save()) {
//            $errors = $model->getFirstErrors();
//            return ['status' => false, 'msg' => end($errors)];
//        }
//        return ['status' => true, 'msg' => '添加成功'];
//    }

    /**
     * 添加数据
     * @param string $model
     * @param array $data
     * @return array|mixed
     */
    public function add($model='',array $data){
        $model=$model?$model:$this->modelName;
        if(empty($model)){
            return ['status'=>false,'msg'=>'缺少模型名称'];
        }
        $model = M($model); // 实例化Model对象
        if (!$model->create($data,1)){
            return ['status'=>false,'msg'=>$model->getError()];
        }else{
            // 验证通过 可以进行其他数据操作
            $field = $model->getDbFields();
            if(in_array('add_time',$field)){
                $model->add_time=time();
            }
            return $model->add();
        }
    }

    /**
     * 更新数据
     * @param string $modelName    所要查找的模型
     * @param array $data   所要更新的数据
     * @param array $where  所要更新记录的查找条件
     * @return array
     */
    protected function edit($modelName,array $data,array $where){

        if (!$modelName) {
            if (!$this->$modelName) {
                return ['status' => false, 'msg' => '缺少模型名称'];
            }
            $modelName = $this->$modelName;
        }
        $model = M($modelName)->where($where); // 实例化Model对象
        if (!$model->create($data,1)){
            return ['status'=>false,'msg'=>$model->getError()];
        }else{
            // 验证通过 可以进行其他数据操作
            $field = $model->getDbFields();
            if(in_array('edit_time',$field)){
                $model->edit_time = time();
            }
        }

        if (!$model->save($data)) {
            $errors = $model->getDbError();
            return ['status' => false, 'msg' => end($errors)];
        }



        return ['status' => true, 'msg' => '修改成功'];
    }

    /**
     * 删除数据
     * @param $modelName
     * @param $where
     * @return array
     */
    protected function del($modelName,$where){
        if (!$modelName) {
            if (!$this->$modelName) {
                return ['status' => false, 'msg' => '缺少模型名称'];
            }
            $modelName = $this->$modelName;
        }
        if ($where) {
            $status = M($modelName)->where($where)->delete();
            if ($status) {
                return ['status'=>true,'msg'=>'删除成功！'];
            } else {
                return ['status'=>false,'msg'=>'删除失败！'];
            }
        }
    }

    /**
     * 查找一条或多条记录
     * @param $modelName
     * @param array $where
     * @param array $select
     * @param string $num 'one' or 'all' 数量一条'one'或者很多条'all'记录
     * @return array
     */
    public function getRecord($modelName,array $where,array $select=[],$num='one'){
        if (!$modelName) {
            if (!$this->$modelName) {
                return ['status' => false, 'msg' => '缺少模型名称'];
            }
            $modelName = $this->$modelName;
        }
        if(count($select)>0){
            $model = $modelName::find()->select($select)->where($where);
        }else{
            $model = $modelName::find()->where($where);
        }
        if($num =='one'){
            $model = $model->asArray()->one();
        }else{
            $model = $model->asArray()->all();
        }

        if(!$model){
            return ['status' => false, 'msg' => '找不到该记录'];
        }
        return $model;
    }


    /**
     * * 重新定义where函数
     * 返回构建多条件的查询对象
     * $query->andFilterCompare('field1','value1','operator1')->andFilterCompare('field2','value2','operator2')...
     * $data=['field1'=>'value1','field2'=>'value2','field3'=>['value3','value4']]
     * 返回
     * $query->andFilterWhere(['and','field1'=>'value1',['like','field2','value2'],['>=','field3','value3'],['<=','field3','value4']])
     * @param $query 查询对象
     * @param array $condition 查询所需的字段和对应操作
     * @param array $data 数据所需的字段和对应值
     * @return mixed
     */
    public function whereSearch( $query,array $condition, array $data)
    {
        $data=$this->whereCondition($condition,$data);
        if(count($data)){
            $query=$query->Where($data);
        }
        return $query;
    }

    /**
     * 表达式查询函数
     *
     *举个例子：
     *$express=['field1'=>'=','field2'=>'like','t.field3'=>'between']
     *$data=['field1'=>'value1','field2'=>'value2','field3'=>['value3','value4']]
     * 返回：
     * ['field1'=>'value1',['like','field2','value2'],['>=','field3','value3'],['<=','field3','value4']]
     * 对从get或post回来的函数构造查询条件
     * @param $express 查询所需的字段和对应操作
     * @param $data  数据所需的字段和对应值
     * @return array 返回条件操作符格式的查询条件
     */
    public function whereCondition($express, $data)
    {
        $condition=[];
        foreach($express as $k=>$v){
            $b = explode('.',$k);
            $c=count($b);
            if($c==2){
                $key=$b[1];
            }elseif($c==1){
                $key=$b[0];
            }
            if(isset($data[$key])){
                switch ($v){
                    case 'between':
                        $start=$data[$key][0];
                        $end = $data[$key][1];
                        if($start>$end){
                            $temp =$start;
                            $start=$end;
                            $end=$temp;
                        }
                        if("$start"!=null){
                            $condition[]=[$k=>['EGT',$start]];
                        }
                        if("$end"!=null){
                            $condition[]=[$k=>['ELT',$end]];
                        }
                        break;
                    case 'not between':
                        $start=$data[$key][0];
                        $end = $data[$key][1];
                        if($start>$end){
                            $temp =$start;
                            $start=$end;
                            $end=$temp;
                        }
                        if("$start"!=null){
                            $condition[]=[$k=>['ELT',$start]];
                        }
                        if("$end"!=null){
                            $condition[]=[$k=>['EGT',$end]];
                        }
                        break;
                    case '=':
                        if("$data[$key]"!=null){
                            echo $data[$key].$k;
                            $condition[]=[$k=>$data[$key]];
                        }
                        break;
                    default:
                        if("$data[$key]"!=null){
                            $condition[]=[$k=>[$this->expression[$v],$data[$key]]];
                        }
                }
            }
        }
        return $condition;
    }

    public function upload(){

        $upload = new Upload($this->configUplaod);
        $upload->savePath=date("Y").'/';
        $path =$upload->rootPath.$upload->savePath;
        if(is_dir($path)==false){
            mkdir($path, 0755, true);
        }
        $up=$upload->upload();

        $path='/'.$upload->rootPath.$up['img']['savepath'].$up['img']['savename'];
        if($up){
            $post=['status'=>true,'msg'=>'上传成功','src'=>$path];
        }else{
            $post=['status'=>false,'msg'=>'上传失败'.$upload->getError()];
        }
        $this->ajaxReturn($post,'json');
    }

    public function thumb($img,$path){
        $thumb = new Image();
        $thumb->open($img);       //打开大图
        $thumb->thumb(100,100);             //等比例压缩长和宽都小于100的图片
        $thumb->save($path);
    }
}