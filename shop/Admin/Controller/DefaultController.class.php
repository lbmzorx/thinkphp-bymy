<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/7
 * Time: 22:27
 */

namespace Admin\Controller;

use Think\Controller;
class DefaultController extends CommonController
{
    public function index(){
        return $this->display();
    }
//    public function head(){
//        return $this->display();
//    }
//    public function left(){
//        return $this->display();
//    }
//    public function right(){
//        return $this->display();
//    }
}