<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 30/5/17
 * Time: 7:19 PM
 *
 * Question:
 * https://www.hackerearth.com/practice/basic-programming/input-output/basics-of-input-output/practice-problems/approximate/consecutive-remainders/
 *
 *
 * Meaning:
 * There's the obvious meaning: Congruence modulo an integer, i.e. "a≡b(modc)a≡b(modc)" (read: "aa is congruent to bb modulo cc") which means c∣(b−a)c∣(b−a) ("cc divides b−ab−a").
 *
 * Sample:
 *
 * Input-
 * 3
 * 11 5 3
 * 13 5 4
 * 7 4 1ch
 *
 * Output:-
 * 4
 * 1 7 9 10
 * 0
 *
 * 1
 * 3
 *
 */


function consecutiveRemainder()
{
    $fin = fopen('remainder-in.txt', 'r');
    $fout = fopen('remainder-out.txt', "w");
    $t = trim(fgets($fin));

    for ($i = 0; $i < $t; $i++) {
        $numbers = explode(" ", trim(fgets($fin)));
        $result = findRemainders($numbers);
        $length = count($result);
        fwrite($fout, $length . "\n");
        for ($j = 0; $j < $length; $j++)
            fwrite($fout, $result[$j] . "\t");
        fwrite($fout, "\n");
    }
    fclose($fin);
    fclose($fout);
}

function findRemainders($numbers)
{
    $count = 0;
    $p = $numbers[0];
    $a = $numbers[1];
    $b = $numbers[2];
    $data = array();

    for ($x = 0; $x < $p; $x++) {
        $lhs = pow($x + $b, $a);
        $rhs = pow($x, $a);
        $diff = abs($rhs - $lhs) / $p;
        $num = ceil($diff);
        if ($diff == $num) {
            $data[$count] = $x;
            $count++;
        }
//        if ($count == 10)
//            break;
    }
    return $data;
}


consecutiveRemainder();