<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 9/4/17
 * Time: 12:16 PM
 * Easy Level
 * Code Gladiator by deloitte
 */

function processData(){

    $file = fopen('monkey.txt', 'r');
    $jumpSize = trim(fgets($file));
    $fallSize = trim(fgets($file));
    $wallCount = trim(fgets($file));
    $wallHeightArr = array();
    $totalJumps=0;

    for($i=0;$i<$wallCount;$i++){
        $wallHeightArr[$i] = trim(fgets($file));
    }
    $j=0;
    $usedSize=0;
    while($j < $wallCount){
        $usedSize+=$jumpSize;
        if($usedSize >= $wallHeightArr[$j]){
            $usedSize=0;
            $j++;
        }
        else{
            $usedSize-=$fallSize;
        }
        $totalJumps++;
    }

    print_r($wallHeightArr);
    print "Jumps=".$totalJumps;
    fclose($file);

}


processData();