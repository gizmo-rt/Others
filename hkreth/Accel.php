<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 8/4/17
 * Time: 3:23 PM

N  output  PIN(?)
15 4
48 8
60 8
 *
 *
 */

function input(){
    $stdin = fopen('php://stdin', 'r');
    $T = fgets($stdin);
    $count=0;
    $N = array();
    while($count < $T){
        $N[$count++] = fgets($stdin);
    }
    for($i=0;$i<$T;$i++){
        $coinVal = coinMaxVal($N[$i]);
        print $coinVal."\n";
    }

}

function coinMaxVal($n)
{
    $count = 0;
    $factor = 0;
    $result = 0;
    $temp1 = 0;
    $temp2 = 0;
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            $count++;
            $temp1 = log($count, 2);
            $temp2 = floor($temp1);
            if ($temp1 == $temp2) {
                if ($count < $result) {
                    break;
                } else {
                    $result = $count;
                }
            }
        }
    }
}