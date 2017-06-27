<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 24/5/17
 * Time: 4:30 PM
 */

function processData()
{
    $fin = fopen('zulu.txt', 'r');
    $T = trim(fgets($fin));
    $fout = fopen("zulu-out.txt", "w");
    $result = 0;
    for ($i = 0; $i < $T; $i++) {
        $clockInfo = explode(" ", trim(fgets($fin)));;
        $clockData = getClockInfo($fin, $clockInfo[0]);
        $alarmData = getAlarmInfo($fin, $clockInfo[1]);
        $data = getMinimum($clockData, $alarmData, $clockInfo);
        sort($data);
        for ($j = 0; $j < $clockInfo[1]; $j++) {
            $result += $data[$j];
        }

        fwrite($fout, $result);
    }
    fclose($fin);
    fclose($fout);
}

function getClockInfo($fin, $clockCount)
{

    $info = array();
    for ($j = 0; $j < $clockCount; $j++) {
        $info[$j] = explode(":", trim(fgets($fin)));;
    }
    return $info;
}

function getAlarmInfo($fin, $alCount)
{
    $info = array();
    for ($j = 0; $j < $alCount; $j++) {
        $info[$j] = explode(":", trim(fgets($fin)));;
    }
    return $info;
}

function getMinimum($clockData, $alarmData, $clockInfo)
{

    $clockMin = array();
    $count = 0;
    for ($i = 0; $i < $clockInfo[1]; $i++) {
        $tempAlarm = $alarmData[$i];
        for ($j = 0; $j < $clockInfo[0]; $j++) {
            $tempClock = $clockData[$j];

            //for seconds
            if ($tempClock[2] <= $tempAlarm[2]) {
                $t1 = $tempAlarm[2] - $tempClock[2];  //clock=10 alarm=20
                $t2 = 60 + $tempClock[2] - $tempAlarm[2]; //clock=5 alarm=40
                if ($t1 <= $t2) {
                    $c1 = $t1;
                } else {
                    $c1 = $t2;
                    $tempClock[1]++;
                }
            } else {
                $t1 = $tempClock[2] - $tempAlarm[2]; //clock=20 alarm=10
                $t2 = 60 - $tempClock[2] + $tempAlarm[2];//clock 40 alarm=9
                if ($t1 <= $t2) {
                    $c1 = $t1;
                } else {
                    $c1 = $t2;
                    $tempClock[1]++;
                }
            }


            //for minutes
            if ($tempClock[1] <= $tempAlarm[1]) {
                $t1 = $tempAlarm[1] - $tempClock[1];  //clock=10 alarm=20
                $t2 = 60 + $tempClock[1] - $tempAlarm[1]; //clock=5 alarm=40
                if ($t1 <= $t2) {
                    $c2 = $t1;
                } else {
                    $c2 = $t2;
                    $tempClock[0]++;
                }
            } else {
                $t1 = $tempClock[1] - $tempAlarm[1]; //clock=20 alarm=10
                $t2 = 60 - $tempClock[1] + $tempAlarm[1];//clock 40 alarm=9
                if ($t1 <= $t2) {
                    $c2 = $t1;
                } else {
                    $c2 = $t2;
                    $tempClock[0]++;
                }
            }
            //for hours
            if ($tempClock[0] <= $tempAlarm[0]) {
                $t1 = $tempAlarm[0] - $tempClock[0];  //clock=1 alarm=5
                $t2 = 24 + $tempClock[0] - $tempAlarm[0]; //clock=5 alarm=23
                if ($t1 <= $t2) {
                    $c3 = $t1;
                } else {
                    $c3 = $t2;
                }
            } else {
                $t1 = $tempClock[0] - $tempAlarm[0]; //clock=20 alarm=10
                $t2 = 24 - $tempClock[0] + $tempAlarm[0];//clock 40 alarm=9
                if ($t1 <= $t2) {
                    $c3 = $t1;
                } else {
                    $c3 = $t2;
                }
            }
            $clockMin[$count++] = $c1 + $c2 + $c3;
        }
    }
    return $clockMin;
}

processData();