<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/19
 * Time: 12:20
 */

define('DATABASE','news');
echo DATABASE;
//常量值必须是标量数据类型数据或NULL
echo '<hr>';
var_dump(PHP_VERSION);
var_dump(PHP_OS);
echo '<hr>';
var_dump(defined('DATABASE'));
$news=['time'=>'2018-8-19','title'=>'new1'];
echo '<hr>';
$news1=null;
$news2;
print_r($news);
var_dump(isset($news1));
var_dump(empty($news1));
var_dump(empty($news2));
var_dump(is_null($news1));
var_dump(is_null($news2)); //error

//defined(name,value,[FALSE|TRUE]);