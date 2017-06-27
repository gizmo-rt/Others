<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 10/5/17
 * Time: 12:15 PM
 */

function processData()
{
    $fin = fopen('shino.in', 'r');
    $fout = fopen("shino.out", "w");
    $numbers = explode(" ", trim(fgets($fin)));
    $result = helpShino($numbers);
    fwrite($fout, $result);
    fclose($fin);
    fclose($fout);
}

function helpShino($numbers)
{
    $checkpoint = min($numbers);
    $count = 1;

    for ($index = 2; $index <= ($checkpoint) / 2; $index++) {
        if (($numbers[0] % $index == 0) && ($numbers[1] % $index == 0)) {
            $count++;
        }
    }
    return $count;
}


//function helpShino($numbers)
//{
//    $checkpoint = min($numbers);
//    $len = count($numbers);
//    $count = 0;
//    $b = max($numbers);
//    if ($b % $checkpoint == 0) {
//        return factCount($checkpoint);
//    }
//    for ($index = $checkpoint; $index >= ($checkpoint) / 2; $index--) {
//        if (($numbers[0] % $index == 0) && ($numbers[1] % $index == 0)) {
//            $temp = $index;
//            break;
//        }
//    }
//    return factCount($temp);
//}
//
//function factCount($num){
//
//    if($num == 1)
//        return 1;
//
//    $count=2;
//    for($i=2;$i<ceil(sqrt($count));$i++){
//        if($num%$i == 0){
//            $count++;
//        }
//    }
//    return $count;
//}

processData();
