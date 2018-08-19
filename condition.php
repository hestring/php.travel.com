<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/19
 * Time: 19:19
 */
//if (条件表达式) {语句块1;};
//if (条件表达式) {语句块1;} else {语句块2;};
//if (条件表达式1) {语句块1} elseif (条件表达式2) {语句块2;};

/*
 * switch (表达式) {
    case 值1:
        语句块1;
        break;
    case 值2:
        语句块2;
        break;
        ...
	default :
        语句块n;
	}
*/

//while(条件表达式){语句块}
//do{语句块}while(条件表达式)
//for(表达式1;条件表达式2;表达式3){语句块}
/*$isNew='5';
if ($isNew===5){
    echo '5';
}elseif ($isNew===2){
    echo '15';
}else{
    echo '25';
}*/

for ($i=0;$i<11;$i++){
    echo $i.'<br>';
}
echo '<hr>';

exit('输出一个消息并退出当前脚本');
die('输出一个消息并退出当前脚本2');

for ($i=0;$i<11;$i++){
    echo $i.'<br>';
}
echo '<hr>';