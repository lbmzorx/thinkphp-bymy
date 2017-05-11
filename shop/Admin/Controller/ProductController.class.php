<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 23:41
 */

namespace Admin\Controller;


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
        $data = M('Product')->select($id);
        $this->assign('data',$data);
        $this->display();
    }
}