<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/12
 * Time: 18:43
 */

function calculator($first,$second,$sign){
    $result = 0;
    switch ($sign){
        case '+':
            $result = (double)$first +(double)$second;
            break;
        case '-':
            $result = (double)$first -(double)$second;
            break;
        case '*':
            $result = (double)$first *(double)$second;
            break;
        case '/':
            if($second==='0')
                return 'error';
            $result = (double)$first / (double)$second;
            break;
        case '%':
            if($second==='0')
                return 'error';
            $result = (double)$first % (double)$second;
            break;
    }
    return $result;

}