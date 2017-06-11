<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 1:13
 */
namespace Admin\Model;
use Think\Model;
class ProductCateModel extends Model
{
    protected $fields = ['id','name','pid','level','add_time','edit_time'];
    protected $pk = 'id';

}