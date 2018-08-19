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



/*二维数组定义
	array(array(),array(),...);
    [[],[],...];
二维数组里添加元素
	数组变量[]=value;
	数组变量[key]=value;
	数组变量[key1][key2]=value;
修改二维数组元素值
	数组变量[key]=new value;
	数组变量[key1][key2]=new value;
删除元素值
	unset(数组变量[key]);
	unset(数组变量[key1][key2]);
获取二维数组元素
	数组变量[];
	数组变量[key1][key2];*/