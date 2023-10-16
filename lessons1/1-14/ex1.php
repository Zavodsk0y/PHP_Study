<?php

// На вход подается строка из чисел, разделенных пробелами.
// Найдите наиболее часто встречающееся число в строке.

$line = "1 2 3 2 4 4 2 5 4 -2 -2 -2 -2 -2";
$array = explode(" ", $line);
$array = array_count_values($array);
$counter = 0;
$key = 0;
foreach($array as $index => $value) {
    if($value > $counter) {
        $counter = $value;
        $key = $index;
    }
}

echo $key;