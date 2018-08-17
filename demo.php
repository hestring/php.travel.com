<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/17
 * Time: 20:08
 */
/*echo 'string';
echo '<br>';
echo  "string2";
echo '<br>';
echo 1;
echo '<br>';
echo 3.1415;
echo '<br>';
echo true;
echo '<br>';
echo false;
echo '<br>';
var_dump(true);
var_dump(false);
var_dump('hello');*/

$newList='news report';
$newList2=" news report2 $newList";
$newList3=' news report2 $newList';

echo $newList.$newList2.$newList3;