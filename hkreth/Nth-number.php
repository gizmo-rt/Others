<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 10/9/17
 * Time: 7:08 PM
 *
 * https://math.stackexchange.com/questions/2421606/what-would-be-the-nth-number
 *
 */

function processData()
{
    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $l = trim(fgets($fin));
    $inp = explode(" ", trim(fgets($fin)));
    for ($i = 0; $i < $l; $i++) {
        $result = findNumCount($inp[0], $inp[1], $inp[2]);
        fwrite($fout, $result . "\n");
    }
    fclose($fin);
    fclose($fout);
}

function findNumCount($a, $b, $n)
{
   $t = min($a,$b);
   for($i=$t;$i<=$t*$n;$i++){
      if($i%$a == 0){
          $list[]=$i;
      }
      elseif($i%$b == 0){
          $list[]=$i;
      }
      else;
   }

    return $list[$n-1];
}

processData();