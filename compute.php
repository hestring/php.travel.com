<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/19
 * Time: 13:03
 */
$x=1;
++$x;
$y=$x++;
echo $y;
echo '<br>'.$x;

var_dump($x xor $y);

//表达式1?表达式2:表达式3;