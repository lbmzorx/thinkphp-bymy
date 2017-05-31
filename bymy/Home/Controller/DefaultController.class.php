<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2017/5/18
 * Time: 20:05
 */

namespace Home\Controller;


use Think\Controller;

class DefaultController extends Controller
{
    public function index(){

        $this->display('index');
    }
}