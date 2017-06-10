<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 23:41
 */

namespace Admin\Controller;

use Think\Image;
use Think\Upload;
use Tools\ArrayStr;
use Tools\Pagination;

class ProductController extends CommonController
{

    /*
     * 文件上传配置
     */
    public $configUplaod = [
        'mimes' => array('image/png','image/jpeg',), //允许上传的文件MiMe类型
        'exts' => array('jpg','png','gif','jpeg'), //允许上传的文件后缀
//        'autoSub' => true, //自动子目录保存文件
//        'subName' => array('date', 'md'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath' => 'Upload/Product/', //保存根路径
//        'savePath' => '',         //保存路径
//        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
//        'hash' => true, //是否生成hash编码
    ];


    /*
     * 展示商品
     */
    public function index()
    {
        $get = I('get.');
        $query = D('Product');
        $condition=['id'=>'=','name'=>'like','cate_id'=>'=','price'=>'between','number'=>'between','brand'=>'like'];
        $query=parent::whereSearch($query,$condition,$get);
        $query =$query ->order('id desc');
        $queryCount =clone $query;

        $count = $queryCount->count();

        $page = new Pagination(['totalCount'=>$count]);
        $page->pageSize=I('get.pageSize')?I('get.pageSize'):10;
//        $show = $Page->show();// 分页显示输出

        $data=$query->limit($page->getOffset(),$page->getLimit())->select();
        $this->assign('object',$page);
        $this->assign('page',$page->getPropertyArray());// 赋值分页输出
        // 赋值分页输出
        $this->assign('data', $data);
        $this->display();
    }

    /*
     * 添加商品
     */
    public function add()
    {

        $product = D('Product');
        $post = I('POST.');
        if (!empty($post)) {
            $post['add_time'] = time();
            $img=$_FILES['img'];
            var_dump($_FILES);
            //上传大图片
            $upload = new Upload($this->configUplaod);
            $up=$upload->uploadOne($img);
            $post['image']=$upload->rootPath.$up['savepath'].$up['savename'];
            //制作缩略图,缩略图前面有thumb_
            $post['thumb']=$upload->rootPath.$up['savepath'].'thumb_'.$up['savename'];
            $thumb = new Image();
            $thumb->open($post['image']);       //打开大图
            $thumb->thumb(100,100);             //等比例压缩长和宽都小于100的图片
            $thumb->save($post['thumb']);


            $z=$product->add($post);
            if($z){
                $this->assign(['status'=>true,'msg'=>'成功添加商品信息']) ;
                $this->redirect('index');
            }else{
                $this->assign(['status'=>false,'msg'=>'添加商品信息失败']) ;
            }
        }
        $cate=D('product_cate');
        $this->assign();
        $this->display();
    }

    /*
     * 修改商品信息
     */
    public function edit()
    {

        $id = I('get.id', '', 'number_int');
        $post = I('POST.');
        $data = M('Product');

        if (!empty($post)) {

            $post['edit_time'] = time();
            $z = $data->save($post);
            if ($z) {
                $this->redirect('index');
            } else {
                $this->assign(['status' => false, 'msg' => '添加商品信息失败']);
            }
        }

        $data = M('Product')->find($id);
        $this->assign('data', $data);
        $this->display();
    }

    /*
     * 删除商品信息
     */
    public function del()
    {

        $ids = I('post.ids');
        if (!is_numeric($ids)) {
            $ids = ArrayStr::array_filter_repeat($ids);           //
            if (($ids = ArrayStr::array_into_int($ids))) {          //
                $ids = implode(',', $ids);
            } else {
                $ids = false;
            }
        }

        if ($ids) {
            $product = M('Product');
            if ($product->delete($ids)) {
                $data['status'] = true;
                $data['msg'] = "删除成功";
                $this->ajaxReturn($data);

            } else {
                $data['status'] = false;
                $data['msg'] = "删除失败";
                $this->ajaxReturn($data);
            }
        }
    }




}