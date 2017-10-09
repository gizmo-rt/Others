<?php
/**
 * Created by PhpStorm.
 * User: pawanrajmurarka
 * Date: 07/10/17
 * Time: 2:27 PM
 */
function find_answer()
{
    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');

    $T = trim(fgets($fin));

    for($i=0;$i<$T;$i++){
        $inp = trim(fgets($fin));
        $q = trim(fgets($fin));
        for($j=0;$j<$q;$j++){
            $queryData = explode(" ", trim(fgets($fin)));
            if($queryData[0]==1){
                $inp = updateInputString($inp,$queryData);
            }else{
                fwrite($fout, getBinaryData($inp,$queryData) . "\n");
            }
        }
    }
    fclose($fin);
    fclose($fout);
}

function updateInputString($inp,$queryData){
    $inp[$queryData[1]] = $queryData[2];
    return $inp;
}

function getBinaryData($inp,$queryData){
    $data = substr($inp,$queryData[1],$queryData[2]-$queryData[1]+1);
    $num = bindec($data);
    return $num%5;
}

find_answer();