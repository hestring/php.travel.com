<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 13:07
 */
$a=1;
$b=2;
function test(){
    global $a;
    echo $a;
}
test();
echo '<br>';
echo $a;
echo '<br>';
print_r($GLOBALS);
echo $GLOBALS['b'];