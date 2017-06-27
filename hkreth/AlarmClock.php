<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 1/6/17
 * Time: 5:49 PM
 */

function processData()
{
    $fin = fopen('zulu.txt', 'r');
    $T = trim(fgets($fin));
    $fout = fopen("zulu-out.txt", "w");
    $result = 0;
    for ($z = 0; $z < $T; $z++) {
        $clockInfo = explode(" ", trim(fgets($fin)));;
        $clockData = getClockInfo($fin, $clockInfo[0]);
        $alarmData = getAlarmInfo($fin, $clockInfo[1]);
        $clockCount = count($clockData);
        $alarmCount = count($alarmData);
        $steps = array();

        for ($i = 0; $i < $alarmCount; $i++) {
            for ($j = 0; $j < $clockCount; $j++) {
                $steps[$i][$j] = countSteps(abs($alarmData[$i] - $clockData[$j]));
            }
        }

        foreach ($steps as $val) {
            sort($val);
            $result += $val[0];
        }
        fwrite($fout, $result."\n");
    }
    fclose($fin);
    fclose($fout);
}

function getClockInfo($fin, $clockCount)
{

    $info = array();
    for ($j = 0; $j < $clockCount; $j++) {
        $clockTime = explode(":", trim(fgets($fin)));;
        $info[$j] = 3600 * $clockTime[0] + 60 * $clockTime[1] + $clockTime[2];
    }
    return $info;
}

function getAlarmInfo($fin, $alCount)
{
    $info = array();
    for ($j = 0; $j < $alCount; $j++) {
        $alarmTime = explode(":", trim(fgets($fin)));;
        $info[$j] = 3600 * $alarmTime[0] + 60 * $alarmTime[1] + $alarmTime[2];
    }
    return $info;
}

function countSteps($num)
{

    $temp = $num;
    $hourStep = floor($temp / 3600);
    $minStep = floor(($num - $hourStep * 3600) / 60);
    $secStep = $num - ($hourStep * 3600 + $minStep * 60);
    $otherSec = 60 - $secStep;

    if ($secStep > $otherSec) {
        $secStep = $otherSec;
        $minStep++;
    }
    $totalCount = $hourStep + $minStep + $secStep;
    return $totalCount;
}

processData();