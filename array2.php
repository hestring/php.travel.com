<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/18
 * Time: 22:55
 */
$news=array(
    'time'=>'2018-8-18',
    'title'=>'news1',
    'link'=>'www.baidu.com',
);
$newsList=array(
    array(
        'time'=>'2018-8-18',
        'title'=>'news1',
        'link'=>'www.baidu.com',
    ),
    array(
        'time'=>'2018-8-18',
        'title'=>'news2',
        'link'=>'www.baidu.com',
    ),
    array(
        'time'=>'2018-8-18',
        'title'=>'news3',
        'link'=>'www.baidu.com',
    ),
);
//var_dump($newsList);
//print_r($newsList);
//增
$newsList[]=array(
    'time'=>'2018-8-18',
    'title'=>'news4',
    'link'=>'www.baidu.com',
);
$newsList[0]['isNew']='yes';
//删
unset($newsList[0]);
unset($newsList[1]['link']);
//改
$newsList[1]=array(
    'time'=>'2018-8-18',
    'title'=>'news11',
    'link'=>'www.baidu.com',
);
$newsList[1]['title']='news111';
//查
print_r($newsList[1]);
print_r($newsList[1]['link']);
echo '<hr>';
//遍历

foreach ($newsList as $value){
//    echo $value['title'].'<br>';
    foreach ($value as $v){
        echo $v.' ';
    }
    echo '<br>';
}

echo '<hr>';

foreach ($newsList as $key=>$value){
    foreach ($value as $k=>$v){
        echo $k.'=>'.$v.'<br>';
    }
    echo '<br>';
}

echo '<hr>';
print_r($newsList);