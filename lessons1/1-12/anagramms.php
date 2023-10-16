<?php
// Анаграммы

function anagramms($str1, $str2)
{
    if(strlen($str1) != strlen($str2)) return "no";
    $str1 = strtolower($str1);
    $str1 = str_split($str1);
    sort($str1);
    $str2 = strtolower($str2);
    $str2 = str_split($str2);
    sort($str2);
    if (!array_diff($str1, $str2)) return "yes";
    else return "no";

};

$string1 = "HELLo";
$string2 = "OHLEL";

$result = anagramms($string1, $string2);

echo $result;