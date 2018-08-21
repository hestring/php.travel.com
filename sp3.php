<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 13:19
 */
function plus(){
    static $count=0;
    $count++;
    echo $count.'<br>';
    if ($count<10){
        plus();
    }
}
plus();