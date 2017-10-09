<?php
/**
 * Created by PhpStorm.
 * User: pawanrajmurarka
 * Date: 07/10/17
 * Time: 1:55 PM
 */

function find_answer()
{
    $fin = fopen('input.txt', 'r');
    $fout = fopen('output.txt', 'w');
    $str = trim(fgets($fin));
    $result = findPalindrome($str);
    if($result>0){
        fwrite($fout, "Yes" . "\n");
        fwrite($fout, $result . "\n");

    }else{
        fwrite($fout, "No" . "\n");
        fwrite($fout, $result . "\n");
    }
    fclose($fin);
    fclose($fout);
}

function findPalindrome($str){

    $i=0;
    $temp=$str[0];
    $maxLen = 0;
    while($i<strlen($str)){
        if(strlen($temp)<=1){
            $temp.=$str[++$i];
        }else{
            $chk = strrev($temp);
            if (strpos($str, $chk) !== false) {
                if($maxLen < strlen($chk)){
                    $maxLen = strlen($chk);
                }
            }
            else{
                $temp = substr($temp, 1);
            }
            $temp.=$str[++$i];
        }
    }
    return $maxLen;
}

find_answer();
