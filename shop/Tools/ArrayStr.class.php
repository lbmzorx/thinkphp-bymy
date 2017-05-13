<?php
namespace Tools;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/13
 * Time: 23:28
 * 关于字符串和数组的操作
 */
class ArrayStr
{

    /*
     * 对数值进行数值型的过滤
     * $arr内含有数值型的元素
     * 如果$arr为空或无数值型元素则返回false
     * 否则对$arr内非数值型元素进行过滤并输出
     */
    public static function array_into_int(array $arr){
        $arr=array_filter($arr);
        if(!$arr){
            return false;
        }
        $val = [];
        foreach ($arr as $k=>$v){
            if(is_numeric($v)){
                $val[$k]=$v;
            }
        }
        return $val;
    }

    /*
     * 对数组去重，如果数组元素有相同的值，则去掉,(某个元素是一维数组则自动过滤)
     */
    public static function array_filter_repeat(array $arr){
        return array_flip(array_flip($arr));
    }
}