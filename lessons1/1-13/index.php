<?php

// На вход подается строка из чисел, разделенных пробелами.
// Найдите все числа, встречающиеся 2 и более раз. Выведите их в любом порядке, разделяя пробелами.

$line = "3 2 5 1 2 3";
$array = explode(" ", $line);
// $array = [3, 2, 5, 1, 2, 3];

$array = array_count_values($array);

//    [3] => 2
//     [2] => 2
//     [5] => 1
//     [1] => 1

// $array = array_keys($array);

foreach($array as $key => $value) {
    if($value < 2) unset($array[$key]);
};

// for($i = 0; $i < count($array); $i++) {
// 	if($array[$i] < 2) unset($array[$i]);
// };



$array = array_keys($array);
//[0] => 3
//   [1] => 2
//   [2] => 5
//   [3] => 1

$line = implode(" ", $array);

echo $line;

// На вход подается строка из чисел, разделенных пробелами.
// Найдите максимальное произведение двух чисел из этой строки.

$line2 = "1 2 10 3 4 6 7 9 -10 -10";
$array2 = explode(" ", $line2);

$max_prod = $array[0];

for($i = 0; $i < count($array2); $i++) {
    for($j = $i + 1; $j < count($array2); $j++) {
        if($max_prod < $array2[$i] * $array2[$j]) {
            $max_prod = $array2[$i] * $array2[$j];
        }
    }
}

echo $max_prod;