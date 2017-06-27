<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 28/5/17
 * Time: 2:51 PM
 */
function processData()
{

    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $K = trim(fgets($fin));
    $N = trim(fgets($fin));

    for ($i = 0; $i < $N; $i++) {
        $temp = explode(" ",trim(fgets($fin)));
        $data = findDoableTasks($temp[0],$temp[1],$K);
        fwrite($fout, $data."\n");
    }
    fclose($fin);
    fclose($fout);
}

function findDoableTasks($start,$end,$K){

    $count = 0;
    for($i=$start;$i<$end;$i++){
        if(isPrime($i))
            $count++;
    }

    if($count >= $K)
        return 'YES';
    else
        return 'NO';
}


function isPrime($num)
{
    if ( $num == 1 ) {
        return false;
    }
    if ( $num == 2 ) {
        return true;
    }
    $temp = floor(sqrt($num));
    for ( $index = 2 ; $index <= $temp ; ++$index ) {
        if ( $num % $index == 0 ) {
            break;
        }
    }
    if( $temp == $index-1 ) {
        return true;
    } else {
        return false;
    }
}


processData();
?>
