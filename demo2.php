<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/17
 * Time: 20:29
 */
/*$userName='  root  ';
$welcome='新年快乐';
echo $userName;
var_dump($userName);
var_dump(trim($userName));
echo '<br>';
echo strlen($welcome);
echo mb_strlen($welcome);*/

$connection=mysql_connect('localhost','root','');
var_dump($connection);

echo '<br>';

$null=NULL;
//$null;
//$null='typeof null';
unset($null);
var_dump($null);