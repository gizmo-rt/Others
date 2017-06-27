<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 24/5/17
 * Time: 2:38 PM
 */


function processData()
{

    $file = fopen('citi-in.txt', 'r');
    $T = explode(" ", trim(fgets($file)));
    $fout = fopen("City-out.txt", "w");
    $inp = storeInput($file, $T[1]);
    $Q = trim(fgets($file));

    foreach (range(0, $Q-1) as $index) {
        $data = findPos(explode(" ", trim(fgets($file))), $inp) . "\n";
        fwrite($fout, $data);
    }
    fclose($file);
    fclose($fout);
}


function storeInput($file, $length)
{

    $data = array();
    for ($i = 0; $i < $length; $i++) {
        $temp = explode(" ", trim(fgets($file)));
        array_shift($temp);
        $data[$i] = $temp;
    }

    return $data;
}


function findPos($pos, $inp)
{

    $x = '';
    $y = '';
    foreach ($inp as $key => $value) {
        if (!empty($value)&&in_array($pos[0], $value))
            $x[] = $key;

        if (!empty($value)&&in_array($pos[1], $value))
            $y[] = $key;
    }

    $temp =99999999999999999;
    for ($i = 0; $i < count($x); $i++) {
        for ($j = 0; $j < count($y); $j++) {
            $t = $x[$i]-$y[$j];
              if($temp > $t)
                  $temp=$t;
        }
    }
     return abs($temp);
}

processData();