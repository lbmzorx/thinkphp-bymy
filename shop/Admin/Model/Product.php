<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 1:13
 */
namespace Admin\Model;
use Think\Model;
class Product extends Model
{
    protected $fields = ['id','name','cate_id','price','number','add_time','edit_time','image','thumb','brand','detail'];
    protected $pk = 'id';
}