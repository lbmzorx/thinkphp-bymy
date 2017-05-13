<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 23:41
 */

namespace Admin\Controller;
use Tools\ArrayStr;

class ProductController extends CommonController
{
    public function index(){

        $product = D('Product');
        $data=$product->select();

        $this->assign('data',$data);
        $this->display();
    }
    public function add(){

        $product = D('Product');
        $post = I('POST.');
        if(!empty($post)){
            $productOne = $post;
            $productOne['add_time']=time();
            $z=$product->add($productOne);
            if($z){
                return ['status'=>true,'msg'=>'成功添加商品信息'];
            }else{
                return ['status'=>false,'msg'=>'添加商品信息失败'];
            }
        }
        $this->display();
    }
    public function edit(){

        $id=I('get.id','','number_int');
        $post = I('POST.');
        $data = M('Product');

        if(!empty($post)){

            $post['edit_time']=time();
            $z=$data->save($post);
            if($z){
                return ['status'=>true,'msg'=>'成功添加商品信息'];
            }else{
                return ['status'=>false,'msg'=>'添加商品信息失败'];
            }
        }

        $data = M('Product')->find($id);
        $this->assign('data',$data);
        $this->display();
    }
    public function del(){

        $ids=I('post.ids');
        if(!is_numeric($ids)){
            $ids=ArrayStr::array_filter_repeat($ids);           //
            if(($ids=ArrayStr::array_into_int($ids))) {          //
                $ids = implode(',', $ids);
            }else{
                $ids = false;
            }
        }

        if($ids){
            $product = M('Product');
            if($product->delete($ids)){
                $data['status'] = true;
                $data['msg'] = "删除成功";
                $this->ajaxReturn($data);

            }else{
                $data['status'] = false;
                $data['msg'] = "删除失败";
                $this->ajaxReturn($data);
            }
        }
    }


}