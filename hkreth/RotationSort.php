<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 28/5/17
 * Time: 3:43 PM
 */

function processData()
{

    $fin = fopen('input1.txt', 'r');
    $fout = fopen('output1.txt', 'w');
    $N = trim(fgets($fin));
    $arr=array();
    for($i=0;$i<$N;$i++){
        $arr[$i] = trim(fgets($fin));
    }
    $count=0;
    for($j=1;$j<$N;$j++){
        $temp = $arr[$j];
        $i = $j-1;
        while(($arr[$i]>$temp) && ($i>=0)){
            $arr[$i+1] = $arr[$i];
            $i--;
            $arr[$i+1] = $temp;
            $count++;
        }
    }

    fwrite($fout, $count-1);

    fclose($fin);
    fclose($fout);
}

processData();

?>