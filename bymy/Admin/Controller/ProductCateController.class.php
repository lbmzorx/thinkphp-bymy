<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2017/6/11
 * Time: 13:14
 */

namespace Admin\Controller;
use Tools\Pagination;
use Tools\ArrayStr;

class ProductCateController extends CommonController
{
    public function index()
    {

        $get = I('get.');
        $query = D('ProductCate as p');
        $condition = ['p.id' => '=', 'p.name' => 'like', 'p.cate_id' => '=','p.level'=>'=', 'p.price' => 'between',
                    'p.number' => 'between', 'p.brand' => 'like','p.add_time'=>'between','p.edit_time'=>'between'];
        $timeTpye = I('get.time-type');
        $time=I('get.time');
        if($time){
            $get[$timeTpye][0]=strtotime($time[0]);
            $get[$timeTpye][1]=strtotime($time[1]);
        }

        $querya = parent::whereSearch($query, $condition, $get);
        $query = $query->order('id desc');
        $queryCount = clone $query;
        $count = $queryCount->count();

        $page = new Pagination(['totalCount' => $count]);
        $page->pageSize = I('get.pageSize') ? I('get.pageSize') : 10;
        $data = $query->join('__PRODUCT_CATE__ as c ON c.id = p.pid','LEFT')
            ->field(['p.id','p.name','p.level','p.add_time','p.edit_time','c.name as pidname'])
            ->limit($page->getOffset(), $page->getLimit())
            ->select();
        $this->assign('page', $page->getPropertyArray());// 赋值分页输出
        // 赋值分页输出
        $this->assign('data', $data);
        $this->display();

    }

    /*
   * 添加商品
   */
    public function add()
    {

        $productCate = D('ProductCate');
        $post = I('POST.');
        if (!empty($post)) {
            $post['add_time'] = time();
            $z=$productCate->add($post);
            if($z){
                $this->assign(['status'=>true,'msg'=>'成功添加商品信息']) ;
                $this->redirect('index');
            }else{
                $this->assign(['status'=>false,'msg'=>'添加商品信息失败']) ;
            }
        }

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
                $this->ajaxReturn(['status' => false, 'msg' => '添加商品信息失败'],'json');
            }
        }

        $data = M('Product')->find($id);
        if ($data) {
            $this->ajaxReturn(['status'=>true,'data'=>$data], 'json');
        } else {
            $this->ajaxReturn(['status'=>false,'msg'=>'获取数据失败'], 'json');
        }


    }

    /*
     * 删除商品信息
     */
    public function delProductCate()
    {
        $ids = I('post.ids');
        if (!is_numeric($ids)) {
            $ids = ArrayStr::array_filter_repeat($ids);
            if (($ids = ArrayStr::array_into_int($ids))) {
                $ids = implode(',', $ids);
            } else {
                $ids = false;
            }
        }
        $where=['id'=>$ids];
        $status=parent::del('ProductCate',$where);
        $this->ajaxReturn($status);
    }

    public function getLevel(){

        $pid = I('POST.id');
        $level = I('POST.level');
        $query = D('ProductCate');
        $data=$query->field(['id','name'])->where(['level'=>$level,'pid'=>$pid])->select();
        if($data){
            $this->ajaxReturn(['status'=>true,'data'=>$data],'json');
        }else{
            $this->ajaxReturn(['status'=>false,'msg'=>'未能查询到该信息'],'json');
        }

    }

}