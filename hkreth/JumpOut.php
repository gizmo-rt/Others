<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 19/6/17
 * Time: 1:18 PM
 */

function processData(){

    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $N = trim(fgets($fin));
    $lookup = explode(" ",trim(fgets($fin)));

    for($i=0;$i<$N;$i++){
        $m = $i+1+$lookup[$i];
        if($m > $N){
            $result = $i+1;
            break;
        }
    }

    fwrite($fout, $result);
    fclose($fin);
    fclose($fout);

}


processData();