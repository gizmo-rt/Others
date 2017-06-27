<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 19/6/17
 * Time: 10:20 PM
 *
 * Input:
 * 3
 * 3
 * 3 2 1
 * 3
 * 1 3 2
 * 5
 * 6 4 1 2 1
 *
 * Output
 * 4
 * 2
 * 12
 */

function processData()
{
    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $T = trim(fgets($fin));

    for ($i = 0; $i < $T; $i++) {
        $length = trim(fgets($fin));
        $lookup = explode(" ", trim(fgets($fin)));
        $result = findPossiblePartition($lookup, $length);
        fwrite($fout, $result . "\n");
    }
    fclose($fin);
    fclose($fout);
}


function findPossiblePartition($lookup, $length)
{

    $start = 0;
    $end = 0;
    $sign = '';
    $val = $lookup[0];
    $data = '';
    $k = 0;
    if ($val >= $lookup[1]) {
        $sign = '>';
    } else {
        $sign = '<';
    }

    for ($i = 1; $i < $length; $i++) {
        if (($lookup[$i] < $val) && ($sign == '>')) {
            $end++;
        }

        if (($lookup[$i] >= $val) && ($sign == '<')) {
            $end++;
        }

        if (($lookup[$i] < $val) && ($sign == '<')) {
            if((($end - $start) == 1)&&(!$start)){
                $data[$k] =  $end - $start;
            }
            else{
                $data[$k] = 1+$end - $start;
            }
            $start = $i;
            $end = $i;
            $k++;
        }

        if (($lookup[$i] >= $val) && ($sign == '>')) {
            if((($end - $start) == 1)&&(!$start)){
                $data[$k] =  $end - $start;
            }
            else{
                $data[$k] = 1+$end - $start;
            }
            $start = $i;
            $end = $i;
            $k++;
        }
        $val = $lookup[$i];
    }

    if ($start != $end) {
        if((($end - $start) == 1)&&(!$start)){
            $data[$k] =  $end - $start;
        }
        else{
            $data[$k] = 1+$end - $start;
        }
        $k++;
    }
    $sum = 1;
    for ($m = 0; $m <$k; $m++) {
        $n = $data[$m];
        $sum *= (1 + $n);
    }
    print $sum . "\n";
}

processData();