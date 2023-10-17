<?php
include 'setCookies.php';
include 'viewCookies.php';

echo "<br><br>";

// На вход подается строка из чисел, разделенных пробелами.
// Замените каждый элемент строки произведением всех других элементов.
// Рассмотрим на примере строки "1 2 3".
// Новое значение вместо "1" это "2 * 3 = 6". Для "2" это "1 * 3 = 3". Для "3" это "1 * 2 = 2"

$input_string = "1 0 3";
$array = explode(" ", $input_string);
$product = 1;

$zero_count = 0;

foreach ($array as $value) {
    $element = intval($value);

    if ($element === 0) {
        $zero_count++;
    } else {
        $product *= $element;
    }
}

$result_array = [];

foreach ($array as $value) {
    if ($zero_count > 1) {
        $result_array[] = 0;
    } elseif ($zero_count === 1) {
        $result_array[] = ($value === '0') ? $product : 0;
    } else {
        $result_array[] = ($product === 0) ? 0 : $product / intval($value);
    }
}

$result_string = implode(" ", $result_array);

echo $result_string . "<br><br>";

// На вход подается строка целых чисел, разделенных пробелами.
// Найдите максимальную разницу между двумя элементами строки при условии, что меньшее число должно находиться справа от большего.

$line2 = "1 6 4 3";
$array2 = explode(" ", $line2);

$max_difference = PHP_INT_MIN;

for ($i = 0; $i < count($array2); $i++) {
    for ($j = $i + 1; $j < count($array2); $j++) {
        if ($array2[$j] < $array2[$i]) {
            $difference = $array2[$i] - $array2[$j];
            if ($difference > $max_difference) {
                $max_difference = $difference;
            }
        }
    }
}

echo $max_difference;

