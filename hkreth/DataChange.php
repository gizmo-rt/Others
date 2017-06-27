<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 10/5/17
 * Time: 2:04 PM
 */

function processData()
{
    $fin = fopen('data.in', 'r');
    $fout = fopen("data.out", "w");
    $T = trim(fgets($fin));
    $numbers = explode(" ", trim(fgets($fin)));
    $result = updateArr($numbers);
    fwrite($fout, $result);
    fclose($fin);
    fclose($fout);
}

function updateArr($list){

    $sum = array_sum($list);
    $count = count($list);
    sort($list);
    $prev=0;
    foreach ($list as $val){
        $temp = $count*$val;
        if($temp > $sum){
            return findSeed($prev,$val,$count,$sum);
        }
       $prev = $val;
    }
    return ($prev+1);
}

function findSeed($prev,$cur,$count,$sum){

    if($cur == $prev+1)
        return $cur;

    for($i=$prev+1;$i<=$cur;$i++){
        $t = $i*$count;
        if($t > $sum)
            return $i;
    }
}

processData();