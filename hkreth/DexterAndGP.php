<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 19/6/17
 * Time: 2:59 PM
 */

function processData()
{

    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $N = trim(fgets($fin));

    for($i=0;$i< $N;$i++){
        $lookup = explode(" ", trim(fgets($fin)));

        $result = checkGPSum($lookup);
        fwrite($fout, $result."\n");
    }
    fclose($fin);
    fclose($fout);
}

function checkGPSum($lookup){
    $r = $lookup[0];
    $s = $lookup[1];
    $p = $lookup[2];
    $data=1;
    $sum=1;
    $d=-1;
    for($j=1;$j<$p;$j++){
        if($sum == $s){
            $d = $j;
            break;
        }
        $data = ($data*$r);
        $sum+=$data;
        $sum%=$p;
    }
    return $d;
}



processData();