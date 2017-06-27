<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 10/6/17
 * Time: 5:58 PM
 *
 * Fibonacci with GCD
 *
 * Monk is really fond of Recurrence Relations, and he likes to study their characteristics in any possible manner. As you might know, his favorite one among all such recurrences is the famous Fibonacci series. For those of you who haven't,
 *
 * Fibonacci series is defined as:
 *
 * F(N)
 * = F(N−1)+F(N−2) ∀ N≥3
 *
 * F(1)=1
 * , F(2)=1
 *
 * .
 *
 * Now, in addition to such sequences, Number Theory is a really interesting concept, and Monk loves solving problems of those kinds too. GCD is a nice concept within the scope of this topic, and is defined to be :
 *
 * The GCD of two numbers is the greatest common divisor of those numbers. Eg: GCD(2,4)=2. Here, he has challenged you to the following task as he feels that this one is amazingly challenging . So, this is how it goes :
 *
 * You are given N
 * integers, A1,A2,...,AN and Q queries. In each query, you are given two integers L and R(1≤L≤R≤N)
 *
 * . For each query, you have to find the value of:
 *
 * GCD(F(AL),F(AL+1),F(AL+2)......F(AR))%109+7
 *
 * Can you do it ?
 *
 * Constraints:
 * 1≤N≤105
 *
 * 1≤Q≤105
 * 1≤Ai≤109
 * 1≤L≤R≤N
 *
 * Format of the input file:
 * First line : Two integers N and Q.
 * Second line : N space separated integers denoting array A.
 * Next Q lines : Two space separated integers L and R.
 *
 * Format of the output file:
 * Output the result of each query in a separate line.
 *
 *
 * CONCEPTS:
 *
 * fib(n) = 1/root(5)*power{[(1+root(5))/2],n}
 *
 * for any 2 number a and b written as GCD(a,b)  [ Extended eculidean algorithm , but not used]
 *    a.x + b.y = gcd
 *     x = (b%a)
 *     y = a
 *
 *
 *
 * Implementation:
 * GCD and factorial property
 *
 * GCD(fib(m),fib(n)) = fib(GCD(m),GCD(n))
 *
 *
 *
 */
function processData()
{
    $fin = fopen('input.txt', 'r');
    $fout = fopen('php://stdout', "w");

    $numbers = explode(" ", trim(fgets($fin)));

    $lookup = explode(" ", trim(fgets($fin)));

    for ($i = 0; $i < $numbers[1]; $i++) {
        $temp = explode(" ", trim(fgets($fin)));
        $result = getResult($temp, $lookup);
        fwrite($fout, $result . "\n");
    }
    fclose($fin);
    fclose($fout);
}

function getResult($temp, $lookup)
{
    $t = getFibonacci($lookup[$temp[0] - 1]);

    for ($i = $temp[0]; $i < $temp[1]; $i++) {
        $t = findGCD($t, getFibonacci($lookup[$i]));
    }

    # $fib = getFibonacci($t);
    $x = 10e9 + 7;
    return $t % $x;
}

function getFibonacci($n)
{
    $t1 = (1 + sqrt(5)) / 2;
    $t2 = (pow($t1, $n) - pow(-$t1, -$n)) / sqrt(5);
    return $t2;
}

function findGCD($a, $b)
{
    while (abs($a - $b) > 0.0001) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    #  return $a % $q;
    return $a;
}

processData();


?>


processData();