<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/17
 * Time: 22:11
 */

$array1=array('news1','news2','news3','news4');
$array2=['news1','news2','news3','news4'];
$array3=array(
    'string'=>'string',
    'int'=>2018,
    'float'=>3.1415,
    'bool'=>true,
    'array'=>array(),
    10=>'hello'
);

$array3[]='halo';
$array3['string']='哈喽';

//echo '<br>';
//var_dump($array1);
//echo '<br>';
//echo '<br>';
//print_r($array3);

foreach ($array1 as $value){
    echo $value.'<br>';
}

foreach ($array1 as $key=>$value){
    echo $key.'=>'.$value.'<br>';
}