<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 24/4/17
 * Time: 4:20 PM
 */


function charWeight($s) {
    foreach (count_chars(strtolower($s), 1) as $k => $v)
        $r[-$v] .= chr($k) . "{{$v}}";
    ksort($r);
    return join($r).'';
}

charWeight('1abc10DefA7892164aSd');