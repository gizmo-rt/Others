<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 9/4/17
 * Time: 12:52 PM
 * Medium level
 * Code Gladiator by deloitte
 */
function processData()
{
    $file = fopen('enemy.in', 'r');
    $keyLength = trim(fgets($file));
    $messageLength = trim(fgets($file));
    $key = str_split(trim(fgets($file)));
    $message = trim(fgets($file));
    $count = 0;
    sort($key);

    for($i=0;$i<$messageLength;$i++){
        if($i+$keyLength > $messageLength)
            break;
        else{
            $chunk = str_split(substr($message,$i,$keyLength));
            sort($chunk);
            if($key === $chunk)
                $count++;
        }
    }
    print $count;
}



processData();