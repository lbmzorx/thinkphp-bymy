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
        $product->select();
        $this->assign('product',$product);
        return $this->display('index');
    }
    public function add(){

        $product = D('Product');
        if(!empty($_POST)){
            $z=$product->save($_POST);
            if($z){
                $this->redirect('index',['name'=>'aa','type'=>true],3,'成功');
            }else{
                $this->redirect('index',['name'=>'aa','type'=>true],3,'失败');
            }
        }

        return $this->display();
    }
    public function edit(){
        return $this->display();
    }
}