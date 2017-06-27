<?php

/*
 * Read input from stdin and provide input before running code

fscanf(STDIN, "%s\n", $name);
echo "Hi, ".$name;

*/

function processData()
{

    $fin = fopen('input.txt', 'r');
    $fout = fopen('out.txt', 'w');
    $T = trim(fgets($fin));

    for ($i = 0; $i < $T; $i++) {
        $data = findLuckyNumber($fin);
        fwrite($fout, $data."\n");
    }
    fclose($fin);
    fclose($fout);
}

function findLuckyNumber($fin)
{

    $length = explode(" ", trim(fgets($fin)));
    $arr = array();
    $p = 0;
    $x = -1;
    $y = -1;
    $sum1 = 0;
    $sum2 = 0;

    for ($i = 0; $i < $length[0]; $i++) {
        $arr[$i] = explode(" ", trim(fgets($fin)));
        $p = $p > max($arr[$i]) ? $p : max($arr[$i]);
        $x = $i;
        $y = array_search($p, $arr[$i]);
    }


    for ($j = 0; $j < $y; $j++) {
        if ($arr[$x][$j] > 0) {
            $sum1 += $arr[$x][$j];
        }
    }

    for ($i = 0; $i < $x; $i++) {
        if ($arr[$i][$y] > 0) {
            $sum1+= $arr[$i][$y];
        }
    }
    $sum1 += $p;

    for ($j = 0; $j < $length[1]; $j++) {
        if ($arr[$x][$j] > 0) {
            $sum2 += $arr[$x][$j];
        }
    }

    $sum = $sum1 >= $sum2 ? $sum1: $sum2;


    return $sum;
}


processData();
?>
