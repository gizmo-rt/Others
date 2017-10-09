<?php
/**
 * Created by PhpStorm.
 * User: pawanrajmurarka
 * Date: 07/10/17
 * Time: 1:06 PM
 */


function find_answer()
{
    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $l = trim(fgets($fin));
    $inp = explode(" ", trim(fgets($fin)));
    $result = arrSplitNMax($inp,$l);
    fwrite($fout, $result . "\n");
    fclose($fin);
    fclose($fout);
}


function arrSplitNMax($input,$l){
    sort($input);


    $arr1 = array_splice($input,0, floor($l/2));
    $arr2 = $input;

    if(array_sum($arr1) < array_sum($arr2)){

    }

    return;
}

find_answer();