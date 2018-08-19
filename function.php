<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2018/8/19
 * Time: 21:35
 */
/*
 * function 函数名($param1,$param2,...,$paramn=默认值){函数体;return 返回值; }
*/
//函数名(param1Value,param2Value,...,paramnValue);
function calculate($num1,$num2,$op){
    if (!is_numeric($num1)||!is_numeric($num2)){
//        echo '数值不合法';
        return ['code'=>1,'msg'=>'数值不合法'];
    }else{
        switch ($op){
            case '+':
//                echo $num1+$num2;
//                break;
                return ['code'=>0,'result'=>$num1+$num2];
            case '-':
//                echo $num1-$num2;
//                break;
                return ['code'=>0,'result'=>$num1-$num2];
            case '*':
//                echo $num1*$num2;
//                break;
                return ['code'=>0,'result'=>$num1*$num2];
            case '/':
                if ($num2!=0){
//                    echo $num1/$num2;
                    return ['code'=>0,'result'=>$num1/$num2];
                }else{
//                    echo '除数不能为零';
                    return ['code'=>1,'msg'=>'除数不能为零'];
                }
//                break;
            default:
//                echo '运算符号不合法';
                return ['code'=>1,'msg'=>'运算符号不合法'];
        }
    }
}
$result=calculate('10',100,'*');
if ($result['code']===0){
    echo $result['result'];
}elseif($result['code']===1){
    echo $result['msg'];
}