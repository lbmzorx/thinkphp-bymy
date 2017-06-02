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

    /*
 * 替换邮箱函数，将邮件名称的替换为*或自定义
 * @return返回替换后的邮件地址
 * 例子 **@23.Welcome
 * 替换为23f****243@23.Welcome
 *  @$start替换的起始位置,默认为第1位开始
 * @$len替换长度，默认为4位
 * @$left从左边（true默认）开始，还是从右边（false）开始替换
 * @$char替换符号，默认为'*'
 */
    function replaceEmail($email, $start = 1, $len = 4, $char = '*', $left = true)
    {
        $emailNameLen = strpos($email, '@');
        $emailaddr = substr($email, $emailNameLen);
        $emailName = substr($email, 0, $emailNameLen);

        if ($len > $emailNameLen) {
            if ($start > $emailNameLen) {
                $start = 0;
                $len = $emailNameLen;
            } else {
                if ($left) {
                    $start = $start;
                    $len = $emailNameLen - $start;
                } else {
                    $len = $emailNameLen - $start;
                    $start = 0;
                }
            }
        } else {
            if ($start > $emailNameLen) {
                if ($left) {
                    $start = 0;
                } else {
                    $start = $emailNameLen - $len;
                }
            } else {
                if ($start + $len > $emailNameLen) {
                    $len = $emailNameLen - $start;
                }
                if ($left) {
                } else {
                    $start = $emailNameLen - $len - $start;
                }
            }
        }
        $replace = '';
        for ($i = 0; $i < $len; $i++) {
            $replace .= $char;
        }
        $emailName = substr_replace($emailName, $replace, $start, $len);
        return $emailName . $emailaddr;
    }

}