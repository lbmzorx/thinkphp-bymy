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

    /**
     * 替换邮箱函数，将邮件名称的替换为*或自定义
     * 返回替换的右键名称
     * 例子：
     * 用户邮箱1234567890@123.com
     * $str='1234567890@123.com';
     * $return=1****67890@123.com
     * case1:echo replaceEmail($str,1,11,'*',true);     返回：1*********@123.com
     * case2:echo replaceEmail($str,1,11,'-',false);    返回：---------0@123.com
     * case3:echo replaceEmail($str,11,11,'/',false);   返回：//////////@123.com
     * case4:echo replaceEmail($str,5,10,'》',true);    返回：12345》》》》》@123.com
     * case5:echo replaceEmail($str,5,11,'+',false);    返回：+++++67890@123.com
     * case6:echo replaceEmail($str,11,2,'%',true);     返回：%%34567890@123.com
     * case7:echo replaceEmail($str,7,6,'8',false);     返回：8884567890@123.com
     * case8:echo replaceEmail($str,7,6,'w',true);      返回：1234567www@123.com
     * @param $email
     * @param int $start 开始替换的位置，默认为1
     * @param int $len 替换长度，默认为4
     * @param string $char 替换符号，默认为'*'
     * @param bool $left 替换顺序，默认为从左边
     * @return string
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